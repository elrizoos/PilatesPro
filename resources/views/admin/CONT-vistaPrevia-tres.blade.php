@extends('admin/panel-control')

@section('CONT-vistaPrevia-tres')
    <h2 class="texto-color-resalte w-100 text-center mb-2">{{ 'Mostrando pagina :' . $idPagina }}</h2>
    <div class="container-fluid  w-75 h-75 position-relative border border-1 rounded-5">
        <div class="row h-25">
            <div class="col">
                <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
            </div>
        </div>
        <div class="row h-75">
            <div class="col">
                <p class="w-100 h-100 fs-4 texto-color-secundariotext-center p-4">{{ $seccion->parrafo }}</p>
            </div>
        </div>
    </div>
    <form class="formulario" class="formulario position-absolute end-0 "
        action="{{ $seccion->orden == 1 && $seccion->idPagina == $idPagina ? route('mostrarPagina', ['pagina' => $slug]) : route('seleccionApartado', ['pagina' => $slug, 'seccion' => $seccion->id]) }}"
        method="GET">
        @csrf

        <input class="estilo-formulario estilo-formulario-enviar" type="submit" name="Enviar" value="Siguiente">
    </form>

    <form class="formulario" class="formulario position-absolute start-0"
        action="{{ route('cancelarContenido', ['seccion' => $seccion->id]) }}" method="POST">
        @csrf
        @method('DELETE')

        <input class="estilo-formulario estilo-formulario-enviar" type="submit" name="Enviar" value="Cancelar">
    </form>
@endsection
