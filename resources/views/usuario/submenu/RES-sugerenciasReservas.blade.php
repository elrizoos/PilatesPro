@extends('usuario.reservas')
@section('sugerenciasReservas')
    <div class="container-fluid  d-flex justify-content-center align-items-center h-100 w-100 rounded-5 ">
        <table class="table tabla-dorada w-100 fs-5 bg-color-fondo-muy-oscuro text-center">
            <thead>
                <tr>
                    <th class="text-light border border-2 border-fondo">Lunes</th>
                    <th class="text-light border border-2 border-fondo">Martes</th>
                    <th class="text-light border border-2 border-fondo">Miércoles</th>
                    <th class="text-light border border-2 border-fondo">Jueves</th>
                    <th class="text-light border border-2 border-fondo">Viernes</th>
                    <th class="text-light border border-2 border-fondo">Sábado</th>
                    <th class="text-light border border-2 border-fondo">Domingo</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $dayCount = 1;
                    $diasMes = date('t');
                    $anno = date('Y'); // Corrección para el año en formato de cuatro dígitos
                    $mes = date('m');

                    $idAlumno = Auth()->user()->id;
                    $primerDiaMes = date('N', strtotime("$anno-$mes-01")); // Corregido para usar comillas dobles
                    $semanasMes = ceil(($diasMes + $primerDiaMes - 1) / 7);
                    $clasesAlumno = App\Models\Clase::whereHas('reserva', function ($query) use ($idAlumno) {
                        $query->where('alumno_id', $idAlumno);
                    })->get();
                @endphp
                @for ($week = 0; $week < $semanasMes; $week++)
                    <tr>
                        @for ($day = 0; $day < 7; $day++)
                            <td class="texto-color-dorado border border-2 border-fondo">
                                @if ($week == 0 && $day < $primerDiaMes - 1)
                                @elseif ($dayCount > $diasMes)
                                @else
                                    @php
                                        $fechaActual = "$anno-$mes-" . str_pad($dayCount, 2, '0', STR_PAD_LEFT);
                                    @endphp
                                    @if ($clasesAlumno->contains('fecha', $fechaActual))
                                        <a href="#">{{ $dayCount }}</a>
                                    @else
                                        {{ $dayCount }}
                                    @endif
                                    @php $dayCount++; @endphp
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
