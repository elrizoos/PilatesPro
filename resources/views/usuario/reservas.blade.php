@extends('layouts.config')
@section('contenidoReservas')
    <div>
        <ul>
            <li id="historialReservas" data-url="{{ route('reservas-historialReservas') }}">
                Historial de reservas</li>
            <li id="reservasActivas" data-url="{{ route('reservas-reservasActivas') }}">
                Reservas activas</li>
            <li id="sugerenciasReservas" data-url="{{ route('reservas-sugerenciasReservas') }}">Sugerencias de reservas</li>
        </ul>
    </div>
    <div id="contenido-dinamico-interno">
        <div id="contenedor-historialReservas">
            @yield('historialReservas')
        </div>
        <div id="contenedor-reservasActivas">
            @yield('reservasActivas')
        </div>
        <div id="contenedor-sugerenciaReservas">
            @yield('sugerenciasReservas')
        </div>
    </div>
@endsection
