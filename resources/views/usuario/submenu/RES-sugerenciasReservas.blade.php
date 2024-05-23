@extends('usuario.reservas')
@section('sugerenciasReservas')
    <p>Seccion para ver futuras clases a reservar.</p>
    <table>
    <thead>
        <tr>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sábado</th>
            <th>Domingo</th>
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
                    <td>
                        @if ($week == 0 && $day < $primerDiaMes - 1)
                            {{-- Celdas vacías --}}
                        @elseif ($dayCount > $diasMes)
                            {{-- Fin del mes --}}
                        @else
                            {{-- Comprobación de clases en el día actual --}}
                            @php
                                $fechaActual = "$anno-$mes-".str_pad($dayCount, 2, '0', STR_PAD_LEFT);
                            @endphp
                            @if ($clasesAlumno->contains('fecha', $fechaActual))
                                {{-- Enlace si hay clases --}}
                                <a href="#">{{ $dayCount }}</a>
                            @else
                                {{-- Mostrar día sin enlace --}}
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
    @vite(['resources/js/contenidoInterno.js'])
@endsection
