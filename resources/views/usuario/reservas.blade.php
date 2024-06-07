@extends('layouts.config')
@section('contenidoReservas')
    <div class="col col-3  d-flex justify-content-center align-items-center">
        <ul class="p-2 fs-5">
            <li class="contenido-cargable-interno contenido-item p-2 texto-color-secundario" id="historialReservas"
                data-url="{{ route('reservas-historialReservas') }}">
                Historial de reservas</li>
            <li class="contenido-cargable-interno contenido-item p-2 texto-color-secundario" id="reservasActivas"
                data-url="{{ route('reservas-reservasActivas') }}">
                Reservas activas</li>
            <li class="contenido-cargable-interno contenido-item p-2 texto-color-secundario" id="sugerenciasReservas"
                data-url="{{ route('reservas-sugerenciasReservas') }}">Sugerencias de reservas</li>
            <li hidden class="contenido-cargable-interno contenido-item p-2 texto-color-secundario" id="mostrarHorariosFecha"
                data-url="{{ route('mostrarHorariosFecha', ['fecha' => now()->toDateString()]) }}"></li>
        </ul>
    </div>
    <div class="col contenido-dinamico-interno" id="contenido-dinamico-interno">
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
