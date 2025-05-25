@extends('layouts.config')
@section('contenidoReservas')
    <div class="d-block d-md-none">
        <h2 class="fs-3 text-center selectorMovil">RESERVAS</h2>
    </div>
    <div class="col col-12 col-md-3  d-flex justify-content-center align-items-center">
        <ul class="fs-5 row p-2 fs-5">
            <div class="col-12 d-flex d-md-inline-block justify-content-center align-items-center">
                <li class="contenido-cargable-interno text-center contenido-item p-2 texto-color-secundario"
                    id="historialReservas" data-url="{{ route('reservas-historialReservas') }}">
                    Historial de reservas</li>
                <li class="contenido-cargable-interno text-center contenido-item p-2 texto-color-secundario"
                    id="reservasActivas" data-url="{{ route('reservas-reservasActivas') }}">
                    Reservas activas</li>
            </div>
            <div class="col-12">
                <li class="contenido-cargable-interno text-center contenido-item p-2 texto-color-secundario"
                    id="sugerenciasReservas" data-url="{{ route('reservas-sugerenciasReservas') }}">Sugerencias de reservas
                </li>
                <li hidden class="contenido-cargable-interno text-center contenido-item p-2 texto-color-secundario"
                    id="mostrarHorariosFecha"
                    data-url="{{ route('mostrarHorariosFecha', ['fecha' => now()->toDateString()]) }}"></li>
            </div>
        </ul>
    </div>
    <div class="col-12 col-md-9 contenido-dinamico-interno" id="contenido-dinamico-interno">
        <div class="row h-100 contenedor-interno historialReservas" id="contenedor-historialReservas">
            @yield('historialReservas')
        </div>
        <div class="row h-100 contenedor-interno reservasActivas" id="contenedor-reservasActivas">
            @yield('reservasActivas')
        </div>
        <div class="row h-100 contenedor-interno sugerenciasReservas" id="contenedor-sugerenciasReservas">
            @yield('sugerenciasReservas')
        </div>
        <div class="row h-100 contenedor-interno mostrarHorariosFecha" id="contenedor-mostrarHorariosFecha">
            @yield('mostrarHorariosFecha')
        </div>
    </div>
@endsection
