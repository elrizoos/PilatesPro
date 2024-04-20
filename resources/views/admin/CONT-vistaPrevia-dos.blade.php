@extends('admin/panel-control')

@section('CONT-vistaPrevia-dos')
    {{ 'Mostrando pagina :' . $idPagina }}
    <div class="seccion seccion-nueva seccion-dos">
        <div class="titulo">
            <h2 class="titulo-seccion">{{ $seccion->titulo }}</h2>
        </div>
        <div class="imagen imagen-uno">
            <div class="imagen-seccion " style="background-image: url( {{ asset('storage/' . $seccion->imagenUno->ruta_imagen) }})"">
            </div>
        </div>
        <div class="imagen imagen-dos">
            <div class="imagen-seccion " style="background-image: url( {{ asset('storage/' . $seccion->imagenDos->ruta_imagen) }})">
            </div>
        </div>
        <div class="parrafo">
            <p class="parrafo-seccion">{{$seccion->parrafo}}</p>
        </div>
    </div>
    <div class="botones-vistaPrevia">
        <div id="botonSiguiente" class="boton-siguiente">
            <form
                action="{{ $seccion->orden == 1 && $seccion->idPagina == $idPagina ? route('mostrarPagina', ['pagina' => $slug]) : route('seleccionApartado', ['pagina' => $slug, 'seccion' => $seccion->id]) }}"
                method="GET">
                @csrf

                <input type="submit" name="Enviar" value="">
            </form>
        </div>
        <div id="botonCancelar" class="boton-cancelar">
            <form action="{{ route('cancelarContenido', ['seccion' => $seccion->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <input type="submit" name="Enviar" value="">
            </form>
        </div>
    </div>
@endsection
