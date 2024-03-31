@extends('panel-control')

@section('CONT-crear')
    <div class="contenedor-contenido">
        <div class="seccion-elegir">
            <div class="opcion opcion-uno">
                <div class="imagen-ejemplo"></div>
                <div class="capa"></div>
                <div class="boton-eleccion">
                    <a href="{{route('crearContenido', ['opcion' => 'uno'])}}">Elegir</a>
                </div>
            </div>
            <div class="opcion opcion-dos">
                <div class="imagen-ejemplo"></div>
                <div class="capa"></div>
                <div class="boton-eleccion">
                    <a href="{{route('crearContenido', ['opcion' => 'dos'])}}">Elegir</a>
                </div>
            </div>
            <div class="opcion opcion-tres">
                <div class="imagen-ejemplo"></div>
                <div class="capa"></div>
                <div class="boton-eleccion">
                    <a href="{{route('crearContenido', ['opcion' => 'tres'])}}">Elegir</a>
                </div>
            </div>
            <div class="opcion opcion-cuatro">
                <div class="imagen-ejemplo"></div>
                <div class="capa"></div>
                <div class="boton-eleccion">
                    <a href="{{route('crearContenido', ['opcion' => 'cuatro'])}}">Elegir</a>
                </div>
            </div>
        </div>
    </div>
@endsection
