@extends('usuario.general')
@section('contenidoContrasena')
    <div class="botonera">
        <ul>
            <li class="contenido-cargable-interno" id="cambiarContraseña"
                data-url="{{ route('contrasena-cambiarContraseña') }}">Cambio de contraseña</li>
            <li class="contenido-cargable-interno" id="opciones" data-url="{{ route('contrasena-opciones') }}">Politicas de
                contraseña</li>
            <li class="contenido-cargable-interno" id="politicas" data-url="{{ route('contrasena-politicas') }}">Opciones de
                recuperación de cuenta</li>
        </ul>
    </div>
    <div class="contendio-dinamico-interno">
        <div class="cambiarContraseña" id="contenedor-cambiarContraseña">
            @yield('cambiarContraseña')
        </div>
        <div class="opciones" id="contenedor-opciones">
            @yield('opciones')
        </div>
        <div class="politicas" id="contenedor-politicas">
            @yield('politicas')
        </div>
    </div>
@endsection
