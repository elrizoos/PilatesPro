@extends('admin/panel-control')

@section('CLASE-nueva')
    <div>
        <form action="{{ route('clase.store')}}" method="POST">
            @csrf
            <div>
                <div>
                    <input type="text" placeholder="Nombre" name="nombre">
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
                    <input type="submit" value="Crear clase nueva">
                </div>
            </div>
        </form>
    </div>
@endsection