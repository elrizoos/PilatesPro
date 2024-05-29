@extends('usuario.reservas')
@section('reservasActivas')
    <div class="container-fluid  d-flex flex-column justify-content-center align-items-center h-100 w-100 rounded-5 ">
        <table class="table tabla-dorada w-100 fs-5 bg-color-fondo-muy-oscuro text-center">
            <thead>
                <tr>
                    <th class="text-light border border-2 border-fondo">Nº Reserva</th>
                    <th class="text-light border border-2 border-fondo">Clase</th>
                    <th class="text-light border border-2 border-fondo">Fecha</th>
                    <th class="text-light border border-2 border-fondo">Profesor</th>
                </tr>
            </thead>
            <tr>
                @foreach ($reservas as $reserva)
                    <td class="texto-color-dorado border border-2 border-fondo">{{ $reserva->id }}</td>
                    <td class="texto-color-dorado border border-2 border-fondo">{{ $reserva->clase->nombre }}</td>
                    <td class="texto-color-dorado border border-2 border-fondo">
                        @foreach ($reserva->asistencias as $asistencia)
                            {{ $asistencia->fecha }}
                        @endforeach
                    </td>
                    <td class="texto-color-dorado border border-2 border-fondo">{{ $reserva->clase->grupo->profesor->nombre }}</td>
                @endforeach
            </tr>

            </tbody>
        </table>
    </div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
