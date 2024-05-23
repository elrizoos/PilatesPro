@extends('admin/panel-control')

@section('USER-crear')
    
    <div>
        <form action="{{ route('usuario.create') }}" method="get">
            @csrf

            <div>
                <div>
                    <input type="text" name="name" id="nombre" placeholder="Nombre">
                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
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
                    <input type="text" name="dni" id="dni" placeholder="DNI">
                    <input type="tel" name="telefono" id="telefono" placeholder="Telefono">
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
                    <input type="text" name="direccion" id="direccion" placeholder="Direccion">
                    <input type="email" name="email" id="email" placeholder="Email">
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
                    <input type="password" name="password" id="contraseña"
                        placeholder="Contraseña">
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
                </div>
                <div>
                    @error('password')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('fecha_nacimiento')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div>
                <select name="tipo_usuario" id="tipo-usuario">
                    <option value="Alumno">Alumno</option>
                    <option value="Profesor">Profesor</option>
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
