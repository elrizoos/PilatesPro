@extends('admin/panel-control')

@section('CLASE-editar')
     <div class="contenedor-formulario ">
        <form class="flex" action="{{ route('clase.update', ['clase' => $clase->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="grupo-formulario">
                <div class="grupo-input">
                    <input class="estilo-formulario" type="text" placeholder="Nombre" name="nombre" value="{{ $clase->nombre }}">
                    <select name="grupo" id="grupo">
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grupo-error">
                    @error('nombre')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('grupo')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="grupo-formulario">
                <div class="grupo-input">
                    <input type="submit" value="Editar Clase">
                </div>
            </div>
        </form>
    </div>
@endsection