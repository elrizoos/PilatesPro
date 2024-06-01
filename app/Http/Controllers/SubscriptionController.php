<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Subscription;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        //
    }




    public function success(Request $request)
    {
        $session = Session::retrieve($request->session_id);
        // Aquí puedes manejar la lógica para guardar la suscripción en tu base de datos
        // Por ejemplo:
        Subscription::create([
            'user_id' => auth()->id(),
            'stripe_subscription_id' => $session->subscription,
            'status' => 'active',
            'expires_at' => now()->addMonth(),
        ]);

        return redirect()->route('usuario.submenu.SUS-estadoSuscripcion')->with('success', 'Suscripción activada correctamente');
    }

    public function cancel()
    {
        return redirect()->route('usuario.submenu.SUS-estadoSuscripcion')->with('error', 'El pago de la suscripción fue cancelado');
    }
}
