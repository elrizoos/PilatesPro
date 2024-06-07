@extends('usuario.reservas')
@section('historialReservas')
    @if ($grupoUsuario === null)
    <div class="container w-100 h-100">
        <div class="row h-100">
            <div class="col d-flex justify-content-center align-items-center">
                <p>No dispones de grupo por ahora, habla con el encargado del estudio para que te asigne uno</p>
            </div>
        </div>
    </div>
    @else
        @if (isset($reservasPasadas) && isset($reservasFuturas))
            @if ($reservasPasadas->isEmpty() && $reservasFuturas->isEmpty())
                <p class="fs-1 text-warning text-center d-flex flex-column">
                    Aún no dispones de reservas realizadas
                    <a class="fs-5" href="">Haz click aquí para consultar las clases disponibles para reservar</a>
                </p>
            @else
                @if (!$reservasFuturas->isEmpty())
                    <div class="container-fluid d-flex justify-content-center align-items-center h-100 w-100 rounded-5 mb-4">
                        <h2 class="texto-color-resalte">Reservas Futuras</h2>
                        <table class="table tabla-dorada w-100 fs-5 bg-color-terciario text-center">
                            <thead>
                                <tr>
                                    <th class="texto-color-resalte border border-2 border-fondo">Nº Reserva</th>
                                    <th class="texto-color-resalte border border-2 border-fondo">Clase</th>
                                    <th class="texto-color-resalte border border-2 border-fondo">Fecha</th>
                                    <th class="texto-color-resalte border border-2 border-fondo">Asistida</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservasFuturas as $reserva)
                                    <tr>
                                        <td class="texto-color-resalte border border-2 border-fondo">{{ $reserva->id }}
                                        </td>
                                        <td class="texto-color-resalte border border-2 border-fondo">
                                            {{ $reserva->horario->clase->nombre }}</td>
                                        <td class="texto-color-resalte border border-2 border-fondo">
                                            {{ $reserva->horario->dia_semana . '--' . $reserva->horario->fecha_especifica }}
                                        </td>
                                        <td class="texto-color-resalte border border-2 border-fondo">
                                            {{ $reserva->asistencias[0]->asistio ? 'Sí' : 'No' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                @if (!$reservasPasadas->isEmpty())
                    <div class="container-fluid d-flex justify-content-center align-items-center h-100 w-100 rounded-5">
                        <h2 class="texto-color-resalte">Reservas Pasadas</h2>
                        <table class="table tabla-dorada w-100 fs-5 bg-color-terciario text-center">
                            <thead>
                                <tr>
                                    <th class="texto-color-resalte border border-2 border-fondo">Nº Reserva</th>
                                    <th class="texto-color-resalte border border-2 border-fondo">Clase</th>
                                    <th class="texto-color-resalte border border-2 border-fondo">Fecha</th>
                                    <th class="texto-color-resalte border border-2 border-fondo">Asistida</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservasPasadas as $reserva)
                                    <tr>
                                        <td class="texto-color-resalte border border-2 border-fondo">{{ $reserva->id }}
                                        </td>
                                        <td class="texto-color-resalte border border-2 border-fondo">
                                            {{ $reserva->horario->clase->nombre }}</td>
                                        <td class="texto-color-resalte border border-2 border-fondo">
                                            {{ $reserva->horario->dia_semana . '--' . $reserva->horario->fecha_especifica }}
                                        </td>
                                        <td class="texto-color-resalte border border-2 border-fondo">
                                            {{ $reserva->asistencias[0]->asistio ? 'Sí' : 'No' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            @endif
        @else
            <p class="fs-1 text-danger text-center">
                No dispones de un historial de reservas, ya que aun no has reservado nada
            </p>
        @endif


    @endif
    @vite(['resources/js/contenidoInterno.js'])
@endsection
