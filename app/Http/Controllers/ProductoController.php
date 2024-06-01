<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Auth;
use Illuminate\Http\Request;
use Stripe\Price;
use Stripe\Product;
use Stripe\Stripe;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();
        $subscriptions = Subscription::where('user_id', $user->id)->get();
        $activeSubscription = $subscriptions->where('status', 'active')->first();

        if ($activeSubscription) {
            $productos = Producto::where('type', 'package')->get();
        } else {
            $productos = Producto::all();
        }


        $tipo = 'SUS-estadoSuscripcion';
        return view('usuario.submenu.SUS-estadoSuscripcion', compact('tipo', 'productos', 'activeSubscription'));

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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:membership,package',
            'price' => 'required|numeric|min:0',
            'quantity' => 'nullable|integer|min:1',
        ]);

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

            $stripePrice = Price::create([
                'unit_amount' => $request->price * 100,
                'currency' => 'eur',
                'recurring' => $request->type == 'membership' ? ['interval' => 'month'] : null,
                'product' => $stripeProducto->id,
            ]);

            Producto::create([
                'stripe_id' => $stripeProducto->id,
                'name' => $request->name,
                'description' => $request->description,
                'type' => $request->type,
                'precio' => $request->price,
                'quantity' => $request->quantity,
                'precio_stripe_id' => $stripePrice->id,
            ]);

            return redirect()->route('productos')->with('success', 'Producto creado correctamente');
        } catch (\Throwable $th) {
            \Log::error('Error: ' . $th->getMessage());
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
        //dd($producto);
        $productoEditable = $producto->id;
        $tipoProducto = $producto->type;
        return redirect()->back()->with(['editable' => $productoEditable, 'tipoProducto' => $tipoProducto, 'producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'quantity' => 'nullable|integer|min:1',
            ]);

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

                $producto->update([
                    'stripe_id' => $producto->stripe_id,
                    'name' => $request->name,
                    'description' => $request->description,
                    'type' => $request->type,
                    'precio' => $request->price,
                    'quantity' => $request->quantity,
                    'precio_stripe_id' => $stripePrice->id,
                ]);

                return redirect()->back()->with('success', 'El producto se ha actualizado con éxito');
            } catch (\Exception $e) {
                \Log::error('Error Stripe: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Hubo un problema al actualizar el producto en Stripe.');
            }
        } catch (\Throwable $th) {
            \Log::error('Error Validación: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Hubo un problema con la validación de los datos.');
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
            \Log::error('Error Stripe: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un problema al eliminar el producto en Stripe.');
        }
    }


    public function gestionarProductos()
    {
        $productos = Producto::all();


        $tipo = 'FACTU-productos';
        return view('admin.FACTU-productos', compact('tipo', 'productos'));
    }
}
