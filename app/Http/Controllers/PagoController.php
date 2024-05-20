<?php

namespace App\Http\Controllers;

use App\Models\Membresia;
use App\Models\Pago;
use App\Http\Controllers\Controller;
use Auth;
use DateTime;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
use Stripe\Subscription;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Membresia $membresia)
    {
        //dd($membresia);
        return view('facturaciones.formulario-pago', compact('membresia'));
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
            $this->registrarPago(Auth::user(), $membresia, $subscription);
            //echo 'registrrado el pago?)';
            return redirect()->route('suscripcion-detallesPlan')->with('success', 'Te has suscrito correctamente');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Hubo un problema con su pago: ' . $e->getMessage()]);
        }
    }

    public function registrarPago($usuario, $membresia, $subscription)
    {
        try {
            //dd('trycatch');
            $fecha_actual = new DateTime('now');
            $fecha_pago = clone $fecha_actual;
            $fecha_fin = clone $fecha_actual;
            $fecha_fin->modify('+30 days');

            $usuario->membresias()->attach($membresia->id, [
                'subscription_id' => $subscription->id,
                'status' => $subscription->status,
                'fecha_pago' => $fecha_pago,
                'fecha_fin' => $fecha_fin,
            ]);
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
        $usuario = Auth::user();

        if (isset($usuario->membresias[0])) {
            $membresiaUsuario = $usuario->membresias[0];
        }

        $membresias = Membresia::all();

        if (isset($membresiaUsuario)) {
            
            return view('usuario.submenu.SUS-estadoSuscripcion', compact('membresiaUsuario', 'membresias'));
        } else {
            return view('usuario.submenu.SUS-estadoSuscripcion', compact('membresias'));
        }
    }
}
