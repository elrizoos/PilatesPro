@extends('layouts.config')
@section('contenidoOtros')
    <div>
        <ul>
            <li id="notificaciones" data-url="{{ route('otros-notificaciones') }}">Notificaciones</li>
            <li id="privacidad" data-url="{{ route('otros-privacidad') }}">Privacidad y seguridad</li>
            <li id="redSocial" data-url="{{ route('otros-redSocial') }}">Conexiones sociales</li>
            <li id="eliminar" data-url="{{ route('otros-eliminar') }}">Eliminar cuenta</li>
        </ul>
    </div>
    <div id="contenido-dinamico-interno">
        <div id="contenedor-notificaciones">
            @yield('notificaciones')
        </div>
        <div id="contenedor-privacidad">
            @yield('privacidad')
        </div>
        <div id="contenedor-redSocial">
            @yield('redSocial')
        </div>
        <div id="contenedor-eliminar">
            @yield('eliminar')
        </div>
    </div>
@endsection
