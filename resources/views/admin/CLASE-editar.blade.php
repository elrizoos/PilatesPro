@extends('admin/panel-control')

@section('CLASE-editar')
     <div>
        <form action="{{ route('clase.update', ['clase' => $clase->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <div>
                    <input type="text" placeholder="Nombre" name="nombre" value="{{ $clase->nombre }}">
                    <select name="grupo" id="grupo">
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    @error('nombre')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('grupo')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div>
                <div>
                    <input type="submit" value="Editar Clase">
                </div>
            </div>
        </form>
    </div>
@endsection