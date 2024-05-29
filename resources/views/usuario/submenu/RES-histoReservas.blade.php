@extends('usuario.reservas')
@section('historialReservas')
    {{ $reservaDatos = ' ' }}
    @if (session('reservas'))
        {{ $reservas = session('reservas') }}
    @endif
    <div  class="container-fluid  d-flex justify-content-center align-items-center h-100 w-100 rounded-5 ">
        <table class="table tabla-dorada w-100 fs-5 bg-color-fondo-muy-oscuro text-center">
        <thead>
            <tr>
                <th class="text-light border border-2 border-fondo">Nº Reserva</th>
                <th class="text-light border border-2 border-fondo">Clase</th>
                <th class="text-light border border-2 border-fondo">Fecha</th>
                <th class="text-light border border-2 border-fondo">Asistida</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
                @foreach ($reserva->asistencias as $asistencia)
                    <tr>
                        <td class="texto-color-dorado border border-2 border-fondo">{{ $reserva->id}}</td>
                        <td class="texto-color-dorado border border-2 border-fondo">{{ $reserva->clase_id}}</td>
                        <td class="texto-color-dorado border border-2 border-fondo">{{ $asistencia->fecha }}</td>
                        <td class="texto-color-dorado border border-2 border-fondo">{{ $asistencia->asistio ? 'Sí' : 'No' }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
    </div>

    @vite(['resources/js/contenidoInterno.js'])
@endsection
