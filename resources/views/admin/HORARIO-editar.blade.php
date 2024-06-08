@extends('admin/panel-control')

@section('HORARIO-editar')
    <div class="container-fluid overflow-y-auto w-100 h-100">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <ul class="row p-2  fs-5">
                            <div
                                class="col-4 texto-color-resalte d-flex flex-column  justify-content-center align-items-center ">
                                <li class="p-1">Clase Asociada: <span
                                        class="texto-color-principal">{{ $horario->clase->nombre }}</span></li>
                                <li class="p-1">Dia de la semana: <span
                                        class="texto-color-principal">{{ $horario->dia_semana }}</span></li>
                                <li class="p-1">Fecha del día: <span
                                        class="texto-color-principal">{{ $horario->fecha_especifica }}</span></li>
                            </div>
                            <div
                                class="col-4 texto-color-resalte d-flex flex-column  justify-content-center align-items-center ">
                                <li class="p-1">Hora Inicio: <span
                                        class="texto-color-principal">{{ $horario->hora_inicio }}</span></li>
                                <li class="p-1">Hora Fin: <span
                                        class="texto-color-principal">{{ $horario->hora_fin }}</span></li>
                                <li class="p-1">Duración de la clase: <span
                                        class="texto-color-principal">{{ $horario->tiempo_clase }}</span></li>
                            </div>
                            <div
                                class="col-4 texto-color-resalte d-flex flex-column  justify-content-center align-items-center">
                                <li class="p-1">Profesor Asignado: <span
                                        class="texto-color-principal">{{ $profesor->nombre }}</span></li>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form class="" action="{{ route('horario.editar', ['horario' => $horario->id]) }}"
                            method="GET">
                            <input class="estilo-formulario estilo-formulario-enviar" type="submit"
                                value="Editar registro">
                        </form>
                        <hr class="texto-color-resalte border border-3 border-dorado">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h3 class="texto-color-resalte fs-4 text-center mb-4">Alumnos que pueden reservar esta clase</h3>
                        <table class="table tabla-dorada bg-color-terciario text-center">

                            <thead>

                                <tr>
                                    <th class="texto-color-titulo border border-2 border-fondo">Nombre</th>
                                    <th class="texto-color-titulo border border-2 border-fondo">Apellidos</th>
                                    <th class="texto-color-titulo border border-2 border-fondo">Telefono</th>
                                    <th class="texto-color-titulo border border-2 border-fondo">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumnos as $alumno)
                                    <td class="texto-color-resalte border border-2 border-fondo">{{ $alumno->nombre }}</td>
                                    <td class="texto-color-resalte border border-2 border-fondo">{{ $alumno->apellidos }}
                                    </td>
                                    <td class="texto-color-resalte border border-2 border-fondo">{{ $alumno->telefono }}
                                    </td>
                                    <td class="texto-color-resalte border border-2 border-fondo">{{ $alumno->email }}</td>
                                @endforeach
                            </tbody>
                        </table>
                        <hr class="texto-color-resalte border border-3 border-dorado">

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="texto-color-resalte fs-4 text-center mb-4">Alumnos que han reservado esta clase</h3>
                        <table class="table tabla-dorada bg-color-terciario text-center">
                            <thead>
                                <tr>
                                    <th class="texto-color-titulo border border-2 border-fondo">Nombre</th>
                                    <th class="texto-color-titulo border border-2 border-fondo">Apellidos</th>
                                    <th class="texto-color-titulo border border-2 border-fondo">Email</th>
                                    <th class="texto-color-titulo border border-2 border-fondo">Asistencia</th>
                                    <th class="texto-color-titulo border border-2 border-fondo">Gestionar Reserva</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservas as $reserva)
                                    <?php
                                    $asistencia = \App\Models\Asistencia::where('reserva_id', $reserva->id)->first();
                                    ?>
                                    <td class="texto-color-resalte border border-2 border-fondo">
                                        {{ $reserva->alumno->nombre }}</td>
                                    <td class="texto-color-resalte border border-2 border-fondo">
                                        {{ $reserva->alumno->apellidos }}</td>
                                    <td class="texto-color-resalte border border-2 border-fondo">
                                        {{ $reserva->alumno->email }}</td>
                                    <td class="texto-color-resalte border border-2 border-fondo">
                                        {{ $asistencia->asistio }}</td>

                                    <td
                                        class="texto-color-resalte border border-2 border-fondo d-flex justify-content-center align-items-center">
                                        <form action="{{ route('cancelarReserva', ['reserva' => $reserva->id]) }}"
                                            method="post">
                                            @csrf
                                            <input class="estilo-formulario border-2 borde-dorado border" type="submit"
                                                value="Cancelar">
                                        </form>
                                        <form class="{{ $asistencia->asistio == true ? 'd-none' : '' }}"
                                            action="{{ route('asistencia.create', ['reserva' => $reserva->id, 'user' => $reserva->alumno->id]) }}">
                                            <input class="estilo-formulario border-2 borde-dorado border" type="submit"
                                                value="Asistio">
                                        </form>
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
