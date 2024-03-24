<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Reserva;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idAlumno = Auth()->user()->id;
        $reservas = Reserva::where('alumno_id', '=', $idAlumno)->get();
        //dd($reservas);
        $clases = Clase::all();
        $clasesAlumno = [];
        foreach ($clases as $clase) {
            $idAlumnoClase = $clase->reserva->alumno_id;
            if ($idAlumnoClase == $idAlumno) {
                array_push($clasesAlumno,$clase);
                //dd($clasesAlumno);
            }

        }
        return view('usuario.submenu.RES-histoReservas', compact('clasesAlumno','reservas'));
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
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        //
    }

    public function obtenerClasesReservadas()
    {
        $reservas = Reserva::where('alumno_id', '=', Auth()->user()->id)
            ->whereHas('asistencias', function ($query) {
                $query->where('asistio', '=', 0);
            })->get();

        return view('usuario.submenu.RES-reservasActivas', compact('reservas'));
    }
}
