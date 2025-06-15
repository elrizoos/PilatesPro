@extends('admin/panel-control')

@section('CLASE-nueva')
    <form id="formulario-creacion-clase" class="container-fluid w-75  h-50" action="{{ route('clase.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group">
                <label for="nombre">Nombre clase:</label>
                <input type="text" name="nombre" id="nombre">
            </div>
            <div class="form-group">
                <label for="grupo">Grupo:</label>
                <select name="grupo" id="grupo">
                    @foreach ($grupos as $grupo)
                        <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row input-submit">
            <input type="submit" value="Crear clase">
        </div>
    </form>
@endsection
