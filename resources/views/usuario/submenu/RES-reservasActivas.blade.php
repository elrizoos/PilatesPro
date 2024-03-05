@extends('usuario.reservas')
@section('reservasActivas')
    <p>En esta seccion podras ver las reservas que tienes activas en este momento.</p>
    <table class="table table-light">
        <tbody>
            <tr>
                <td>Nº Reserva</td>
                <td>Clase</td>
                <td>Fecha</td>
                <td>Profesor</td>
            </tr>
            <tr>
                @foreach ($reservas as $reserva)
                    <td>{{$reserva->id}}</td>
                    <td>{{$reserva->clase->nombre}}</td>
                    <td>
                        @foreach ($reserva->asistencias as $asistencia)
                            {{$asistencia->fecha}}
                        @endforeach    
                    </td>
                    <td>{{$reserva->clase->grupo->profesor->nombre}}</td>
                @endforeach
            </tr>
            @foreach ($reservas as $reserva)
                @if ($reserva->clase)
                    @if ($reserva->clase->grupo)
                        {{$reserva->clase->grupo->profesor->nombre}}
                    @endif
                @endif
            @endforeach
        </tbody>
    </table>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
