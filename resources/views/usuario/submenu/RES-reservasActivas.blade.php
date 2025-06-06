@extends('usuario.reservas')

@section('reservasActivas')
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100 w-100 rounded-5">
        <table class="table w-75 fs-5 bg-fondo-general text-center">
            <thead>
                <tr>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Nº Reserva</th>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Clase</th>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Fecha</th>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Profesor</th>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Cancelar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reservas as $reserva)
                    <tr>
                        <td class="texto-color-resalte border border-1 border-fondo">{{ $reserva->id }}</td>
                        <td class="texto-color-resalte border border-1 border-fondo">{{ $reserva->horario->clase->nombre }}
                        </td>
                        <td class="texto-color-resalte border border-1 border-fondo">
                            @foreach ($reserva->asistencias as $asistencia)
                                {{ $asistencia->fecha }}<br>
                            @endforeach
                        </td>
                        <td class="texto-color-resalte border border-1 border-fondo">
                            {{ $reserva->horario->clase->grupo->profesor->nombre }}
                        </td>
                        <td class="texto-color-resalte border border-1 border-fondo">
                            <form action="{{ route('cancelarReserva', ['reserva' => $reserva->id]) }}" method="post">
                                @csrf
                                <input class="estilo-formulario border border-dorado-claro" type="submit" value="Cancelar">
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="texto-color-resalte border border-1 border-fondo">No tienes reservas
                            activas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
