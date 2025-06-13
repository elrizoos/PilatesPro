@extends('admin/panel-control')

@section('CONT-vistaPrevia-dos')
    <h2 class="texto-color-resalte w-100 text-center mb-2">{{ 'Mostrando pagina :' . $idPagina }}</h2>
    <div class="d-flex justify-content-center align-items-center w-90 h-90">
        <div class="contenedor-seccion contenedor-dos">
            <div class="div1 titulo-seccion-previa">
                <h3>{{ $seccion->titulo }}</h3>
            </div>
            <div class="div2 imagen-seccion-previa">
                <div class="" style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }} )">
                </div>
            </div>
            <div class="div3 imagen-seccion-previa">
                <div class="" style="background-image: url( {{ asset('storage/' . $imagenDos->ruta_imagen) }} )">
                </div>
            </div>
            <div class="div4 parrafo-seccion-previa">
                <p>{{ $seccion->parrafo }}</p>
            </div>

        </div>


        <div class="inputs-seccion">
            <form class="siguiente "
                action="{{ $seccion->orden == 1 && $seccion->idPagina == $idPagina ? route('mostrarPagina', ['pagina' => $slug]) : route('seleccionApartado', ['pagina' => $slug, 'seccion' => $seccion->id]) }}"
                method="GET">
                @csrf

                <input class="estilo-formulario estilo-formulario-enviar" type="submit" name="Enviar" value="Siguiente">
            </form>

            <form class="cancelar" action="{{ route('cancelarContenido', ['seccion' => $seccion->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <input type="submit" name="Enviar" value="Cancelar">
            </form>
        </div>
    </div>
@endsection
