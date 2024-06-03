<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

            InfoSuscripcione::create([
                'suscripcion_id' => $suscripcionBD->id,
            ]);
            $facturaController = new FacturaController();
            $usuarioController = new UsuarioController();

            $numeroClasesUsuario = $usuarioController->sumatorioClases($producto);
            //$facturaController->generarFactura();

            return redirect()->route('suscripcion-estadoSuscripcion')->with('success', 'Se ha actualizado su suscripcion. Desde ya mismo puedes disfrutar de las ventajas');
        } else if ($producto->type == 'package') {
            // Crear un PaymentIntent para una compra única
            $paymentIntent = PaymentIntent::create([
                'amount' => $producto->price * 100, // Monto en centavos
                'currency' => 'eur',
                'customer' => $customer->id,
                'payment_method' => $paymentMethod->id,
                'off_session' => true,
                'confirm' => true,
            ]);
            if ($paymentIntent->status == 'succeeded') {
                // Guardar la compra en la base de datos
                PaqueteUsuario::create([
                    'user_id' => Auth::id(),
                    'product_id' => $producto->id,
                    'amount' => $producto->price,
                    'payment_intent_id' => $paymentIntent->id,
                    'status' => 'completed'
                ]);

                return response()->json(['success' => true]);
            } else {
                // El pago ha fallado
                return response()->json(['error' => 'Payment failed.']);
            }
        }
    }
}
