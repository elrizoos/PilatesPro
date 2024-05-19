<?php

namespace App\Http\Controllers;

use App\Models\Membresia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Product;
use Stripe\Price;
use Stripe\Stripe;

class MembresiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $membresias = Membresia::all();
        $tipo = 'FACTU-membresias';

        return view('admin.FACTU-membresias', compact('tipo', 'membresias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $membresia = new Membresia;

        $membresia->nombre = $request->nombre;
        $membresia->precio = $request->precio;
        $membresia->descripcion = $request->descripcion;


        $precio = $this->crearProductoStripe($membresia);
        $membresia->price_id = $precio->id;


        $membresia->save();


        return redirect()->back()->with('success', 'La membresia se ha creado con exito')->with('editable', null);
    }

    /**
     * Display the specified resource.
     */
    public function show(Membresia $membresia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Membresia $membresium)
    {
        //dd($membresium);
        $membresias = Membresia::all();
        session()->flash('editable', $membresium->id);
        $tipo = 'FACTU-membresias';

        return view('admin.FACTU-membresias', compact('tipo', 'membresium', 'membresias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Membresia $membresium)
    {
        //dd($request->all());
        $membresium->nombre = $request->nombre_editable;
        $membresium->precio = $request->precio_editable;
        $membresium->descripcion = $request->descripcion_editable;

        $membresium->save();

        $editable = null;

        $membresias = Membresia::all();
        $tipo = 'FACTU-membresias';
        session()->forget('editable');
        return view('admin.FACTU-membresias', compact('tipo', 'editable', 'membresias'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Membresia $membresia)
    {
        //
    }

    public function crearProductoStripe($membresia)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $producto = Product::create([
            'name' => $membresia->nombre,
            'description' => $membresia->descripcion,
        ]);

        $precio = Price::create([
            'unit_amount' => $membresia->precio * 100,
            'currency' => 'eur',
            'recurring' => ['interval' => 'month'],
            'product' => $producto->id,
        ]);

        return $precio;
    }
}
