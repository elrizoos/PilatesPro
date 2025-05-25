@extends('admin/panel-control')

@section('CLASE-editar')
    <div class="container-fluid w-100 h-100">
        <form class="w-100 h-100 container-fluid  fs-5  p-2 d-md-flex flex-column align-items-center justify-content-center"
            action="{{ route('clase.update', ['clase' => $clase->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col  d-flex flex-column justify-content-center align-items-center">
                    <input class="estilo-formulario" type="text" placeholder="Nombre" name="nombre" value="{{ $clase->nombre }}">

                    @error('nombre')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col  d-flex flex-column justify-content-center align-items-center">
                    @error('grupo')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <select class="estilo-formulario estilo-formulario-select" name="grupo" id="grupo">
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div>
                    <input class="estilo-formulario estilo-formulario-enviar" type="submit" value="Editar Clase">
                </div>
            </div>
        </form>
    </div>
@endsection
