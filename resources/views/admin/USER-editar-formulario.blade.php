@extends('admin/panel-control')

@section('USER-editar-formulario')
    <div class="contenedor-formulario">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}

            </div>
        @endif
        <form action="{{ route('actualizarUsuario') }}" method="post">
            @csrf
            @method('PUT')
            <div class="grupo-formulario">
                <div class="grupo-input">
                    <input class="estilo-formulario" type="text" name="name" id="nombre" placeholder="Nombre"
                        value="{{ $usuario->nombre ?? '' }}">
                    <input type="text" name="apellidos" id="apellidos" class="estilo-formulario" placeholder="Apellidos"
                        value="{{ $usuario->apellidos ?? '' }}">
                </div>
                <div class="grupo-error">
                    @error('name')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('apellidos')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="grupo-formulario">
                <div class="grupo-input">
                    <input type="text" name="dni" id="dni" class="estilo-formulario" placeholder="DNI"
                        value="{{ $usuario->dni ?? '' }}" readonly>
                    <input type="tel" name="telefono" id="telefono" class="estilo-formulario" placeholder="Telefono"
                        value="{{ $usuario->telefono ?? '' }}">
                </div>
                <div class="grupo-error">
                    @error('dni')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('telefono')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="grupo-formulario">
                <div class="grupo-input">
                    <input type="text" name="direccion" id="direccion" class="estilo-formulario" placeholder="Direccion"
                        value="{{ $usuario->direccion ?? '' }}">
                    <input type="email" name="email" id="email" class="estilo-formulario" placeholder="Email"
                        value="{{ $usuario->email ?? '' }}" readonly>
                </div>
                <div class="grupo-error">
                    @error('direccion')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('email')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="grupo-formulario">
                <div class="grupo-input">
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                        value="{{ $usuario->fecha_nacimiento ?? '' }}">
                </div>
                <div class="grupo-error">
                    @error('name')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('apellidos')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="grupo-formulario">
                <select name="tipo_usuario" id="tipo-usuario">
                    <option value="no-valor"></option>
                    <option class="optionvalue" value="Alumno" {{ $usuario->tipo_usuario === 'Alumno' ? 'selected' : '' }}>
                        Alumno</option>
                    <option value="Profesor" {{ $usuario->tipo_usuario === 'Profesor' ? 'selected' : '' }}>Profesor
                    </option>
                </select>
                @error('tipo-usuario')
                    <span class="invalid-feedback active-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="grupo-formulario">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
@endsection
