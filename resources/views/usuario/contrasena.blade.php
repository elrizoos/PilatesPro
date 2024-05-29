@extends('usuario.general')
@section('contenidoContrasena')
    <div>
        <ul>
            <li id="cambiarContraseña"
                data-url="{{ route('contrasena-cambiarContraseña') }}">Cambio de contraseña</li>
            <li id="opciones" data-url="{{ route('contrasena-opciones') }}">Politicas de
                contraseña</li>
            <li id="politicas" data-url="{{ route('contrasena-politicas') }}">Opciones de
                recuperación de cuenta</li>
        </ul>
    </div>
    <div id="contenido-dinamico-interno">
        <div id="contenedor-cambiarContraseña">
            @yield('cambiarContraseña')
        </div>
        <div id="contenedor-opciones">
            @yield('opciones')
        </div>
        <div id="contenedor-politicas">
            @yield('politicas')
        </div>
    </div>
@endsection
