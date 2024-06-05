@extends('usuario.reservas')
@section('historialReservas')
    @if (isset($reservas))
        @if ($reservas == '')
            <p class="fs-1 text-warning text-center d-flex flex-column">
                Aun no dispones de reservas realizadas
                <a class="fs-5" href="">Haz click aqui para consultar las clases disponibles para reservar</a>
            </p>
        @else
            <div class="container-fluid  d-flex justify-content-center align-items-center h-100 w-100 rounded-5 ">
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
                                    <td class="texto-color-dorado border border-2 border-fondo">{{ $reserva->id }}</td>
                                    <td class="texto-color-dorado border border-2 border-fondo">{{ $reserva->clase_id }}</td>
                                    <td class="texto-color-dorado border border-2 border-fondo">{{ $asistencia->fecha }}</td>
                                    <td class="texto-color-dorado border border-2 border-fondo">
                                        {{ $asistencia->asistio ? 'Sí' : 'No' }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @else
        <p class="fs-1 text-danger text-center">
            Aún no se te ha asignado un grupo ponte en contacto con el administrador de la app
        </p>
    @endif

    @vite(['resources/js/contenidoInterno.js'])
@endsection
