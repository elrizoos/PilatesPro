@extends('admin/panel-control')

@section('CLASE-editar')
    <div class="container-fluid w-100 h-100">
        <form id="formulario-creacion-clase" class="w-100 h-100 container-fluid  fs-5  p-2 d-md-flex flex-column align-items-center justify-content-center"
            action="{{ route('clase.update', ['clase' => $clase->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
            <div class="form-group">
                <label for="nombre">Nombre clase:</label>
                <input type="text" name="nombre" id="nombre" value="{{ isset($clase) ? $clase->nombre : '' }}">
            </div>
            <div class="form-group">
                <label for="grupo">Grupo:</label>
                <select name="grupo" id="grupo">
                    @foreach ($grupos as $grupo)
                        <option {{ isset($clase) && $clase->grupo_id === $grupo->id ? 'selected' : ''  }} value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row input-submit">
            <input type="submit" value="Modificar clase">
        </div>
        </form>
    </div>
@endsection
