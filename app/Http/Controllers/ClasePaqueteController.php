<?php

namespace App\Http\Controllers;

use App\Models\ClasePaquete;
use App\Http\Controllers\Controller;
use App\Models\Membresia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Stripe\Price;
use Stripe\Product;
use Stripe\Stripe;
use Validator;

class ClasePaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $datos = [];
        $paquetes = ClasePaquete::all();
        foreach($paquetes as $paquete) {
            $producto = Product::retrieve($paquete->producto_id);

            $datos[] = [
                'paquete' => $paquete,
                'producto' => $producto,
            ];
        }
        //dd($datos);
        $tipo = 'FACTU-productos';
        return view('admin.FACTU-productos', compact('datos', 'tipo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.FACTU-productos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero_clases' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0.01',
        ]);

        Stripe::setApiKey(config('services.stripe.secret'));


        $producto = Product::create([
            'name' => $request->nombre,
        ]);

        $precio = Price::create([
            'product' => $producto->id,
            'unit_amount' => $request->precio * 100,
            'currency' => 'eur',
        ]);

        $paquete = new ClasePaquete();
        $paquete->numero_clases = $request->numero_clases;
        $paquete->precio = $request->precio;
        $paquete->producto_id = $producto->id;
        $paquete->save();

        return redirect()->route('productos')->with('success', 'Paquete de clases creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClasePaquete $clasePaquete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClasePaquete $clasePaquete)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $paquetes = ClasePaquete::all();
        $editable = $clasePaquete->id;
        //dd($clasePaquete->id);
        $tipo = 'FACTU-productos';
        $membresias = Membresia::all();
        $datos  = [];
        foreach ($paquetes as $paquete) {
            $producto = Product::retrieve($paquete->producto_id);

            $datos[] = [
                'paquete' => $paquete,
                'producto' => $producto,
            ];
        }
        $edicion = 'paquete';
        //dd($datos, $membresias);
        return view('admin.FACTU-productos', compact('tipo', 'datos', 'membresias', 'edicion','editable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClasePaquete $clasePaquete)
    {
        try {
            $validator = Validator::make($request->all(), [
                'numero_clases_editable' => 'required|integer|min:1',
                'precio_editable' => 'required|numeric|min:0.01',
            ]);
            if ($validator->fails()) {
                \Log::error($validator->errors());
                return redirect()->back()->withErrors($validator)->withInput();
            }
            Stripe::setApiKey(config('services.stripe.secret'));

            $producto = Product::update($clasePaquete->producto_id, [
                'name' => $request->nombre_editable,
                'metadata' => [
                    'tipo' => 'paquete',
                ],
            ]);

            $price = Price::create([
                'product' => $producto->id,
                'unit_amount' => $request->precio_editable * 100,
                'currency' => 'eur',
            ]);

            $clasePaquete->numero_clases = $request->numero_clases_editable;
            $clasePaquete->precio = $price->unit_amount;
            $clasePaquete->save();

            return redirect()->route('productos')->with('success', 'Paquete de ' . $clasePaquete->numero_clases . ' clases');

        } catch (\Throwable $th) {
            Log::error('Mensaje de error: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($paqueteId)
    {
        $paquete = ClasePaquete::find($paqueteId);

        Stripe::setApiKey(config('services.stripe.secret'));
        Product::update($paquete->producto_id, [
            'active' => false,
        ]);

        $paquete->delete();

        return redirect()->route('productos')->with('success', 'El paquete de clases se ha borrado con exito');

    }
}
