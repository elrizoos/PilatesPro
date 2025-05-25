<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Conversacione;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MensajeVistoController;

class ConversacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conversaciones = Conversacione::where('user_one_id', Auth()->id())->orWhere('user_two_id', Auth()->id())->get();
        //dd($conversacionesSinLeer);
        return view('conversaciones.index', compact('conversaciones'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereNot('id', Auth()->id())->get();
        return view('conversaciones.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_two_id' => 'required|exists:users,id',
        ]);

        $conversacion = Conversacione::create([
            'user_one_id' => Auth()->id(),
            'user_two_id' => $request->user_two_id,
        ]);

        return redirect()->route('conversaciones.show', $conversacion);
    }

    /**
     * Display the specified resource.
     */
    public function show(Conversacione $conversacione)
    {
        foreach ($conversacione->messages as $message) {
            $controladorMensajesVistos = new MensajeVistoController();
            $controladorMensajesVistos->update($message->mensajesVistos);
        }
        return view('conversaciones.show', compact('conversacione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conversacione $conversacione)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conversacione $conversacione)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conversacione $conversacione)
    {
        //
    }

   
}
