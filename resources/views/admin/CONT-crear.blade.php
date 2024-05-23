@extends('admin/panel-control')

@section('CONT-crear')
    <div>
        <div>
            <div>
                <div></div>
                <div></div>
                <div>
                    <a href="{{ route('crearContenido', ['opcion' => 'uno', 'pagina' => $idPagina]) }}">Elegir</a>
                </div>
            </div>
            <div>
                <div></div>
                <div></div>
                <div>
                    <a href="{{ route('crearContenido', ['opcion' => 'dos', 'pagina' => $idPagina]) }}">Elegir</a>
                </div>
            </div>
            <div>
                <div></div>
                <div></div>
                <div>
                    <a href="{{ route('crearContenido', ['opcion' => 'tres', 'pagina' => $idPagina]) }}">Elegir</a>
                </div>
            </div>
            <div>
                <div></div>
                <div></div>
                <div>
                    <a href="{{ route('crearContenido', ['opcion' => 'cuatro', 'pagina' => $idPagina]) }}">Elegir</a>
                </div>
            </div>
        </div>
        <div>
            <a href="{{ route('pagina.create') }}">Crear nueva pagina</a>
        </div>
    </div>
@endsection
