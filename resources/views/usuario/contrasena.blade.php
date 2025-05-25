@extends('layouts.config')
@section('contenidoContrasena')
    <div class="d-block d-md-none">
        <h2 class="fs-3 text-center selectorMovil">GENERAL</h2>
    </div>
    <div class="col col-12 col-md-3  d-flex justify-content-center align-items-center">
        <ul class="fs-5 row fs-5">
            <div class="col-12 d-flex d-md-inline-block justify-content-center align-items-center">
                <li class="contenido-cargable-interno contenido-item p-2 text-center texto-color-secundario"
                    id="cambiarContrasena" data-url="{{ route('contrasena-cambiarContrasena') }}">Cambio de Contrasena</li>
                <li class="contenido-cargable-interno contenido-item p-2 text-center texto-color-secundario" id="opciones"
                    data-url="{{ route('contrasena-politicas') }}">Politicas de
                    contraseña</li>
            </div>
            <div class="col-12">
                <li class="contenido-cargable-interno contenido-item p-2 text-center texto-color-secundario" id="politicas"
                    data-url="{{ route('contrasena-opciones') }}">Opciones de
                    recuperación de cuenta</li>
            </div>
        </ul>
    </div>
    <div class="col-12 col-md-9 contenido-dinamico-interno" id="contenido-dinamico-interno">
        <div class="row h-100 contenedor-interno cambiarContrasena" id="contenedor-cambiarContrasena">
            @yield('cambiarContrasena')
        </div>
        <div class="row h-100 contenedor-interno opciones" id="contenedor-opciones">
            @yield('opciones')
        </div>
        <div class="row h-100 contenedor-interno politicas" id="contenedor-politicas">
            @yield('politicas')
        </div>

    </div>
@endsection
