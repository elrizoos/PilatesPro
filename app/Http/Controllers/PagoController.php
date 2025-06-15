<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\PaqueteUsuario;
use App\Models\Producto;
use App\Models\Subscription as Suscripcion;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Stripe\Customer;
use Stripe\Invoice;
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
        if (! $producto) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }

        $paymentMethodId = $request->input('payment_method_id');
        if (! $paymentMethodId) {
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
        } elseif ($producto->type == 'package') {
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

            if (! $usuarioController->sumatorioClases($producto)) {
                return redirect()->back()->with('error', 'No se ha podido sumar las clases al usuario');
            }

            if (! $facturaController->generarFactura($customer->id, $producto->precio, $producto->descripcion, $producto->precio_stripe_id, $producto->type)) {
                return redirect()->back()->with('error', 'Error al generar la factura');
            }

            return redirect()->route('suscripcion-estadoSuscripcion')->with('success', 'Se ha actualizado su suscripción. Desde ya mismo puedes disfrutar de las ventajas');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al procesar la suscripción: '.$e->getMessage());
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

            if (! $usuarioController->sumatorioClases($producto)) {
                return redirect()->back()->with('error', 'No se ha podido sumar las clases al usuario');
            }

            if (! $facturaController->generarFactura($customer->id, $producto->precio, $producto->description, $producto->precio_stripe_id, $producto->type)) {
                return redirect()->back()->with('error', 'Error al generar la factura');
            }

            return redirect()->route('suscripcion-estadoSuscripcion')->with('success', 'Se ha añadido el número de clases del paquete. Ahora cuentas con '.$producto->infoPaquete->numero_clases.' clases extra');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error en el pago: '.$e->getMessage());
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
                $usuario->registroTiempo->clases_totales += $clasesExtra;
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

    public function historialPago()
    {
        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $usuario = Auth::user();
            $customer = Customer::retrieve($usuario->stripe_id);
            $facturas = Invoice::search(['query' => 'customer:\''.$customer->id.'\'']);
            //dd($facturas);

            if (count($facturas) == 0) {
                $facturasDatos = null;

                return view('usuario.submenu.SUS-historialPago', compact('facturasDatos'));

            }
            $facturasDatos = [];
            foreach ($facturas as $factura) {
                $facturaStripeId = $factura->id;
                $facturaBD = Factura::where('stripe_id', $facturaStripeId)->first();
                if ($facturaBD == null) {
                    continue;

                }
                $facturasDatos[] = [
                    'factura' => $factura,
                    'pdf' => $facturaBD->pdf,
                ];
            }

            //dd($facturasDatos);
            return view('usuario.submenu.SUS-historialPago', compact('facturasDatos'));
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'No hay cliente asignado, probablemente no hayas realizado ningun pago hasta el momento.');
        }
    }

    public function registroPagos(Request $request)
    {
        $tipo = 'FACTU-registroPagos';

        // Validación de los filtros y orden
        $request->validate([
            'nombre' => 'nullable|string|max:20',
            'apellidos' => 'nullable|string|max:50',
            'fecha' => 'nullable|date|before_or_equal:today',
            'orden' => 'nullable|in:ASC,DESC',
            'elementoOrden' => 'nullable|in:nombre,apellidos,fecha',
        ]);

        $orden = $request->orden ?? 'ASC';
        $elementoOrden = $request->elementoOrden;

        // Query base con relación
        $query = Factura::with('alumno');

        // Filtros
        if ($request->filled('nombre')) {
            $query->whereHas('alumno', fn ($q) => $q->where('nombre', 'like', '%'.$request->nombre.'%'));
        }

        if ($request->filled('apellidos')) {
            $query->whereHas('alumno', fn ($q) => $q->where('apellidos', 'like', '%'.$request->apellidos.'%'));
        }

        if ($request->filled('fecha')) {
            $query->whereDate('fecha_emision', $request->fecha);
        }

        // Ordenación dinámica
        if ($elementoOrden === 'nombre' || $elementoOrden === 'apellidos') {
            $query->join('users', 'facturas.alumno_id', '=', 'users.id')
                ->orderBy("users.$elementoOrden", $orden)
                ->select('facturas.*');
        } elseif ($elementoOrden === 'fecha') {
            $query->orderBy('fecha_emision', $orden);
        }

        // Paginación con filtros preservados
        $facturas = $query->paginate(10)->appends($request->all());

        return view('admin.FACTU-registroPagos', compact('facturas', 'tipo', 'orden', 'elementoOrden'));
    }

    public function generarFacturacion(Request $request)
    {
        //dd($request->all());
        $tipo = 'FACTU-generaFacturacion';
        $mes = $request->input('mes', now()->month);
        $anio = $request->input('anio', now()->year);

        // Obtener los IDs de alumnos que ya tienen factura ese mes y año
        $facturados = Factura::whereMonth('fecha_emision', $mes)
            ->whereYear('fecha_emision', $anio)
            ->pluck('alumno_id')
            ->toArray();

        // Obtener alumnos que aún no tienen factura ese mes
        $alumnos = User::where('tipo_usuario', 'alumno')
            ->whereNotIn('id', $facturados)
            ->get();

        return view('admin.FACTU-generaFacturacion', compact('tipo', 'alumnos', 'mes', 'anio'));
    }
}
