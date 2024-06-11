@extends('admin/panel-control')

@section('CLASE-nueva')
    <form class="container-fluid w-75  h-50" action="{{ route('clase.store') }}" method="POST">
        @csrf
        <div class="row p-5">
            <div class="col d-flex justify-content-center align-items-center">
                <input class="estilo-formulario" type="text" placeholder="Nombre" name="nombre">
                @error('nombre')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col d-flex justify-content-center align-items-center">
                <select class="estilo-formulario estilo-formulario-select" name="grupo" id="grupo">
                    @foreach ($grupos as $grupo)
                        <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                    @endforeach
                </select>
                @error('grupo')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center">
                <input class="estilo-formulario estilo-formulario-enviar" type="submit" value="Crear clase nueva">
            </div>
        </div>
    </form>
@endsection
