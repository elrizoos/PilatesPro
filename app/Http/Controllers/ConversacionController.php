<?php

namespace App\Http\Controllers;

use App\Models\Conversacione;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ConversacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conversaciones = Conversacione::where('user_one_id', Auth::user()->id)->orWhere('user_two_id', Auth::user()->id)->get();

        return view('conversaciones.index', compact('conversaciones'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereNot('id', Auth::user()->id)->get();
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
            'user_one_id' => Auth::user()->id,
            'user_two_id' => $request->user_two_id,
        ]);

        return redirect()->route('conversaciones.show', $conversacion);
    }

    /**
     * Display the specified resource.
     */
    public function show(Conversacione $conversacione)
    {
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
