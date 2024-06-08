@extends('usuario.reservas')

@section('sugerenciasReservas')
    <div class="container-fluid d-flex justify-content-center align-items-center h-100 w-100 rounded-5">
        <table class="table tabla-dorada w-100 fs-5 bg-color-terciario text-center">
            <thead>
                <tr>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Lunes</th>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Martes</th>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Miércoles</th>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Jueves</th>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Viernes</th>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Sábado</th>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Domingo</th>
                </tr>
            </thead>
            <tbody>
                @php $dayCount = 1; @endphp
                @for ($week = 0; $week < $semanasMes; $week++)
                    <tr>
                        @for ($day = 1; $day <= 7; $day++)
                            <td class="texto-color-resalte border border-1 border-fondo">
                                @if ($week == 0 && $day < $primerDiaMes)
                                    <!-- Vacío -->
                                @elseif ($dayCount > $diasMes)
                                    <!-- Vacío -->
                                @else
                                    @php
                                        $fechaIterada = $fechaActual
                                            ->copy()
                                            ->startOfMonth()
                                            ->addDays($dayCount - 1);
                                    @endphp
                                    @if ($horariosClase->contains('fecha_especifica', $fechaIterada->toDateString()))
                                        <form action="{{ route('mostrarHorariosFecha') }}" method="get">
                                            <input type="hidden" name="fecha"
                                                value="{{ $fechaIterada->toDateString() }}">
                                            <input class="estilo-formulario text-success" type="submit"
                                                value="{{ $dayCount }}">
                                        </form>
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
