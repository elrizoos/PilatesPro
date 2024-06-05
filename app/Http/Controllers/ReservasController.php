<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Horario;
use App\Models\Reserva;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = User::where('id', Auth::user()->id)->with('grupo')->first();
        $grupoUsuario = Auth::user()->grupo_id;
        if ($grupoUsuario === null) {
            \Log::error('El usuario no tiene grupo, asi que no se muestran reservas asociadas');
            return view('usuario.submenu.RES-histoReservas', compact('grupoUsuario'));
        }
        $reservas = Reserva::where('alumno_id', $usuario->id)->get();
        if ($reservas->count() == 0) {
            $reservas = '';

            return view('usuario.submenu.RES-histoReservas', compact('reservas'));
        }
        $claseId = $usuario->grupo->clase->id;
        $reservas = '';

        return view('usuario.submenu.RES-histoReservas', compact('clasesAlumno', 'reservas'));
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

    public function mostrarSugerencias()
    {
        $usuario = User::where('id', Auth::user()->id)->with(['grupo.clase', 'registroTiempo'])->first();

        if ($usuario->registroTiempo->clases_totales == 0) {
            return redirect()->route('suscripcion-estadoSuscripcion')->with('error', 'No tienes clases disponibles para reservar');
        }
        if (!$usuario->grupo || $usuario->grupo->clase->isEmpty()) {
            return redirect()->back()->with('error', 'No se encontraron clases para tu grupo.');
        }

        $clase = $usuario->grupo->clase->first();
        $horariosClase = Horario::where('clase_id', $clase->id)->get();

        $dayCount = 1;
        $fechaActual = Carbon::now();
        $diasMes = $fechaActual->daysInMonth;
        $primerDiaMes = $fechaActual->copy()->startOfMonth()->dayOfWeekIso;
        $semanasMes = ceil(($diasMes + $primerDiaMes - 1) / 7);

        return view('usuario.submenu.RES-sugerenciasReservas', compact('horariosClase', 'dayCount', 'diasMes', 'primerDiaMes', 'semanasMes', 'fechaActual'));
    }

    public function mostrarHorariosFecha(Request $request)
    {
        $horarios = Horario::where('fecha_especifica', $request->fecha)->get();
        return view('usuario.submenu.RES-mostrarHorariosFecha', compact('horarios'));
    }

    public function reservar(Request $request)
    {
        dd($request->all());


    }

}
