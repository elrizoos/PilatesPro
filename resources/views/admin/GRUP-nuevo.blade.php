@extends('admin/panel-control')

@section('GRUP-nuevo')
    <div>
        <form action="{{ route('grupo.store')}}" method="POST">
            @csrf
            <div>
                <div>
                    <input type="text" placeholder="Nombre" name="nombre">
                    <input type="text" placeholder="Descripcion" name="descripcion">
                    <select name="profesor" id="profesor-select">
                        @foreach ($profesores as $profesor)
                            <option value="{{ $profesor->id }}">Profesor: {{ $profesor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div></div>
            </div>
            <div>
                <input type="submit" value="Crear grupo">
            </div>
        </form>
    </div>
@endsection