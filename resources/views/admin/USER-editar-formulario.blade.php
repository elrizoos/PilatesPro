@extends('admin/panel-control')

@section('USER-editar-formulario')
    <div>
       
        <form action="{{ route('usuario.update',['usuario' => $usuario->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <div>
                    <input type="text" name="name" id="nombre" placeholder="Nombre"
                        value="{{ $usuario->nombre ?? '' }}">
                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos"
                        value="{{ $usuario->apellidos ?? '' }}">
                </div>
                <div>
                    @error('name')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('apellidos')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div>
                <div>
                    <input type="text" name="dni" id="dni" placeholder="DNI"
                        value="{{ $usuario->dni ?? '' }}" readonly>
                    <input type="tel" name="telefono" id="telefono" placeholder="Telefono"
                        value="{{ $usuario->telefono ?? '' }}">
                </div>
                <div>
                    @error('dni')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('telefono')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div>
                <div>
                    <input type="text" name="direccion" id="direccion" placeholder="Direccion"
                        value="{{ $usuario->direccion ?? '' }}">
                    <input type="email" name="email" id="email" placeholder="Email"
                        value="{{ $usuario->email ?? '' }}" readonly>
                </div>
                <div>
                    @error('direccion')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('email')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div>
                <div>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                        value="{{ $usuario->fecha_nacimiento ?? '' }}">
                </div>
                <div>
                    @error('name')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('apellidos')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div>
                <select name="tipo_usuario" id="tipo-usuario">
                    <option value="no-valor"></option>
                    <option value="Alumno" {{ $usuario->tipo_usuario === 'Alumno' ? 'selected' : '' }}>
                        Alumno</option>
                    <option value="Profesor" {{ $usuario->tipo_usuario === 'Profesor' ? 'selected' : '' }}>Profesor
                    </option>
                </select>
                @error('tipo-usuario')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
@endsection
