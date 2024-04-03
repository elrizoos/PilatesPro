@extends('admin.CONT-vistaPrevia')

@section('CONT-estructura-uno')
    <div class="seccion seccion-nueva seccion-uno">
        <div class="titulo">
            <h2 class="titulo-seccion">{{ $seccion->titulo }}</h2>
        </div>
        <div class="imagen">
            <div class="imagen-seccion" style="background-image: url('../../public/imagenes/{{ $imagen->ruta_imagen }}')">
                
            </div>
        </div>
        <div class="parrafo">
            <p class="parrafo-seccion">{{ $seccion->parrafo }}</p>
        </div>
    </div>
@endsection
