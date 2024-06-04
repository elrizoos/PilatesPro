<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Factura;
use App\Models\InfoSuscripcione;
use App\Models\PaqueteUsuario;
use App\Models\Producto;
use Auth;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Stripe\Price;
use Stripe\Product;
use Stripe\SetupIntent;
use Stripe\Stripe;
use Stripe\Subscription;

class PagoController extends Controller
{
    public function index(Producto $producto)
    {
        return view('facturaciones.formulario-pago', compact('producto'));
    }

    public function procesarPago(Request $request, Producto $producto)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $facturaController = new FacturaController();
        $usuarioController = new UsuarioController();

        $paymentMethod = PaymentMethod::retrieve($request->input('payment_method_id'));

        $stripeCustomerId = Auth::user()->stripe_id;
        if ($stripeCustomerId) {
            $customer = Customer::retrieve($stripeCustomerId);
        } else {
            $customer = Customer::create([
                'email' => $request->input('email'),
                'name' => $request->input('name'),
            ]);
            Auth::user()->update(['stripe_id' => $customer->id]);
        }

        $paymentMethod->attach(['customer' => $customer->id]);

        if ($producto->type == 'membership') {
            $subscription = Subscription::create([
                'customer' => $customer->id,
                'items' => [
                    ['price' => $producto->precio_stripe_id],
                ],
                'default_payment_method' => $paymentMethod->id,
                'expand' => ['latest_invoice.payment_intent'],
                'cancel_at_period_end' => true,
            ]);
            $suscripcionBD = \App\Models\Subscription::createOrFirst([
                'user_id' => Auth::id(),
                'name' => $producto->name,
                'stripe_id' => $subscription->id,
                'stripe_status' => 'active',
                'stripe_price' => $producto->precio_stripe_id,
                'ends_at' => now()->addMonth(),
                'producto_id' => $producto->id,
            ]);


            $sumarClases = $usuarioController->sumatorioClases($producto);
            if ($sumarClases !== true) {
                return redirect()->back()->with('error', 'No se ha podido sumar las clases al usuario');
            }

            $generarFactura = $facturaController->generarFactura($customer->id);

            if ($generarFactura !== true) {
                return $generarFactura;
            }

            return redirect()->route('suscripcion-estadoSuscripcion')->with('success', 'Se ha actualizado su suscripcion. Desde ya mismo puedes disfrutar de las ventajas');
        } else if ($producto->type == 'package') {
            // dd($producto);
            try {
                $paymentIntent = PaymentIntent::create([
                    'amount' => $producto->precio * 100,
                    'currency' => 'eur',
                    'customer' => $customer->id,
                    'payment_method' => $paymentMethod->id,
                    'off_session' => true,
                    'confirm' => true,
                ]);
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
            if ($paymentIntent->status == 'succeeded') {
                PaqueteUsuario::create([
                    'user_id' => Auth::id(),
                    'producto_id' => $producto->id,
                    'fecha_compra' => now(),
                    'payment_method_id' => $paymentMethod->id,
                ]);

                $sumarClases = $usuarioController->sumatorioClases($producto);
                if ($sumarClases !== true) {
                    dd("entrado");

                    return redirect()->back()->with('error', 'No se ha podido sumar las clases al usuario');
                }

                $generarFactura = $facturaController->generarFactura($customer->id);

                if ($generarFactura !== true) {
                    dd('error');
                    return $generarFactura;
                }
                return redirect()->route('suscripcion-estadoSuscripcion')->with('success', 'Se ha añadido el numero de clases del paquete. Ahora cuentas con ' . $producto->infoPaquete->numero_clases . ' clases extra');

            } else {
                return redirect()->back()->with('error', 'El pago ha fallado');
            }
        }
    }
}
