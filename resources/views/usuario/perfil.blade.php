@extends('layouts.config')

@section('content')
    <div class="contenedor-ajustes">
        <div class="nav-ajustes">
            <div class="logo-ajustes">
                <div class="imagen-logo"></div>
            </div>
            <div class="botones-ajustes">
                <ul class="nav-ajustes-botones">
                    <li class="contenido-cargable" id="contenidoGeneral" data-url="{{ url('/usuario/general') }}">General</li>
                    <li class="contenido-cargable" id="contenidoReservas" data-url="{{ url('/usuario/reservas') }}">Reservas</li>
                    <li class="contenido-cargable" id="contenidoSuscripcion" data-url="{{ url('/usuario/suscripcion') }}">Suscripcion</li>
                    <li class="contenido-cargable" id="contenidoContraseña" data-url="{{ url('/usuario/contrasena') }}">Cambiar contraseña</li>
                    <li class="contenido-cargable" id="contenidoOtros" data-url="{{ url('/usuario/otros') }}">Otros ajustes</li>
                </ul>
                <div class="nombre-ajustes">
                    <span></span>{{Auth::user()->nombre}} <span class="cerrar-icono"></span>
                </div>
            </div>
            <div id="contenido-dinamico" class="contenido-ajustes">

            </div>
        </div>
    </div>
@endsection