@extends('admin/panel-control')

@section('HORARIO-editar')
     <div class="contenedor-formulario ">
        <form class="flex" action="{{ route('clase.update', ['horario' => $horario->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="grupo-formulario">
                <div class="grupo-input">
                    <select name="clase" id="clase">
                        @foreach ($clases as $clase)
                            <option value="{{ $clase->id }}">{{ $clase->nombre }}</option>
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