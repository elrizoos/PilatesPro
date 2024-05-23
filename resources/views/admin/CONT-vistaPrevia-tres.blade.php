@extends('admin/panel-control')

@section('CONT-vistaPrevia-tres'){{'Mostrando pagina :' . $idPagina}}
    <div>
        <div>
            <h2>{{ $seccion->titulo }}</h2>
        </div>
        <div>
            <div style="background-image: url( {{ asset('storage/' . $imagen->ruta_imagen) }})">

            </div>
        </div>
        <div>
            <p>{{ $seccion->parrafo }}</p>
        </div>
    </div>
    <div>
        <div id="botonSiguiente">
            <form action="{{ $seccion->orden == 1 && $seccion->idPagina == $idPagina ? route('mostrarPagina',['pagina' =>$slug]) : route('seleccionApartado', ['pagina' =>$slug, 'seccion' => $seccion->id]) }}" method="GET">
                @csrf

                <input type="submit" name="Enviar" value="">
            </form>
        </div>
        <div id="botonCancelar">
            <form action="{{ route('cancelarContenido', ['seccion' => $seccion->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <input type="submit" name="Enviar" value="">
            </form>
        </div>
    </div>
@endsection
