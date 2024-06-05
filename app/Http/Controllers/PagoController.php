<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PaqueteUsuario;
use App\Models\Producto;
use App\Models\Subscription as Suscripcion;
use Auth;
use Illuminate\Http\Request;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Stripe\Stripe;
use Stripe\Subscription;

class PagoController extends Controller
{
    public function index($productoFacturarId)
    {
        $productoFacturar = Producto::find($productoFacturarId);
        return view('facturaciones.formulario-pago', compact('productoFacturar'));
    }

    public function procesarPago(Request $request, $productoId)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $producto = Producto::find($productoId);
        if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }

        $paymentMethodId = $request->input('payment_method_id');
        if (!$paymentMethodId) {
            return redirect()->back()->with('error', 'Método de pago no proporcionado');
        }

        try {
            $paymentMethod = PaymentMethod::retrieve($paymentMethodId);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Método de pago inválido');
        }

        $user = Auth::user();
        $stripeCustomerId = $user->stripe_id;

        try {
            if ($stripeCustomerId) {
                $customer = Customer::retrieve($stripeCustomerId);
            } else {
                $customer = Customer::create([
                    'email' => $request->input('email'),
                    'name' => $request->input('name'),
                ]);
                $user->update(['stripe_id' => $customer->id]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al crear o recuperar el cliente de Stripe');
        }

        try {
            $paymentMethod->attach(['customer' => $customer->id]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al adjuntar el método de pago al cliente');
        }

        if ($producto->type == 'membership') {
            return $this->procesarMembresia($user, $producto, $customer, $paymentMethod);
        } else if ($producto->type == 'package') {
            return $this->procesarPaquete($user, $producto, $customer, $paymentMethod);
        } else {
            return redirect()->back()->with('error', 'Tipo de producto desconocido');
        }
    }

    private function procesarMembresia($user, $producto, $customer, $paymentMethod)
    {
        try {
            $facturaController = new FacturaController();
            $usuarioController = new UsuarioController();
            $currentSubscription = Suscripcion::where('user_id', $user->id)->first();
            if ($currentSubscription) {
                $stripeSubscription = Subscription::retrieve($currentSubscription->stripe_id);
                $stripeSubscription->cancel(['at_period_end' => false]);
                $currentSubscription->delete();
            }

            $subscription = Subscription::create([
                'customer' => $customer->id,
                'items' => [
                    ['price' => $producto->precio_stripe_id],
                ],
                'default_payment_method' => $paymentMethod->id,
                'expand' => ['latest_invoice.payment_intent'],
                'cancel_at_period_end' => true,
            ]);

            Suscripcion::create([
                'user_id' => $user->id,
                'name' => $producto->name,
                'stripe_id' => $subscription->id,
                'stripe_status' => 'active',
                'stripe_price' => $producto->precio_stripe_id,
                'ends_at' => now()->addMonth(),
                'producto_id' => $producto->id,
            ]);

            if (!$usuarioController->sumatorioClases($producto)) {
                return redirect()->back()->with('error', 'No se ha podido sumar las clases al usuario');
            }

            if (!$facturaController->generarFactura($customer->id)) {
                return redirect()->back()->with('error', 'Error al generar la factura');
            }

            return redirect()->route('suscripcion-estadoSuscripcion')->with('success', 'Se ha actualizado su suscripción. Desde ya mismo puedes disfrutar de las ventajas');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al procesar la suscripción: ' . $e->getMessage());
        }
    }

    private function procesarPaquete($user, $producto, $customer, $paymentMethod)
    {
        try {
            $facturaController = new FacturaController();
            $usuarioController = new UsuarioController();
            $paymentIntent = PaymentIntent::create([
                'amount' => $producto->precio * 100,
                'currency' => 'eur',
                'customer' => $customer->id,
                'payment_method' => $paymentMethod->id,
                'off_session' => true,
                'confirm' => true,
            ]);

            if ($paymentIntent->status != 'succeeded') {
                return redirect()->back()->with('error', 'El pago ha fallado');
            }

            PaqueteUsuario::create([
                'user_id' => $user->id,
                'producto_id' => $producto->id,
                'fecha_compra' => now(),
                'payment_method_id' => $paymentMethod->id,
            ]);

            if (!$usuarioController->sumatorioClases($producto)) {
                return redirect()->back()->with('error', 'No se ha podido sumar las clases al usuario');
            }

            if (!$facturaController->generarFactura($customer->id)) {
                return redirect()->back()->with('error', 'Error al generar la factura');
            }

            return redirect()->route('suscripcion-estadoSuscripcion')->with('success', 'Se ha añadido el número de clases del paquete. Ahora cuentas con ' . $producto->infoPaquete->numero_clases . ' clases extra');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error en el pago: ' . $e->getMessage());
        }
    }



    public function cambioPlan($productoNuevo)
    {
        $productoNuevo = Producto::find($productoNuevo);
        $usuario = Auth::user();
        $suscripcionActual = Suscripcion::where('user_id', $usuario->id)->first();
        $productoUsuario = Producto::where('precio_stripe_id', $suscripcionActual->stripe_price)->with(['infoSuscripcion'])->first();

        $diasCancelacion = $productoUsuario->infoSuscripcion->dias_cancelacion;
        $diaCreacion = $suscripcionActual->created_at;
        $diferenciaDias = $diaCreacion->diffInDays(now());

        if ($diferenciaDias > $diasCancelacion) {
            return view('facturaciones.formulario-pago', compact('productoNuevo'));
        } else {
            $diasHastaFinalSuscripcion = now()->diffInDays($suscripcionActual->ends_at);
            $precioNuevo = $this->prorrateoDias($diasHastaFinalSuscripcion, $productoNuevo->precio, $productoUsuario->precio);

            if ($productoNuevo->precio < $productoUsuario->precio) {
                $clasesExtra = $this->convertirDiferenciaEnClases($productoUsuario->precio, $productoNuevo->precio, $diasHastaFinalSuscripcion);
                $usuario->numero_clases += $clasesExtra;
                $usuario->save();
            }

            $productoFacturar = clone $productoNuevo;

            $productoFacturar->precio = number_format($precioNuevo, 2);


            return view('facturaciones.formulario-pago', compact('productoFacturar'));
        }
    }

    public function prorrateoDias($dias, $precioNuevo, $precioViejo)
    {
        $totalSinDisfrutar = $dias * ($precioViejo / 30);
        $totalDisfrutar = $dias * ($precioNuevo / 30);

        if ($precioNuevo > $precioViejo) {
            $totalNuevo = $totalDisfrutar - $totalSinDisfrutar;
        } else {
            $totalNuevo = $totalSinDisfrutar - $totalDisfrutar;
        }

        return max($totalNuevo, 0); 
    }

    public function convertirDiferenciaEnClases($precioViejo, $precioNuevo, $dias)
    {
        $totalSinDisfrutar = $dias * ($precioViejo / 30);
        $totalDisfrutar = $dias * ($precioNuevo / 30);
        $diferencia = $totalSinDisfrutar - $totalDisfrutar;

        $clasesExtra = floor($diferencia);

        return $clasesExtra;
    }

}
