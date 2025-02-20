<?php

namespace App\Http\Controllers;

use App\Models\Conversacione;
use App\Models\Mensaje;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MensajeController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Conversacione $conversacione)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $message = new Mensaje([
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        $conversacione->messages()->save($message);

        return redirect()->route('conversaciones.show', $conversacione);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mensaje $mensaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mensaje $mensaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mensaje $mensaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mensaje $mensaje)
    {
        //
    }

    public function leerMensaje(Mensaje $mensaje){
        
    }
}
