@extends('usuario.reservas')
@section('historialReservas')
    {{ $reservaDatos = ' ' }}
    @if (session('reservas'))
        {{ $reservas = session('reservas') }}
    @endif
    <table class="table table-light">
        <thead>
            <tr>
                <th>Nº Reserva</th>
                <th>Clase</th>
                <th>Fecha</th>
                <th>Asistida</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
                @foreach ($reserva->asistencias as $asistencia)
                    <tr>
                        <td>{{ $reserva->id}}</td>
                        <td>{{ $reserva->clase_id}}</td>
                        <td>{{ $asistencia->fecha }}</td>
                        <td>{{ $asistencia->asistio ? 'Sí' : 'No' }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    @vite(['resources/js/contenidoInterno.js'])
@endsection
