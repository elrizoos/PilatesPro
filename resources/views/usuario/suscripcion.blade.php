@extends('layouts.config')
@section('contenidoSuscripcion')
    <div class="col col-3  d-flex justify-content-center align-items-center">
        <ul class="p-2 fs-5">
            <li class="contenido-cargable-interno contenido-item p-2 texto-color-secundario" id="estadoSuscripcion" data-url="{{ route('suscripcion-estadoSuscripcion') }}">Estado de suscripcion</li>
            <li class="contenido-cargable-interno contenido-item p-2 texto-color-secundario" id="detallesPlan" data-url="{{ route('suscripcion-detallesPlan') }}">
                Detalles del plan</li>
            <li class="contenido-cargable-interno contenido-item p-2 texto-color-secundario" id="cambioPlan" data-url="{{ route('suscripcion-cambioPlan') }}">Cambio del
                plan</li>
            <li class="contenido-cargable-interno contenido-item p-2 texto-color-secundario" id="historialPago" data-url="{{ route('suscripcion-historialPago') }}">
                Historial de pagos</li>
        </ul>
    </div>
    <div class="col contenido-dinamico-interno" id="contenido-dinamico-interno">
        <div class="row h-100 contenedor-interno estadoSuscripcion" id="contenedor-estadoSuscripcion">
            @yield('estadoSuscripcion')
        </div>
        <div class="row h-100 contenedor-interno detallesPlan" id="contenedor-detallesPlan">
            @yield('detallesPlan')
        </div>
        <div class="row h-100 contenedor-interno cambioPlan" id="contenedor-cambioPlan">
            @yield('cambioPlan')
        </div>
        <div class="row h-100 contenedor-interno historialPago" id="contenedor-historialPago">
            @yield('historialPago')
        </div>
    </div>
@endsection
