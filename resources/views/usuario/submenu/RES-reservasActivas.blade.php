@extends('usuario.reservas')
@section('reservasActivas')
    <p>En esta seccion podras ver las reservas que tienes activas en este momento.</p>
    <table>
        <thead>
            <tr>
                <th>Nº Reserva</th>
                <th>Clase</th>
                <th>Fecha</th>
                <th>Profesor</th>
            </tr>
        </thead>
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
            
        </tbody>
    </table>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
