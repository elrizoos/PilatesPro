@extends('layouts.config')
@section('contenidoGeneral')
    <div class="d-block d-md-none">
        <h2 class="fs-3 text-center selectorMovil">GENERAL</h2>
    </div>
    <div class="col col-12 col-md-3  d-flex justify-content-center align-items-center">
        <ul class="fs-5 row fs-5">
            <div class="col-12 d-flex d-md-inline-block justify-content-center align-items-center">
                <li class="contenido-cargable-interno contenido-item p-2 text-center texto-color-secundario"
                    id="informacionGeneral" data-url="{{ route('general-informacion') }}">
                    Información de usuario</li>
                <li class="contenido-cargable-interno contenido-item p-2 text-center texto-color-secundario"
                    id="informacionContacto" data-url="{{ route('general-informacion-contacto') }}">Información de contacto
                </li>


            </div>
            <div class="col-12">
                <li class="contenido-cargable-interno contenido-item p-2 text-center texto-color-secundario" id="fotoPerfil"
                    data-url="{{ route('general-fotoPerfil') }}">Foto de perfil
                </li>
            </div>

        </ul>
    </div>


    <div class="col-12 col-md-9 contenido-dinamico-interno" id="contenido-dinamico-interno">
        <div class="row h-100 contenedor-interno informacionGeneral" id="contenedor-informacionGeneral">
            @yield('informacionGeneral')</div>
        <div class="row h-100 contenedor-interno informacionContacto" id="contenedor-informacionContacto">
            @yield('informacionContacto')</div>
        <div class="row h-100 contenedor-interno fotoPerfil" id="contenedor-fotoPerfil">
            @yield('fotoPerfil')</div>

    </div>
@endsection
