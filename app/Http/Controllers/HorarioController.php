<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Horario;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::all();
        //dd($horarios);
        $eventosFormateados = $horarios->map(function ($evento) {
            $dia = new DateTime($evento->fecha_especifica);
            $numeroDia = $dia->format('z') + 1;

            $horasDecimalStart = $this->convertirHoraADecimal($evento->hora_inicio);
            $horasDecimalFin = $this->convertirHoraADecimal($evento->hora_fin);
            //dd($horasDecimalFin, $horasDecimalStart);
            $diferenciaHoras = $horasDecimalFin - $horasDecimalStart;
            $alturaDiv = $diferenciaHoras * (30 / 13);
            $posicionArriba = (($horasDecimalStart - 8) * (30 / 13));

            return [
                'numeroDia' => $numeroDia,
                'alturaDiv' => number_format($alturaDiv, 2, '.', ''),
                'posicionArriba' => number_format($posicionArriba, 2, '.', ''),
                'evento' => $evento,
            ];
        });

        $today = now()->dayOfYear();

        //dd($eventosFormateados);
        return view('admin.HORARIO-inicio', ['today' => $today, 'tipo' => 'HORARIO-inicio', 'eventosFormateados' => $eventosFormateados]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clases = Clase::all();
        if ($clases == null) {
            return redirect()->route('clase.create');
        }

        $tipo = 'HORARIO-crear';

        return view('admin.HORARIO-crear', compact('tipo', 'clases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //dd($request->all());
            // Validar los datos de entrada
            $request->validate([
                'clase' => 'required|exists:clases,id',
                'fechaEspecifica' => 'required|date',
                'horaInicio' => 'required|date_format:H:i',
                'horaFin' => 'required|date_format:H:i|after:horaInicio',
                'repetir' => 'nullable',
            ], [
                'clase.required' => 'La clase es obligatoria.',
                'clase.exists' => 'La clase seleccionada no existe.',
                'fechaEspecifica.required' => 'La fecha específica es obligatoria.',
                'fechaEspecifica.date' => 'La fecha específica debe ser una fecha válida.',
                'horaInicio.required' => 'La hora de inicio es obligatoria.',
                'horaInicio.date_format' => 'La hora de inicio debe tener el formato HH:MM.',
                'horaFin.required' => 'La hora de fin es obligatoria.',
                'horaFin.date_format' => 'La hora de fin debe tener el formato HH:MM.',
                'horaFin.after' => 'La hora de fin debe ser posterior a la hora de inicio.',
            ]);

            $fechaEspecifica = Carbon::parse($request->fechaEspecifica);
            $horaInicio = $request->horaInicio;
            $horaFin = $request->horaFin;
            $tiempoClase = $request->tiempoClase;
            if ($request->repetir === null) {
                $this->crearHorario($request->clase, $fechaEspecifica, $horaInicio, $horaFin, $tiempoClase);
            } else {
                $fechasDias = $this->averiguarDiasFecha($request->diasSemana, $request->fechaEspecifica, $request->numeroSemanas);
                foreach ($fechasDias as $fecha) {
                    $this->crearHorario($request->clase, $fecha, $horaInicio, $horaFin, $tiempoClase);
                }
            }

            return redirect()->back()->with('success', 'El registro horario se ha agregado con éxito');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ha ocurrido un error: '.$e->getMessage());
        }
    }

    private function crearHorario($claseId, Carbon $fecha, $horaInicio, $horaFin, $tiempoClase)
    {
        Horario::create([
            'clase_id' => $claseId,
            'dia_semana' => $fecha->format('l'),
            'fecha_especifica' => $fecha->toDateString(),
            'hora_inicio' => $horaInicio,
            'hora_fin' => $horaFin,
            'tiempo_clase' => $tiempoClase,
        ]);
    }

    public function averiguarDiasFecha($dias, $fechaInicio, $numeroSemanas)
    {
        $fechasDias = [];
        $diasAsociados = [
            'Monday' => 0,
            'Tuesday' => 1,
            'Wednesday' => 2,
            'Thursday' => 3,
            'Friday' => 4,
            'Saturday' => 5,
            'Sunday' => 6,
        ];

        $fecha = new DateTime($fechaInicio);

        for ($semana = 0; $semana < $numeroSemanas; $semana++) {
            foreach ($dias as $dia) {
                $fechaDia = clone $fecha;
                $indiceFechaInicio = $diasAsociados[$fecha->format('l')];
                $offsetDias = ($diasAsociados[$dia] - $indiceFechaInicio + 7) % 7;
                $fechaDia->modify("+$offsetDias days");
                if ($semana > 0) {
                    $fechaDia->modify('+'.$semana.' weeks');
                }
                $carbonFecha = Carbon::instance($fechaDia);
                if (!in_array($carbonFecha, $fechasDias)) {
                $fechasDias[] = $carbonFecha;
            }
            }
        }

        return $fechasDias;
    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        $reservas = $horario->reserva;

        $claseHorario = $horario->clase;

        $grupoHorario = $horario->clase->grupo;

        $profesor = $horario->clase->grupo->profesor;

        $alumnos = $horario->clase->grupo->usuarios;

        $tipo = 'HORARIO-editar';

        return view('admin.HORARIO-editar', compact('tipo', 'horario', 'reservas', 'claseHorario', 'grupoHorario', 'profesor', 'alumnos'));
    }

    public function editarHorario(Horario $horario)
    {

        $clases = Clase::all();
        if ($clases == null) {
            return redirect()->route('clase.create');
        }

        $tipo = 'HORARIO-crear';

        return view('admin.HORARIO-crear', compact('horario', 'clases', 'tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $horario)
    {
        $horario = Horario::find($horario);

        $horario->update([
            'clase_id' => $request->clase,
            'dia_semana' => $request->diaSemana,
            'fecha_especifica' => $request->fechaEspecifica,
            'hora_inicio' => $request->horaInicio,
            'hora_fin' => $request->horaFin,
        ]);

        return redirect()->back()->with('success', 'El registro se ha actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('mostrarHorarios')->with('success', 'Horario eliminado con exito');
    }

    public function mostrarHorarios()
    {
        $horarios = Horario::paginate(20);

        $clases = Clase::all();

        $tipo = 'HORARIO-inicio';

        return view('admin.HORARIO-inicio', compact('tipo', 'horarios', 'clases'));
    }

    private function convertirHoraADecimal($hora)
    {
        //dd($hora);
        [$horas, $minutos] = explode(':', $hora);

        return round((int) $horas + (int) $minutos / 60, 2);
    }
    
}
