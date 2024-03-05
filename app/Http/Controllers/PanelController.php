<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = User::where('tipo_usuario', '=', 'alumno')->get();
        $profesores = User::where('tipo_usuario', '=', 'profesor')->get();
        $reservas = Reserva::get();
        
        //depuracion
        //dd('Alumnos: ' . $alumnos);
        //dd('Profesores: ' . $profesores);
        //dd('Reservas: ' . $reservas);

        return view('panel-control', compact(['alumnos','profesores','reservas']));
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
    public function show(Panel $panel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Panel $panel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Panel $panel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panel $panel)
    {
        //
    }
}
