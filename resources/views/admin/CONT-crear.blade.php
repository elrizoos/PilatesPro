@extends('admin/panel-control')

@section('CONT-crear')
    <div class="d-flex justify-content-center align-items-center h-100 w-100">
        <div class="container-fluid h-auto  w-75 p-2 position-relative">
            <div class="row gap-3 position-relative p-2">
                <div class="col position-relative d-flex justify-content-center align-items-center seccion-elegir">
                    <a class="fs-4 text-uppercase d-none fw-bold enlace position-absolute"
                        href="{{ route('crearContenido', ['opcion' => 'uno', 'pagina' => $idPagina, 'vistaPrevia' => 'false']) }}">Elegir</a>
                    <img class="img-fluid w-100 h-auto" src="{{ asset('imagenes/Imagen.png') }}" alt="Estructura 1">
                </div>
                <div class="col position-relative d-flex justify-content-center align-items-center seccion-elegir">
                    <a class="fs-4 text-uppercase d-none fw-bold enlace position-absolute"
                        href="{{ route('crearContenido', ['opcion' => 'dos', 'pagina' => $idPagina, 'vistaPrevia' => 'false']) }}">Elegir</a>
                    <img class="img-fluid w-100 h-auto" src="{{ asset('imagenes/Imagen2.png') }}" alt="Estructura 1">
                </div>
            </div>
            <div class="row gap-3 position-relative p-2">
                <div class="col position-relative d-flex justify-content-center align-items-center seccion-elegir">
                    <a class="fs-4 text-uppercase d-none fw-bold enlace position-absolute"
                        href="{{ route('crearContenido', ['opcion' => 'tres', 'pagina' => $idPagina, 'vistaPrevia' => 'false']) }}">Elegir</a>
                    <img class="img-fluid w-100 h-auto" src="{{ asset('imagenes/Imagen3.png') }}" alt="Estructura 1">
                </div>
                <div class="col position-relative d-flex justify-content-center align-items-center seccion-elegir">
                    <a class="fs-4 text-uppercase d-none fw-bold enlace position-absolute"
                        href="{{ route('crearContenido', ['opcion' => 'cuatro', 'pagina' => $idPagina, 'vistaPrevia' => 'false']) }}">Elegir</a>
                    <img class="img-fluid w-100 h-auto" src="{{ asset('imagenes/Imagen4.png') }}" alt="Estructura 1">
                </div>
            </div>

        </div>
    </div>
@endsection
