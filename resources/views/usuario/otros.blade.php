@extends('layouts.config')
@section('contenidoOtros')
    <div class="d-block d-lg-none">
        <h2 class="fs-3 text-center selectorMovil">GENERAL</h2>
    </div>
    <div class="col col-12 col-lg-3  d-flex justify-content-center align-items-center">
        <ul class="row p-2 fs-5">
            <div class="col-12 d-flex d-lg-inline-block justify-content-center align-items-center">
                <li class="contenido-cargable-interno contenido-item text-center p-2 texto-color-secundario" id="notificaciones" data-url="{{ route('otros-notificaciones') }}">Notificaciones</li>
            </div>
            <div class="col-12">
                <li class="contenido-cargable-interno contenido-item text-center p-2 texto-color-secundario" id="eliminar" data-url="{{ route('otros-eliminar') }}">Eliminar cuenta</li>
            </div>
        </ul>
    </div>
    <div class="col contenido-dinamico-interno" id="contenido-dinamico-interno">
        <div class="row h-100 contenedor-interno notificaciones" id="contenedor-notificaciones">
            @yield('notificaciones')
        </div>
        <div class="row h-100 contenedor-interno eliminar" id="contenedor-eliminar">
            @yield('eliminar')
        </div>
    </div>
@endsection
