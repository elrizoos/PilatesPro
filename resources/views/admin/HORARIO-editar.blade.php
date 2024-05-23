@extends('admin/panel-control')

@section('HORARIO-editar')
     <div>
        <form action="{{ route('clase.update', ['horario' => $horario->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <div>
                    <select name="clase" id="clase">
                        @foreach ($clases as $clase)
                            <option value="{{ $clase->id }}">{{ $clase->nombre }}</option>
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