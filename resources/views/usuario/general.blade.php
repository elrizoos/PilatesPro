@extends('usuario.perfil')
@section('contenidoGeneral')
    <div>
        <ul>
            <li id="informacionGeneral" data-url="{{ route('general-informacion') }}">
                Información de usuario</li>
            <li id="informacionContacto"
                data-url="{{ route('general-informacion-contacto') }}">Información de contacto</li>
            <li id="fotoPerfil" data-url="{{ route('general-fotoPerfil') }}">Foto de perfil
            </li>
            <li id="preferenciasIdioma"
                data-url="{{ route('general-preferenciasIdioma') }}">Preferencias de idioma</li>
        </ul>
    </div>

    <div id="mensaje-error-fotoPerfil"></div>

    <div id="contenido-dinamico-interno">
        <div id="contenedor-informacionGeneral">
            @yield('informacionGeneral')</div>
        <div id="contenedor-informacionContacto">
            @yield('informacionContacto')</div>
        <div id="contenedor-fotoPerfil">
            @yield('fotoPerfil')</div>
        <div id="contenedor-preferenciasIdioma">
            @yield('preferenciasIdioma')</div>
    </div>
@endsection
