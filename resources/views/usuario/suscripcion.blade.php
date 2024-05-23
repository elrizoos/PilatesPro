@extends('usuario.perfil')
@section('contenidoSuscripcion')
    <div>
        <ul>
            <li id="estadoSuscripcion"
                data-url="{{ route('suscripcion-estadoSuscripcion') }}">Estado de suscripcion</li>
            <li id="detallesPlan" data-url="{{ route('suscripcion-detallesPlan') }}">
                Detalles del plan</li>
            <li id="cambioPlan" data-url="{{ route('suscripcion-cambioPlan') }}">Cambio del
                plan</li>
            <li id="historialPago" data-url="{{ route('suscripcion-historialPago') }}">
                Historial de pagos</li>
        </ul>
    </div>
    <div id="contenido-dinamico-interno">
        <div id="contenedor-estadoSuscripcion">
            @yield('estadoSuscripcion')
        </div>
        <div id="contenedor-detallesPlan">
            @yield('detallesPlan')
        </div>
        <div id="contenedor-cambioPlan">
            @yield('cambioPlan')
        </div>
        <div id="contenedor-historialPago">
            @yield('historialPago')
        </div>
    </div>
@endsection
