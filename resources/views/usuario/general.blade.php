@extends('layouts.config')
@section('contenidoGeneral')
    <div class="col col-3  d-flex justify-content-center align-items-center">
        <ul class="p-2 fs-5">
            <li class="contenido-cargable-interno contenido-item p-2 texto-color-secundario" id="informacionGeneral"
                data-url="{{ route('general-informacion') }}">
                Información de usuario</li>
            <li class="contenido-cargable-interno contenido-item p-2 texto-color-secundario" id="informacionContacto"
                data-url="{{ route('general-informacion-contacto') }}">Información de contacto</li>
            <li class="contenido-cargable-interno contenido-item p-2 texto-color-secundario" id="fotoPerfil"
                data-url="{{ route('general-fotoPerfil') }}">Foto de perfil
            </li>
            <li class="contenido-cargable-interno contenido-item p-2 texto-color-secundario" id="preferenciasIdioma"
                data-url="{{ route('general-preferenciasIdioma') }}">Preferencias de idioma</li>
        </ul>
    </div>


    <div class="col contenido-dinamico-interno" id="contenido-dinamico-interno">
        <div class="row h-100 contenedor-interno informacionGeneral" id="contenedor-informacionGeneral">
            @yield('informacionGeneral')</div>
        <div class="row h-100 contenedor-interno informacionContacto" id="contenedor-informacionContacto">
            @yield('informacionContacto')</div>
        <div class="row h-100 contenedor-interno fotoPerfil" id="contenedor-fotoPerfil">
            @yield('fotoPerfil')</div>
        <div class="row h-100 contenedor-interno preferenciasIdioma" id="contenedor-preferenciasIdioma">
            @yield('preferenciasIdioma')</div>
    </div>
@endsection
