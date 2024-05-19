<?php

namespace App\Http\Controllers;

use App\Models\Membresia;
use App\Models\Pago;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

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

    public function pagar($usuario, $membresia, Request $request){
        $datos = $request->all();

        $membresia = Membresia::find($membresia);

        $this->realizarPago($datos, $membresia);
    }

    public function realizarPago($datos, $membresia){
        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $token = $datos['stripeToken'];

            $charge = Charge::create([
                'amount' => (int) $membresia->precio,
                'currency' => 'eur',
                'description' => $membresia->descripcion,
                'source' => $token,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

        
    }

    public function registrarPago($usuario, $membresia) {

    }
}
