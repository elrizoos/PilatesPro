@extends('admin/panel-control')

@section('CONT-vistaPrevia-dos')
    <h2 class="texto-color-resalte w-100 text-center mb-2">{{ 'Mostrando pagina :' . $idPagina }}</h2>

    <div class="contenedor-grid-seccion-dos w-75 h-100 border ">
        <div class="titulo  d-flex justify-content-center align-items-center fs-3">
            <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
        </div>
        <div class="imagen-uno p-2">
            <div id="imagen-upload-imagenUno" class=" w-100 h-100">
                <div class="img-fluid imagen w-100 h-100 p-4"
                    style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }})">
                </div>
            </div>
        </div>
        <div class="imagen-dos p-2">
            <div id="imagen-upload-imagenDos" class=" w-100 h-100">
                <div class="img-fluid imagen w-100 h-100 p-4"
                    style="background-image: url( {{ asset('storage/' . $imagenDos->ruta_imagen) }})">
                </div>
            </div>
        </div>
        <div class="parrafo d-flex justify-content-center align-items-center">
            <p class="w-100 h-100 fs-4 texto-color-secundariotext-center p-4">{{ $seccion->parrafo }}</p>
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
