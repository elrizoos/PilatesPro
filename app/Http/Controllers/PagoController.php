<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Membresia;
use App\Models\Pago;
use App\Http\Controllers\Controller;
use Auth;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Invoice;
use Stripe\InvoiceItem;
use Stripe\Plan;
use Stripe\Product;
use Stripe\Stripe;
use Stripe\Subscription;
use Stripe\SubscriptionItem;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Membresia $producto)
    {
        //dd($membresia);
        return view('facturaciones.formulario-pago', compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pago $pago)
    {
        //
    }

    public function pagar($usuario, $membresia, Request $request)
    {
        $datos = $request->all();
        $membresia = Membresia::find($membresia);
        //dd($datos, $membresia);
        if (!$membresia) {
            return redirect()->back()->withErrors(['message' => 'Membresía no encontrada.']);
        }

        return $this->realizarPago($datos, $membresia);
    }

    public function realizarPago($datos, $membresia)
    {
        //dd('hola');
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            //dd('trycatch');
            if (!isset($datos['stripeToken'])) {
                throw new \Exception('Token de Stripe no proporcionado.');
            }

            $token = $datos['stripeToken'];
            //dd($token);
            $customer = Customer::create([
                'email' => Auth::user()->email,
                'source' => $token,
            ]);

            $subscription = Subscription::create([
                'customer' => $customer->id,
                'items' => [
                    ['price' => $membresia->price_id],
                ],
            ]);
            //dd($customer, $subscription);
            $factura = $this->registrarPago(Auth::user(), $membresia, $subscription, false);
            //echo 'registrrado el pago?)';
            return $factura;

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Hubo un problema con su pago: ' . $e->getMessage()]);
        }
    }

    public function registrarPago($usuario, $membresia, $subscription, $update)
    {
        try {
            //dd('trycatch');
            $fecha_actual = new DateTime('now');
            $fecha_pago = clone $fecha_actual;
            $fecha_fin = clone $fecha_actual;
            $fecha_fin->modify('+30 days');
            if ($update === true) {
                $membresiaId = $usuario->membresias[0]->id;
                $usuario->membresias()->updateExistingPivot($membresiaId, [
                    'subscription_id' => $subscription->id,
                    'membresia_id' => $membresia->id,
                    'status' => $subscription->status,
                    'fecha_pago' => $fecha_pago,
                    'fecha_fin' => $fecha_fin,
                ]);
            } else {
                $usuario->membresias()->attach($membresia->id, [

                    'subscription_id' => $subscription->id,
                    'status' => $subscription->status,
                    'fecha_pago' => $fecha_pago,
                    'fecha_fin' => $fecha_fin,
                ]);
            }

            $usuario->stripe_id = $subscription->customer;

            $usuario->save();


            $factura = $this->generarFactura($subscription->id);
            return $factura;
        } catch (\Throwable $th) {
            //dd('catch');
            return redirect()->back()->withErrors(['message' => 'Hubo un problema al registrar el pago: ' . $th->getMessage()]);
        }
    }

    public function mostrarDetallesPlan()
    {
        $usuario = Auth::user();

        if (isset($usuario->membresias[0])) {
            $membresiaUsuario = $usuario->membresias[0];
        }

        $membresias = Membresia::all();

        if (isset($membresiaUsuario)) {
            $fechaPago = new DateTime($membresiaUsuario->pivot->fecha_pago);

            $arrayFechaPago = [
                'dia' => $fechaPago->format('d'),
                'mes' => $fechaPago->format('M'),
                'año' => $fechaPago->format('Y'),
            ];
            //dd($arrayFechaPago);

            $fechaFin = new DateTime($membresiaUsuario->pivot->fecha_fin);

            $arrayFechaFin = [
                'dia' => $fechaFin->format('d'),
                'mes' => $fechaFin->format('M'),
                'año' => $fechaFin->format('Y'),
            ];
            return view('usuario.submenu.SUS-detallesPlan', compact('membresiaUsuario', 'arrayFechaPago', 'arrayFechaFin'));
        } else {
            return redirect()->route('suscripcion-estadoSuscripcion');
        }
    }

    public function mostrarEstadoSuscripcion()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $productos = Product::all(['active' => true]);

        $usuario = Auth::user();

        if (isset($usuario->membresias[0])) {
            $membresiaUsuario = $usuario->membresias[0];
        }

        $membresias = Membresia::all();
        
        
        dd($productos, $membresias);
        if (isset($membresiaUsuario)) {

            return view('usuario.submenu.SUS-estadoSuscripcion', compact('membresiaUsuario', 'productos'));
        } else {
            return view('usuario.submenu.SUS-estadoSuscripcion', compact('membresias', 'productos'));
        }
    }

    public function cambioPlan()
    {
        $usuario = Auth::user();

        if (isset($usuario->membresias[0])) {
            $membresiaUsuario = $usuario->membresias[0];
            $suscripcionId = $membresiaUsuario->pivot->subscription_id;
        } else {
            return redirect()->route('suscripcion-estadoSuscripcion');
        }
        //dd($suscripcionId);
        $membresias = Membresia::where('id', '!=', $membresiaUsuario->id)->get();
        //dd($membresias);
        return view('usuario.submenu.SUS-cambioPlan', compact('membresias', 'suscripcionId'));

    }

    public function cambiar($membresia, $suscripcion)
    {
        //dd($membresia, $suscripcion);

        $membresiaPivot = Membresia::find($membresia);
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $suscripcion = Subscription::retrieve($suscripcion);
            $suscripcionItem = $suscripcion->items->data[0]->id;
            SubscriptionItem::update($suscripcionItem, [
                'price' => $membresiaPivot->price_id,
            ]);
            //dd($suscripcionItem);

            $suscripcion->save();
            $usuario = Auth::user();
            $this->registrarPago($usuario, $membresiaPivot, $suscripcion, true);
            Log::debug("Pago registrado");
            return redirect()->route('suscripcion-detallesPlan');
        } catch (\Throwable $th) {
            Log::alert("Error" . $th->getMessage());
        }
    }

    //calcularNuevoPlan
    public function calcularPrecioPagar($suscripcionId, $membresiaId)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $suscripcionActual = Subscription::retrieve($suscripcionId);
        $tiempoActual = time();
        $tiempoFinSuscripcionActual = $suscripcionActual->current_period_end;

        $tiempoPeriodoPlan = ($suscripcionActual->current_period_end - $suscripcionActual->current_period_start) / 86400;

        $tiempoRestante = ($tiempoFinSuscripcionActual - $tiempoActual) / 86400;

        $precioPlanActual = $suscripcionActual->items->data[0]->plan->amount / 100;
        $precioDiaPlanActual = $precioPlanActual / $tiempoPeriodoPlan;

        $membresiaNueva = Membresia::find($membresiaId);

        $planNuevo = Plan::retrieve($membresiaNueva->price_id);

        $precioPlanNuevo = $planNuevo->amount / 100;
        $precioDiaPlanNuevo = $precioPlanNuevo / $tiempoPeriodoPlan;

        $precioNoDisfrutadoPlanActual = round($precioDiaPlanActual * $tiempoRestante);
        $precioDisfrutarPlanNuevo = round($precioDiaPlanNuevo * $tiempoRestante);

        $precioPagarCambio = $precioDisfrutarPlanNuevo - $precioNoDisfrutadoPlanActual;




        dd($tiempoPeriodoPlan, $suscripcionActual, $precioDiaPlanActual, $precioPagarCambio);

        /*
            30.962048611111 // app\Http\Controllers\PagoController.php:286
            0.66666666666667 // app\Http\Controllers\PagoController.php:286
            619.24097222222 // app\Http\Controllers\PagoController.php:286
        */
    }

    public function obtenerHistorialPagos()
    {
        $usuario = Auth::user();

        try {
            Stripe::setApiKey(config('services.stripe.secret'));
            if (!$usuario->stripe_id) {
                return redirect()->back()->withErrors(['message' => 'El usuario no tiene un cliente de Stripe asociado.']);
            }
            $charges = Charge::all(['customer' => $usuario->stripe_id]);
            //dd($charges);
            return view('usuario.submenu.SUS-historialPago', compact('charges'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function generarFactura($suscripcionId)
    {
        $factura = new FacturaController;

        $facturaCliente = $factura->generarFactura($suscripcionId);

        return $facturaCliente;

    }

    public function mostrarFactura()
    {
        return view('facturaciones.factura');
    }
}
