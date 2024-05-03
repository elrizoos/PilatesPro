<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Horario;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::all(); // Asegúrate de tener el modelo correcto y la relación si es necesario
        //dd($horarios);
        $eventosFormateados = $horarios->map(function ($evento) {
            $dia = new DateTime($evento->fecha_especifica);
            $numeroDia = $dia->format('z') + 1; // Ajustar día del año para empezar en 1

            $horasDecimalStart = $this->convertirHoraADecimal($evento->hora_inicio);
            $horasDecimalFin = $this->convertirHoraADecimal($evento->hora_fin);
            //dd($horasDecimalFin, $horasDecimalStart);
            $diferenciaHoras = $horasDecimalFin - $horasDecimalStart;
            $alturaDiv = $diferenciaHoras * 5; // Multiplicar por un factor para la altura visual
            $posicionArriba = (($horasDecimalStart - 8 )* 5); // Ajustar según necesidades
            return [
                'numeroDia' => $numeroDia,
                'alturaDiv' => number_format($alturaDiv, 2, '.', ''),
                'posicionArriba' => number_format($posicionArriba, 2, '.', ''),
                'evento' => $evento // Si necesitas más datos del evento en la vista
            ];
        });
        //dd($eventosFormateados);
        return view('admin.HORARIO-inicio', ['tipo' => 'HORARIO-inicio','eventosFormateados' => $eventosFormateados]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clases = Clase::all();
        if($clases == null) {
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
        //dd($request->all());
        if($request->repetir === null){
            $fecha = new DateTime($request->fechaEspecifica);
            $diaSemana = $fecha->format('l');
            $horario = new Horario;
            $horario->clase_id = $request->clase;
            $horario->dia_semana = $diaSemana;
            $horario->fecha_especifica = $request->fechaEspecifica;
            $horario->hora_inicio = $request->horaInicio;
            $horario->hora_fin = $request->horaFin;

            $horario->save();


        } else {
            $fechasDias = $this->averiguarDiasFecha($request->diasSemana, $request->fechaEspecifica, $request->numeroSemanas);
            foreach($fechasDias as $fecha){
                $diaSemana = $fecha->format('l');
                $horario = new Horario;
                $horario->clase_id = $request->clase;
                $horario->dia_semana = $diaSemana;
                $horario->fecha_especifica = $fecha;
                $horario->hora_inicio = $request->horaInicio;
                $horario->hora_fin = $request->horaFin;

                $horario->save();
            }
        }
        return redirect()->back()->with('success', 'El registro horario se ha agregado con exito');

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
        
        array_push($fechasDias, $fecha);
        $diaFechaInicio = $fecha->format('l');
        $indiceFechaInicio = $diasAsociados[$diaFechaInicio];

        for ($semana = 0; $semana < $numeroSemanas; $semana++) {
            foreach ($dias as $dia) {
                $fechaDia = clone $fecha;
                $offsetDias = (($dia - $indiceFechaInicio) + 7) % 7;
                $fechaDia->modify("+$offsetDias days");
                if ($semana > 0) {
                    $fechaDia->modify('+' . $semana . ' weeks');
                }
                array_push($fechasDias, $fechaDia);
            }
        }
        //dd($fechasDias);
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
        $tipo = 'HORARIO-crear';

        $clases = Clase::all();

        return view('admin.HORARIO-crear', compact('tipo', 'clases', 'horario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $horario)
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
        //
    }

    public function mostrarHorarios() {
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
