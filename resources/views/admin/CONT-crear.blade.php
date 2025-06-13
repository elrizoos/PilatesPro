@extends('admin/panel-control')

@section('CONT-crear')
<!--
<div class="contenedor-elegir-seccion">
    <div class="contenedor-interno">
        <div class="div1">
            <h2>Seleccione una plantilla de sección</h2>
        </div>
        <div class="div2 seccion-elegir">
            <a class="fs-5 fs-4 text-uppercase d-none fw-bold enlace position-absolute"
                href="{{ route('crearContenido', ['opcion' => 'uno', 'pagina' => $idPagina, 'vistaPrevia' => 'false']) }}">Elegir</a>
            <img class="img-fluid w-50" src="{{ asset('imagenes/Imagen.png') }}" alt="Estructura 1">
        </div>
        <div class="div3 seccion-elegir">
            <a class="fs-5 fs-4 text-uppercase d-none fw-bold enlace position-absolute"
                href="{{ route('crearContenido', ['opcion' => 'dos', 'pagina' => $idPagina, 'vistaPrevia' => 'false']) }}">Elegir</a>
            <img class="img-fluid w-50" src="{{ asset('imagenes/Imagen2.png') }}" alt="Estructura 2">
        </div>
        <div class="div4 seccion-elegir">
            <a class="fs-5 fs-4 text-uppercase d-none fw-bold enlace position-absolute"
                href="{{ route('crearContenido', ['opcion' => 'tres', 'pagina' => $idPagina, 'vistaPrevia' => 'false']) }}">Elegir</a>
            <img class="img-fluid w-50" src="{{ asset('imagenes/Imagen3.png') }}" alt="Estructura 3">
        </div>
        <div class="div5 seccion-elegir">
            <a class="fs-5 fs-4 text-uppercase d-none fw-bold enlace position-absolute"
                href="{{ route('crearContenido', ['opcion' => 'cuatro', 'pagina' => $idPagina, 'vistaPrevia' => 'false']) }}">Elegir</a>
            <img class="img-fluid w-50" src="{{ asset('imagenes/Imagen4.png') }}" alt="Estructura 4">

        </div>
    </div>
</div>
-->

        <div class="d-flex flex-column align-items-center w-90">
            <h2 class="titulo-elegir-seccion">Elige la seccion que quieras</h2>
        <div class="container-fluid h-auto  w-75 p-2 position-relative">
            <div class="row gap-3 position-relative p-2">
                <div class="col position-relative d-flex justify-content-center align-items-center seccion-elegir">
                    <a class="fs-5 fs-4 text-uppercase d-none fw-bold enlace position-absolute"
                        href="{{ route('crearContenido', ['opcion' => 'uno', 'pagina' => $idPagina, 'vistaPrevia' => 'false']) }}">Elegir</a>
                    <img class="img-fluid w-100 h-auto" src="{{ asset('imagenes/Imagen.png') }}" alt="Estructura 1">
                </div>
                <div class="col position-relative d-flex justify-content-center align-items-center seccion-elegir">
                    <a class="fs-5 fs-4 text-uppercase d-none fw-bold enlace position-absolute"
                        href="{{ route('crearContenido', ['opcion' => 'dos', 'pagina' => $idPagina, 'vistaPrevia' => 'false']) }}">Elegir</a>
                    <img class="img-fluid w-100 h-auto" src="{{ asset('imagenes/Imagen2.png') }}" alt="Estructura 1">
                </div>
            </div>
            <div class="row gap-3 position-relative p-2">
                <div class="col position-relative d-flex justify-content-center align-items-center seccion-elegir">
                    <a class="fs-5 fs-4 text-uppercase d-none fw-bold enlace position-absolute"
                        href="{{ route('crearContenido', ['opcion' => 'tres', 'pagina' => $idPagina, 'vistaPrevia' => 'false']) }}">Elegir</a>
                    <img class="img-fluid w-100 h-auto" src="{{ asset('imagenes/Imagen3.png') }}" alt="Estructura 1">
                </div>
                <div class="col position-relative d-flex justify-content-center align-items-center seccion-elegir">
                    <a class="fs-5 fs-4 text-uppercase d-none fw-bold enlace position-absolute"
                        href="{{ route('crearContenido', ['opcion' => 'cuatro', 'pagina' => $idPagina, 'vistaPrevia' => 'false']) }}">Elegir</a>
                    <img class="img-fluid w-100 h-auto" src="{{ asset('imagenes/Imagen4.png') }}" alt="Estructura 1">
                </div>
            </div>

        </div>
    </div>
@endsection