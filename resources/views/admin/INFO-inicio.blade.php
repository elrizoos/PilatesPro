@extends('admin.panel-control')

@section('INFO-inicio')
    <div class="container-fluid h-100 w-100">
        <div class="row ">
            <div class="col p-4 w-100 d-flex flex-column justify-content-center align-items-center">
                <h3 class="fs-3 mb-4 text-uppercase">Registro de asistencias</h3>
                <table class="table tabla-dorada w-100 fs-5 bg-color-terciario text-center">
                    <thead>
                        <tr>
                            <th class="texto-color-titulo border border-2 border-fondo">Alumno</th>
                            <th class="texto-color-titulo border border-2 border-fondo">Reserva</th>
                            <th class="texto-color-titulo border border-2 border-fondo">Fecha</th>
                            <th class="texto-color-titulo border border-2 border-fondo">Asistio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asistencias as $asistencia)
                            <tr>
                                <td class="texto-color-resalte border border-2 border-fondo">
                                    {{ $asistencia->reserva->alumno->nombre }}</td>
                                <td class="texto-color-resalte border border-2 border-fondo">{{ $asistencia->reserva->id }}
                                </td>
                                <td class="texto-color-resalte border border-2 border-fondo">{{ $asistencia->fecha }}</td>
                                <td class="texto-color-resalte border border-2 border-fondo">
                                    {{ $asistencia->asistio == true ? 'ASISTIDA' : 'NO ASISTIDA' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <h2 class="fs-3 mb-4 text-uppercase">Ingresos</h2>

                <div class="row">
                    <div class="col">
                        <h4 class="fs-4 texto-color-titulo">Ingresos totales Suscripciones ACTIVAS: <h1 class="display-3">
                                {{ $totalIngresosSuscripcionesActivas }}€</h1>
                        </h4>

                    </div>
                    <div class="col">
                        <h4 class="fs-4 texto-color-titulo">Ingresos totales Paquetes de Clases: <h1 class="display-3">
                                {{ $totalIngresosPaquetes }}€</h1>
                        </h4>

                    </div>
                </div>
            </div>
            <div class="col">
                <h3 class="fs-3 mb-4 text-uppercase">Tendencias de usuarios</h3>
                <div class="row">
                    <div class="col bg-color-fondo">
                        <h4 class="fs-4 texto-color-titulo">Suscripcion preferida: <h1 class="display-5">
                                {{ $nombreSuscripcionFav }}</h1>
                        </h4>
                    </div>
                    <div class="col">
                        <h4 class="fs-4 texto-color-titulo">Pack de clases preferido: <h1 class="display-5">
                                {{ $paqueteFav }}</h1>
                        </h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
