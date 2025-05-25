@extends('usuario.reservas')
@section('mostrarHorariosFecha')
    <div class="container-fluid d-flex justify-content-center align-items-center">
        @if (count($horarios) == 0)
        @else
            <table class="table tabla-dorada w-100 fs-5 bg-color-terciario text-center">
                <thead>
                    <tr>
                        <th class="fs-5 texto-color-titulo border border-1 border-fondo">Clase</th>
                        <th class="fs-5 texto-color-titulo border border-1 border-fondo">Dia Semana</th>
                        <th class="fs-5 texto-color-titulo border border-1 border-fondo">Fecha</th>
                        <th class="fs-5 texto-color-titulo border border-1 border-fondo">Hora Inicio</th>
                        <th class="fs-5 texto-color-titulo border border-1 border-fondo">Hora Fin</th>
                        <th class="fs-5 texto-color-titulo border border-1 border-fondo">Reservar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($horarios as $horario)
                        <tr>
                            <td class="texto-color-resalte border border-1 border-fondo">{{ $horario->clase_id }}</td>
                            <td class="texto-color-resalte border border-1 border-fondo">{{ $horario->dia_semana }}</td>
                            <td class="texto-color-resalte border border-1 border-fondo">{{ $horario->fecha_especifica }}
                            </td>
                            <td class="texto-color-resalte border border-1 border-fondo">{{ $horario->hora_inicio }}</td>
                            <td class="texto-color-resalte border border-1 border-fondo">{{ $horario->hora_fin }}</td>
                            <td class="texto-color-resalte border border-1 border-fondo">
                                <form action="{{ route('reservarClase') }}" method="get">
                                    @csrf

                                    <input type="hidden" name="horario" value="{{ $horario->id }}">
                                    <input class="estilo-formulario border border-1 border-dorado-claro" type="submit"
                                        value="Reservar">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
