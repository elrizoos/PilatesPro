@extends('admin/panel-control')

@section('GRUP-nuevo')
    <div class="contenedor-formulario">
        <form action="{{ route('grupo.store')}}" method="POST">
            @csrf
            <div class="grupo-formulario">
                <div class="grupo-input">
                    <input type="text" placeholder="Nombre" name="nombre">
                    <input type="text" placeholder="Descripcion" name="descripcion">
                    <select name="profesor" id="profesor-select">
                        @foreach ($profesores as $profesor)
                            <option value="{{ $profesor->id }}">Profesor: {{ $profesor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grupo-error"></div>
            </div>
            <div class="grupo-formulario">
                <input type="submit" value="Crear grupo">
            </div>
        </form>
    </div>
@endsection