@extends('admin/panel-control')

@section('GRUP-nuevo')
    <div class="d-flex align-items-center justify-content-center h-100">
        <form class="formulario"
            class="formulario w-100 h-100 container-fluid  fs-5  p-5 d-md-flex flex-column align-items-center justify-content-center"
            action="{{ route('grupo.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <input class="p-1 estilo-formulario w-100 text-center" type="text" placeholder="Nombre" name="nombre">
                </div>
                <div class="col">
                    <input class="p-1 estilo-formulario w-100 text-center" type="text" placeholder="Descripcion"
                        name="descripcion">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <select class="estilo-formulario estilo-formulario-select" name="profesor" id="profesor-select">
                        @foreach ($profesores as $profesor)
                            <option value="{{ $profesor->id }}">Profesor: {{ $profesor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input class="estilo-formulario estilo-formulario-enviar" type="submit" value="Crear grupo">
                </div>
            </div>
        </form>
    </div>
@endsection
