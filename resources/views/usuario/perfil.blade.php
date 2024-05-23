@extends('layouts.config')

@section('content')
    <div>
        <div>
            <div>
                <div></div>
            </div>
            @if (session('success'))
                <div role="alert">
                    {{ session('success') }}

                </div>
            @endif
            @if (session('error'))
                <div role="alert">
                    {{ session('error') }}

                </div>
            @endif
            <div>
                <ul>
                    <li id="contenidoGeneral" data-url="{{ route('general-informacion') }}">
                        General
                    </li>
                    <li id="contenidoReservas"
                        data-url="{{ route('reservas-historialReservas') }}">Reservas
                    </li>
                    <li id="contenidoSuscripcion"
                        data-url="{{ route('suscripcion-estadoSuscripcion') }}">
                        Suscripcion</li>
                    <li id="contenidoContraseña"
                        data-url="{{ route('contrasena-cambiarContraseña') }}">
                        Cambiar contraseña</li>
                    <li id="contenidoOtros" data-url="{{ route('otros-notificaciones') }}">Otros
                        ajustes
                    </li>
                </ul>
                <div>
                    <span></span>{{ Auth::user()->nombre }} <span></span>
                </div>
            </div>
            <div id="contenido-dinamico">
                <div id="contenedor-contenidoGeneral">
                    @yield('contenidoGeneral')
                </div>
                <div id="contenedor-contenidoReservas">
                    @yield('contenidoReservas')</div>
                <div id="contenedor-contenidoSuscripcion">
                    @yield('contenidoSuscripcion')</div>
                <div id="contenedor-contenidoContraseña">
                    @yield('contenidoContraseña')</div>
                <div id="contenedor-contenidoOtros">
                    @yield('contenidoOtros')</div>
            </div>
        </div>
    </div>
@endsection
