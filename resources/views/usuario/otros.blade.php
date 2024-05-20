@extends('usuario.perfil')
@section('contenidoOtros')
<div class="botonera">
    <ul>
        <li class="contenido-cargable-interno" id="notificaciones" data-url="{{ route('otros-notificaciones')}}">Notificaciones</li>
        <li class="contenido-cargable-interno" id="privacidad" data-url="{{ route('otros-privacidad')}}">Privacidad y seguridad</li>
        <li class="contenido-cargable-interno" id="redSocial" data-url="{{ route('otros-redSocial')}}">Conexiones sociales</li>
        <li class="contenido-cargable-interno" id="eliminar" data-url="{{ route('otros-eliminar')}}">Eliminar cuenta</li>
    </ul>
</div>
<div class="contendio-dinamico-interno" id="contenido-dinamico-interno">
    <div class="notificaciones" id="contenedor-notificaciones">
        @yield('notificaciones')
    </div>
    <div class="privacidad" id="contenedor-privacidad">
        @yield('privacidad')
    </div>
    <div class="redSocial" id="contenedor-redSocial">
        @yield('redSocial')
    </div>
    <div class="eliminar" id="contenedor-eliminar">
        @yield('eliminar')
    </div>
</div>
@endsection