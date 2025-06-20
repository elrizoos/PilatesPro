<?php

namespace App\Http\Controllers;

use App\Models\InfoPaquete;
use App\Models\InfoSuscripcione;
use App\Models\Pagina;
use App\Models\Producto;
use App\Models\Subscription;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Stripe\Invoice;
use Stripe\PaymentIntent;
use Stripe\Price;
use Stripe\Product;
use Stripe\Stripe;
use Stripe\Subscription as SubscriptionStripe;
use Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipo = 'SUS-estadoSuscripcion';
        Stripe::setApiKey(config('services.stripe.secret'));
        $user = User::where('id', Auth::user()->id)->with(['registroTiempo'])->first();
        //dd($user);
        $subscriptions = Subscription::with(['product'])->where('user_id', $user->id)->get();
        //dd($subscriptions);
        $activeSubscription = $subscriptions->where('stripe_status', 'active')->first();
        //dd($activeSubscription);

        if ($activeSubscription) {
            $productos = Producto::where('type', 'package')->with(['infoPaquete', 'infoSuscripcion'])->get();
            $suscripcionStripe = SubscriptionStripe::retrieve($activeSubscription->stripe_id);
            //dd($suscripcionStripe, $activeSubscription);
            $fechaFinPeriodo = $suscripcionStripe->current_period_end;
            $lastInvoice = $suscripcionStripe->latest_invoice;
            if ($lastInvoice) {
                $invoice = Invoice::retrieve($lastInvoice);
                $paymentIntent = PaymentIntent::retrieve($invoice->payment_intent);

                $fechaUltimoPago = date('D, d M Y', $paymentIntent->created);
            }

            return view('usuario.submenu.SUS-estadoSuscripcion', compact('tipo', 'user', 'productos', 'activeSubscription', 'fechaUltimoPago', 'fechaFinPeriodo'));

        } else {
            $productos = Producto::with(['infoPaquete', 'infoSuscripcion'])->get();

            return view('usuario.submenu.SUS-estadoSuscripcion', compact('tipo', 'user', 'productos', 'activeSubscription'));
        }

        //dd($productos);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:membership,package',
            'price' => 'required|numeric|min:0',
        ], [
            'name.required' => 'El campo nombre es requerido',
            'name.string' => 'El campo nombre debe contener texto',
            'name.max' => 'El campo nombre solo puede contener 255 caracteres',

            'description.string' => 'El campo descripcion debe contener texto',

            'type.required' => 'El campo tipo de producto es requerido',
            'type.in' => 'El campo tipo debe ser o paquete de clases o suscripcion',

            'price' => 'El campo precio es requerido',
            'price.numeric' => 'El campo precio es un campo numerico entero',
            'price.min' => 'El campo precio debe contener al menos 0',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //dd($request->type);
        switch ($request->type) {
            case 'package':
                $validatorPaquete = Validator::make($request->all(), [
                    'numero_clases_paquete' => 'required|integer|min:1',
                    'tiempo_clase_paq' => 'required|integer|in:45,60,120',
                ], [
                    'numero_clases_paquete.required' => 'El campo numero de clases es requerido',
                    'numero_clases_paquete.integer' => 'El campo numero de clases es un numero',
                    'numero_clases_paquete.min' => 'El campo numero de clases debe contener al menos 1',

                    'tiempo_clase_paq.required' => 'El campo de tiempo de clasePaquete es requerido',
                    'tiempo_clase_paq.integer' => 'El campo tiempo de clasePaquete debe ser un numero en minutos',
                    'tiempo_clase_paq.min' => 'El campo tiempo de clasePaquete debe ser al menos 30',

                ]);

                if ($validatorPaquete->fails()) {
                    return redirect()->back()->withErrors($validatorPaquete)->withInput();
                }

                $creadoProducto = $this->crearProductoStripe($request, 'paquete');

                return $creadoProducto;

            case 'membership':
                $validatorSuscripcion = Validator::make($request->all(), [
                    'numero_clases_semanal' => 'required|integer|min:1',
                    'tiempo_clase_sus' => 'required|integer|in:45,60,120',
                    'asesoramiento' => 'required|in:inicial,mensual,semanal',
                    'dias_cancelacion' => 'required|integer',

                ], [
                    'numero_clases_semanal.required' => 'El campo numero de clases es requerido',
                    'numero_clases_semanal.integer' => 'El campo numero de clases es un numero',
                    'numero_clases_semanal.min' => 'El campo numero de clases debe contener al menos 1',

                    'tiempo_clase_sus.required' => 'El campo de tiempo de clase es requerido',
                    'tiempo_clase_sus.integer' => 'El campo tiempo de clase debe ser un numero en minutos',
                    'tiempo_clase_sus.min' => 'El campo tiempo de clase debe ser al menos 30',

                    'asesoramiento.required' => 'El campo descuento es requerido',
                    'asesoramiento.in' => 'El campo descuento debe ser inicial mensual o semanal',

                ]);

                if ($validatorSuscripcion->fails()) {
                    return redirect()->back()->withErrors($validatorSuscripcion)->withInput();
                }
                $creadoProducto = $this->crearProductoStripe($request, 'suscripcion');

                return $creadoProducto;
        }

    }

    public function crearProductoStripe(Request $request, $tipo)
    {
        //dd($request->all());
        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $stripeProducto = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'metadata' => [
                    'type' => $request->type,
                    'quantity' => $request->quantity,
                ],
            ]);

            $stripePriceData = [
                'unit_amount' => $request->price * 100,
                'currency' => 'eur',
                'product' => $stripeProducto->id,
            ];

            if ($request->type == 'membership') {
                $stripePriceData['recurring'] = ['interval' => 'month'];
            } else {
                // Ensure no 'recurring' field for one-time prices
                unset($stripePriceData['recurring']);
            }

            $stripePrice = Price::create($stripePriceData);

            $productoBD = Producto::create([
                'stripe_id' => $stripeProducto->id,
                'name' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
                'precio' => $request->price,
                'precio_stripe_id' => $stripePrice->id,
            ]);
            try {

                switch ($tipo) {

                    case 'paquete':
                        InfoPaquete::create([
                            'producto_id' => $productoBD->id,
                            'numero_clases' => $request->numero_clases_paquete,
                            'tiempo_clase' => $request->tiempo_clase_paq,
                            'tiempo_validez' => $request->validez,
                        ]);
                        break;

                    case 'suscripcion':
                        //dd($tipo);
                        InfoSuscripcione::create([
                            'producto_id' => $productoBD->id,
                            'clases_semanales' => $request->numero_clases_semanal,
                            'tiempo_clase' => $request->tiempo_clase_sus,
                            'asesoramiento' => $request->asesoramiento,
                            'dias_cancelacion' => $request->dias_cancelacion,
                            'beneficios' => $request->beneficios == 'true' ? true : false,
                        ]);
                        break;
                }
            } catch (\Throwable $th) {
                \Log::error('Error: '.$th->getMessage());

                return redirect()->back()->with('error', 'Hubo un problema al crear el producto.');

            }

            return redirect()->back()->with('success', 'El producto '.$productoBD->name.' se ha creado exitosamente');

        } catch (\Throwable $th) {
            \Log::error('Error: '.$th->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al crear el producto.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //dd($producto::with(['infoPaquete'])->get());
        $producto = Producto::where('id', $producto->id)->with(['infoPaquete', 'infoSuscripcion'])->first();
        $tipoProducto = $producto->type;
        $tipo = 'FACTU-productos';
        \Log::info('Informacion a la vista '.$tipoProducto);
        
        $productos = Producto::with(['infoPaquete', 'infoSuscripcion'])->get();


        //dd($productos);
        return view('admin.FACTU-productos', compact('tipo','producto', 'productos', 'tipoProducto'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'type' => 'required|in:membership,package',
                'price' => 'required|numeric|min:0',
            ], [
                'name.required' => 'El campo nombre es requerido',
                'name.string' => 'El campo nombre debe contener texto',
                'name.max' => 'El campo nombre solo puede contener 255 caracteres',

                'description.string' => 'El campo descripcion debe contener texto',

                'type.required' => 'El campo tipo de producto es requerido',
                'type.in' => 'El campo tipo debe ser o paquete de clases o suscripcion',

                'price' => 'El campo precio es requerido',
                'price.numeric' => 'El campo precio es un campo numerico entero',
                'price.min' => 'El campo precio debe contener al menos 0',

            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            //dd($request->type);
            switch ($request->type) {
                case 'package':
                    $validatorPaquete = Validator::make($request->all(), [
                        'numero_clases_paquete' => 'required|integer|min:1',
                        'tiempo_clase_paq' => 'required|integer|in:45,60,120',
                    ], [
                        'numero_clases_paquete.required' => 'El campo numero de clases es requerido',
                        'numero_clases_paquete.integer' => 'El campo numero de clases es un numero',
                        'numero_clases_paquete.min' => 'El campo numero de clases debe contener al menos 1',

                        'tiempo_clase_paq.required' => 'El campo de tiempo de clase es requerido',
                        'tiempo_clase_paq.integer' => 'El campo tiempo de clase debe ser un numero en minutos',
                        'tiempo_clase_paq.min' => 'El campo tiempo de clase debe ser al menos 30',

                    ]);

                    if ($validatorPaquete->fails()) {
                        return redirect()->back()->withErrors($validatorPaquete)->withInput();
                    }

                    $actualizadoProducto = $this->actualizarProductoStripe($request, 'paquete', $producto);

                    return $actualizadoProducto;

                case 'membership':
                    $validatorSuscripcion = Validator::make($request->all(), [
                        'numero_clases_semanal' => 'required|integer|min:1',
                        'tiempo_clase_sus' => 'required|integer|in:45,60,120',
                        'asesoramiento' => 'required|in:inicial,mensual,semanal',
                        'dias_cancelacion' => 'required|integer',

                    ], [
                        'numero_clases_semanal.required' => 'El campo numero de clases es requerido',
                        'numero_clases_semanal.integer' => 'El campo numero de clases es un numero',
                        'numero_clases_semanal.min' => 'El campo numero de clases debe contener al menos 1',

                        'tiempo_clase_sus.required' => 'El campo de tiempo de clase es requerido',
                        'tiempo_clase_sus.integer' => 'El campo tiempo de clase debe ser un numero en minutos',
                        'tiempo_clase_sus.min' => 'El campo tiempo de clase debe ser al menos 30',

                        'asesoramiento.required' => 'El campo descuento es requerido',
                        'asesoramiento.in' => 'El campo descuento debe ser inicial mensual o semanal',

                    ]);

                    if ($validatorSuscripcion->fails()) {
                        return redirect()->back()->withErrors($validatorSuscripcion)->withInput();
                    }
                    $actualizadoProducto = $this->actualizarProductoStripe($request, 'suscripcion', $producto);

                    return $actualizadoProducto;
            }

        } catch (\Throwable $th) {
            \Log::error('Error Validación: '.$th->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema con la validación de los datos.');
        }
    }

    public function actualizarProductoStripe(Request $request, $tipo, Producto $producto)
    {
        //dd($request->all());
        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $stripeProducto = Product::update($producto->stripe_id, [
                'name' => $request->name,
                'description' => $request->description,
                'metadata' => [
                    'type' => $request->type,
                    'quantity' => $request->quantity,
                ],
            ]);

            Price::update($producto->precio_stripe_id, [
                'active' => false,
            ]);

            $stripePrice = Price::create([
                'unit_amount' => $request->price * 100,
                'currency' => 'eur',
                'recurring' => $request->type == 'membership' ? ['interval' => 'month'] : null,
                'product' => $stripeProducto->id,
            ]);

            $producto->name = $request->name;
            $producto->description = $request->description;
            $producto->type = $request->type;
            $producto->precio = $request->price;
            $producto->precio_stripe_id = $stripePrice->id;

            $producto->save();

            switch ($tipo) {
                case 'paquete':
                    $paqueteInfo = InfoPaquete::firstOrNew(['producto_id' => $producto->id]);
                    $paqueteInfo->numero_clases = $request->numero_clases_paquete;
                    $paqueteInfo->tiempo_clase = $request->tiempo_clase_paq;
                    $paqueteInfo->tiempo_validez = $request->validez;
                    $paqueteInfo->save();
                    InfoSuscripcione::where('producto_id', $producto->id)->delete();
                    break;

                case 'suscripcion':
                    $suscripcionInfo = InfoSuscripcione::firstOrNew(['producto_id' => $producto->id]);
                    $suscripcionInfo->clases_semanales = $request->numero_clases_semanal;
                    $suscripcionInfo->tiempo_clase = $request->tiempo_clase_sus;
                    $suscripcionInfo->asesoramiento = $request->asesoramiento;
                    $suscripcionInfo->dias_cancelacion = $request->dias_cancelacion;
                    $suscripcionInfo->beneficios = $request->beneficios == 'off' ? '0' : '1';
                    $suscripcionInfo->save();
                    InfoPaquete::where('producto_id', $producto->id)->delete();
                    break;
            }

            return redirect()->back()->with('success', 'El producto '.$producto->name.' se ha actualizado exitosamente');

        } catch (\Throwable $th) {
            \Log::error('Error: '.$th->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al actualizar el producto. Error: '.$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            Product::update($producto->stripe_id, [
                'active' => false,
            ]);

            $preciosProducto = Price::all(['product' => $producto->stripe_id, 'limit' => 100]);

            // Desactivar todos los precios del producto en Stripe
            foreach ($preciosProducto->data as $precio) {
                Price::update($precio->id, ['active' => false]);
            }

            $producto->delete();

            return redirect()->back()->with('success', 'El producto se ha borrado con éxito');
        } catch (\Exception $e) {
            \Log::error('Error Stripe: '.$e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al eliminar el producto en Stripe.');
        }
    }

    public function gestionarProductos()
    {
        $productos = Producto::with(['infoPaquete', 'infoSuscripcion'])->get();
        //dd($productos);

        $tipo = 'FACTU-productos';

        return view('admin.FACTU-productos', compact('tipo', 'productos'));
    }

    public function cambiarPlan()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $suscripcionUsuario = Subscription::where('user_id', Auth::user()->id)->first();
        if ($suscripcionUsuario == null) {
            return redirect()->route('suscripcion-estadoSuscripcion')->with('error', 'Aun no dispones de una suscripcion para poder cambiar el plan');
        }
        $productoUsuario = Producto::where('precio_stripe_id', $suscripcionUsuario->stripe_price)->first();

        $productosRestantes = Producto::whereNot('stripe_id', $productoUsuario->stripe_id)->get();

        //dd($productosRestantes);

        return view('usuario.submenu.SUS-cambioPlan', compact('productosRestantes'));
    }

    public function mostrarDetalles($producto)
    {
        $paginas = Pagina::all();
        $mostrarProducto = true;
        $producto = Producto::find($producto);
        $productos = Producto::all();

        return view('mostrarProducto', compact('mostrarProducto', 'paginas', 'producto', 'productos'));
    }

    public function mostrarDetallesSuscripcion()
    {
        $usuario = Auth::user();

        $suscripcionUsuario = Subscription::where('user_id', $usuario->id)->first();
        if ($suscripcionUsuario == null) {
            return redirect()->route('suscripcion-estadoSuscripcion')->with('error', 'Aun no dispones de una suscripcion para poder ver sus detalles. ¡Contrata una ahora!');
        }

        $suscripcion = Producto::where('id', $suscripcionUsuario->producto_id)->with(['infoSuscripcion'])->first();

        return view('usuario.submenu.SUS-detallesPlan', compact('suscripcion'));

    }

    public function mostrarClases()
    {
        $productos = Producto::with(['infoPaquete', 'infoSuscripcion'])->get();

        //dd($productos);
        return view('clases', compact('productos'));
    }
}
