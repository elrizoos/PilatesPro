@extends('layouts.config')

@section('content')
    <div class="contenedor-ajustes">
        <div class="nav-ajustes">
            <div class="logo-ajustes">
                <div class="imagen-logo"></div>
            </div>
            <div class="botones-ajustes">
                <ul class="nav-ajustes-botones">
                    <li id="contenidoGeneral" data-url="{{ url('/usuario/general') }}">General</li>
                    <li id="contenidoReservas" data-url="{{ url('/usuario/reservas') }}">Reservas</li>
                    <li id="contenidoSuscripcion" data-url="{{ url('/usuario/suscripcion') }}">Suscripcion</li>
                    <li id="contenidoContraseña" data-url="{{ url('/usuario/contrasena') }}">Cambiar contraseña</li>
                    <li id="contenidoOtros" data-url="{{ url('/usuario/otros') }}">Otros ajustes</li>
                </ul>
                <div class="nombre-ajustes">
                    <span></span>{{Auth::user()->nombre}}
                </div>
            </div>
            <div id="contenido-dinamico" class="contenido-ajustes">

            </div>
        </div>
    </div>
@endsection