@extends('admin/panel-control')

@section('CONT-crear')
    <div class="contenedor-contenido">
        <div class="seccion-elegir">
            <div class="opcion opcion-uno">
                <div class="imagen-ejemplo"></div>
                <div class="capa"></div>
                <div class="boton-eleccion">
                    <a href="{{ route('crearContenido', ['opcion' => 'uno', 'pagina' => $idPagina]) }}">Elegir</a>
                </div>
            </div>
            <div class="opcion opcion-dos">
                <div class="imagen-ejemplo"></div>
                <div class="capa"></div>
                <div class="boton-eleccion">
                    <a href="{{ route('crearContenido', ['opcion' => 'dos', 'pagina' => $idPagina]) }}">Elegir</a>
                </div>
            </div>
            <div class="opcion opcion-tres">
                <div class="imagen-ejemplo"></div>
                <div class="capa"></div>
                <div class="boton-eleccion">
                    <a href="{{ route('crearContenido', ['opcion' => 'tres', 'pagina' => $idPagina]) }}">Elegir</a>
                </div>
            </div>
            <div class="opcion opcion-cuatro">
                <div class="imagen-ejemplo"></div>
                <div class="capa"></div>
                <div class="boton-eleccion">
                    <a href="{{ route('crearContenido', ['opcion' => 'cuatro', 'pagina' => $idPagina]) }}">Elegir</a>
                </div>
            </div>
        </div>
        <div class="botonPagina">
            <a href="{{ route('pagina.create') }}">Crear nueva pagina</a>
        </div>
    </div>
@endsection
