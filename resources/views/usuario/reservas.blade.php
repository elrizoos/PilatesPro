@extends('usuario.perfil')
@section('contenidoReservas')
    <div class="botonera">
        <ul>
            <li class="contenido-cargable-interno" id="historialReservas" data-url="{{ route('reservas-historialReservas') }}">
                Historial de reservas</li>
            <li class="contenido-cargable-interno" id="reservasActivas" data-url="{{ route('reservas-reservasActivas') }}">
                Reservas activas</li>
            <li class="contenido-cargable-interno" id="sugerenciasReservas"
                data-url="{{ route('reservas-sugerenciasReservas') }}">Sugerencias de reservas</li>
        </ul>
    </div>
    <div class="contendio-dinamico-interno" id="contenido-dinamico-interno">
        <div class="historialReservas" id="contenedor-historialReservas">
            @yield('historialReservas')
        </div>
        <div class="reservasActivas" id="contenedor-reservasActivas">
            @yield('reservasActivas')
        </div>
        <div class="sugerenciasReservas" id="contenedor-sugerenciaReservas">
            @yield('sugerenciasReservas')
        </div>
    </div>
@endsection
