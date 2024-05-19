@extends('usuario.perfil')
@section('contenidoSuscripcion')
    <div class="botonera">
        <ul>
            <li class="contenido-cargable-interno" id="estadoSuscripcion"
                data-url="{{ route('suscripcion-estadoSuscripcion') }}">Estado de suscripcion</li>
            <li class="contenido-cargable-interno" id="detallesPlan" data-url="{{ route('suscripcion-detallesPlan') }}">
                Detalles del plan</li>
            <li class="contenido-cargable-interno" id="cambioPlan" data-url="{{ route('suscripcion-cambioPlan') }}">Cambio del
                plan</li>
            <li class="contenido-cargable-interno" id="historialPago" data-url="{{ route('suscripcion-historialPago') }}">
                Historial de pagos</li>
        </ul>
    </div>
    <div class="contenido-dinamico-interno">
        <div class="estadoSuscripcion" id="contenedor-estadoSuscripcion">
            @yield('estadoSuscripcion')
        </div>
        <div class="detallesPlan" id="contenedor-detallesPlan">
            @yield('detallesPlan')
        </div>
        <div class="cambioPlan" id="contenedor-cambioPlan">
            @yield('cambioPlan')
        </div>
        <div class="historialPagos" id="contenedor-historialPagos">
            @yield('historialPagos')
        </div>
    </div>
@endsection
