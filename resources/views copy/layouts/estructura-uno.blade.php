@extends('admin.CONT-vistaPrevia-uno')



@section('CONT-estructura-uno')
    <div>
        <div>
            <h2>{{ $seccion->titulo }}</h2>
        </div>
        <div>
            <div style="background-image: url('../../public/imagenes/{{ $imagen->ruta_imagen }}')">

            </div>
        </div>
        <div>
            <p>{{ $seccion->parrafo }}</p>
        </div>
    </div>
@endsection
