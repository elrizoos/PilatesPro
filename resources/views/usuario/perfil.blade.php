@extends('layouts.config')

@section('content')
    <div class="contenedor-ajustes">
        <div class="nav-ajustes">
            <div class="logo-ajustes">
                <div class="imagen-logo"></div>
            </div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                    
                </div>
            @endif
             @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                    
                </div>
            @endif
            <div class="botones-ajustes">
                <ul class="nav-ajustes-botones">
                    <li class="contenido-cargable" id="contenidoGeneral" data-url="{{ route('general-informacion') }}">General
                    </li>
                    <li class="contenido-cargable" id="contenidoReservas" data-url="{{ route('reservas-historialReservas') }}">Reservas
                    </li>
                    <li class="contenido-cargable" id="contenidoSuscripcion" data-url="{{ route('suscripcion-estadoSuscripcion') }}">
                        Suscripcion</li>
                    <li class="contenido-cargable" id="contenidoContraseña" data-url="{{ route('contrasena-cambiarContraseña') }}">
                        Cambiar contraseña</li>
                    <li class="contenido-cargable" id="contenidoOtros" data-url="{{ route('otros-notificaciones')}}">Otros ajustes
                    </li>
                </ul>
                <div class="nombre-ajustes">
                    <span></span>{{ Auth::user()->nombre }} <span class="cerrar-icono"></span>
                </div>
            </div>
            <div id="contenido-dinamico" class="contenido-ajustes">
                <div class="contenidoGeneral" id="contenedor-contenidoGeneral">
                    @yield('contenidoGeneral')
                </div>
                <div class="contenidoReservas" id="contenedor-contenidoReservas">
                    @yield('contenidoReservas')</div>
                <div class="contenidoSuscripcion" id="contenedor-contenidoSuscripcion">
                    @yield('contenidoSuscripcion')</div>
                <div class="contenidoContraseña" id="contenedor-contenidoContraseña">
                    @yield('contenidoContraseña')</div>
                <div class="contenidoOtros" id="contenedor-contenidoOtros">
                    @yield('contenidoOtros')</div>
            </div>
        </div>
    </div>
@endsection
