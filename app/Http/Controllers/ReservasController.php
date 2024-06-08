<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Clase;
use App\Models\Horario;
use App\Models\Reserva;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = User::where('id', Auth::user()->id)->with('grupo.clases')->first();
        $grupoUsuario = $usuario->grupo_id;

        if ($grupoUsuario === null) {
            \Log::error('El usuario no tiene grupo, así que no se muestran reservas asociadas');
            return view('usuario.submenu.RES-histoReservas', compact('grupoUsuario'));
        }

        $reservas = Reserva::where('alumno_id', $usuario->id)->with(['horario', 'asistencias'])->get();

        if ($reservas->isEmpty()) {
            return view('usuario.submenu.RES-histoReservas', compact('grupoUsuario'));
        }

        $reservasPasadas = $reservas->filter(function ($reserva) {
            return $reserva->horario->fecha_especifica < now();
        });

        $reservasFuturas = $reservas->filter(function ($reserva) {
            return $reserva->horario->fecha_especifica >= now();
        });

        if (count($reservasPasadas) == 0 && count($reservasFuturas) == 0) {
            return view('usuario.submenu.RES-histoReservas', compact('grupoUsuario'));
        }

        return view('usuario.submenu.RES-histoReservas', compact('reservasPasadas', 'reservasFuturas', 'grupoUsuario'));
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
                $query->where('asistio', '=', 0)->where('fecha', '>=', now());
            })->with(['asistencias', 'horario'])->get();

        return view('usuario.submenu.RES-reservasActivas', compact('reservas'));
    }

    public function mostrarSugerencias()
    {
        $usuario = User::where('id', Auth::user()->id)->with(['grupo.clases', 'registroTiempo'])->first();

        if ($usuario->registroTiempo->clases_totales == 0) {
            return redirect()->route('suscripcion-estadoSuscripcion')->with('error', 'No tienes clases disponibles para reservar');
        }

        if (!$usuario->grupo || $usuario->grupo->clases->isEmpty()) {
            return redirect()->back()->with('error', 'No se encontraron clases para tu grupo.');
        }

        $clase = $usuario->grupo->clases->first();

        $horariosClase = Horario::where('clase_id', $clase->id)
            ->whereDoesntHave('reserva', function ($query) use ($usuario) {
                $query->where('alumno_id', $usuario->id);
            })->where('fecha_especifica', '>=', now())
            ->get();

        $dayCount = 1;
        $fechaActual = Carbon::now();
        $diasMes = $fechaActual->daysInMonth;
        $primerDiaMes = $fechaActual->copy()->startOfMonth()->dayOfWeekIso;
        $semanasMes = ceil(($diasMes + $primerDiaMes - 1) / 7);

        return view('usuario.submenu.RES-sugerenciasReservas', compact('horariosClase', 'dayCount', 'diasMes', 'primerDiaMes', 'semanasMes', 'fechaActual'));
    }


    public function mostrarHorariosFecha(Request $request)
    {
        $alumnoId = Auth::user()->id;

        $horarios = Horario::where('fecha_especifica', $request->fecha)
            ->with(['reserva'])
            ->get();

        $horariosDisponibles = $horarios->filter(function ($horario) use ($alumnoId) {
            return !$horario->reserva->contains('alumno_id', $alumnoId);
        });

        return view('usuario.submenu.RES-mostrarHorariosFecha', ['horarios' => $horariosDisponibles]);
    }



    public function reservar(Request $request)
    {
        // Validar entrada
        $request->validate([
            'horario' => 'required|exists:horarios,id',
        ]);

        DB::beginTransaction();

        try {
            // Obtener el horario
            $horario = Horario::find($request->horario);
            \Log::info('Horario encontrado: ' . json_encode($horario));

            // Crear reserva
            $reserva = Reserva::create([
                'horario_id' => $request->horario,
                'alumno_id' => Auth::user()->id,
            ]);
            \Log::info("Reserva creada con éxito: " . json_encode($reserva));

            // Crear asistencia
            $asistencia = Asistencia::create([
                'reserva_id' => $reserva->id,
                'fecha' => $horario->fecha_especifica,  // Aquí deberías poner la fecha correspondiente
            ]);
            \Log::info("Asistencia creada con éxito: " . json_encode($asistencia));

            // Confirmar transacción
            DB::commit();

            return redirect()->back()->with('success', 'Reserva realizada con éxito');

        } catch (\Throwable $th) {
            // Revertir transacción
            DB::rollBack();

            \Log::error('Error en el proceso de reserva: ' . $th->getMessage());

            return redirect()->back()->with('error', 'Ocurrió un error durante el proceso de reserva. Por favor, inténtelo de nuevo.');
        }
    }


    public function cancelarReserva($reservaId){
        $reserva = Reserva::find($reservaId);
        $reserva->delete();
        return redirect()->back()->with('success', 'La reserva se ha cancelado con exito');
    }

    public function marcarAsistencia(Reserva $reserva, User $user){

        $asistencia  = Asistencia::where('reserva_id', $reserva->id);

        $asistencia->update([
            'asistio' => 1,
        ]);

        return redirect()->back()->with('success', 'Asistencia marcada con éxito');
    }
}
