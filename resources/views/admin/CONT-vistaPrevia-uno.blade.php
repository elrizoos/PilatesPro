@extends('admin/panel-control')

@section('CONT-vistaPrevia-uno')
    <h2 class="texto-color-resalte w-100 text-center mb-2">{{ 'Mostrando pagina :' . $idPagina }}</h2>

    @switch($imagen)
        @case('der')
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
                    <div class="col">
                        <div class="img-fluid imagen w-100 h-100 p-4"
                            style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }})">
                        </div>
                    </div>
                </div>
            </div>
        @break

        @case('izq')
            <div class="container-fluid  w-75 h-75 position-relative border border-1 rounded-5">
                <div class="row h-25">
                    <div class="col">
                        <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
                    </div>
                </div>
                <div class="row h-75">
                    <div class="col">
                        <div class="img-fluid imagen w-100 h-100 p-4"
                            style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }})">
                        </div>
                    </div>
                    <div class="col">
                        <p class="w-100 h-100 fs-4 texto-color-secundariotext-center p-4">{{ $seccion->parrafo }}</p>
                    </div>
                </div>
            </div>
        @break

        @default
    @endswitch

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
