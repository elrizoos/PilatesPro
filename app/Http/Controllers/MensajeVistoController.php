<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;
use App\Models\Conversacione;
use App\Models\MensajesVisto;
use Illuminate\Support\Facades\Auth;

class MensajeVistoController extends Controller
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
    public function store(Mensaje $message, Conversacione $conversacione)
    {
        $conversacione->user_one_id === Auth()->id() ? $usuarioId = $conversacione->user_two_id : $usuarioId =  $conversacione->user_one_id;
        
        $mensajeVisto = new MensajesVisto();
        $mensajeVisto->user_id = $usuarioId;
        $mensajeVisto->mensaje_id = $message->id;
        $mensajeVisto->mensajeVisto = 0;
        $mensajeVisto->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(MensajesVisto $mensaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MensajesVisto $mensaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MensajesVisto $mensaje)
    {
        if($mensaje->mensajeVisto === 0 && $mensaje->user_id === Auth()->id()){
            $mensaje->mensajeVisto = 1;
            $mensaje->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MensajesVisto $mensaje)
    {
        //
    }

    public function comprobarMensajesSinLeer() {
        $mensajes = MensajesVisto::where('user_id', Auth()->user()->id)->get();
        $numeroMensajes = $mensajes->count();
        return $numeroMensajes;
    }


}
