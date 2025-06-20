@extends('admin/panel-control')

@section('USER-formulario')
<div class="d-flex align-items-center justify-content-center h-100 ">
    <form class="formulario-editar" class="formulario h-100 container-fluid  fs-5  p-5"
        action="{{ isset($usuario) ? route('usuario.update', ['usuario' => $usuario->id]) : route('usuario.create') }}"
        method="{{ isset($usuario) ? 'post' : 'get' }}">
        @csrf
        @isset($usuario)
        @method('PUT')
        @endisset

        <div class="row">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" value="{{ isset($usuario) ? $usuario->nombre : '' }}">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos"
                    value="{{ isset($usuario) ? $usuario->apellidos : '' }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input pattern="^[0-9]{8}[A-Z]$" maxlength="9"
                    title="Debe contener 8 números seguidos de una letra mayúscula (ej: 12345678Z)" required type="text"
                    name="dni" id="dni" value="{{ isset($usuario) ? $usuario->dni : '' }}">
            </div>
            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="text" name="telefono" id="telefono" pattern="^[0-9]{9}$" maxlength="9"
                    title="Debe ser un numero de telefono con formato valido" required
                    value="{{ isset($usuario) ? $usuario->telefono : '' }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ isset($usuario) ? $usuario->email : '' }}">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" id="direccion"
                    value="{{ isset($usuario) ? $usuario->direccion : '' }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                    value="{{ isset($usuario) ? $usuario->fecha_nacimiento : '' }}">
            </div>
            @if(!isset($usuario))
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password">
            </div>
            @endif
        </div>
        <div class="row row-tipo-usuario">
            <select class="fs-6" name="tipo_usuario" id="tipo-usuario">
                <option value="Admin" {{ isset($usuario) && $usuario->tipo_usuario === 'Admin' ? 'selected' : '' }}>
                    Admin</option>
                <option value="Alumno" {{ isset($usuario) && $usuario->tipo_usuario === 'Alumno' ? 'selected' : '' }}>
                    Alumno</option>
                <option value="Profesor" {{ isset($usuario) && $usuario->tipo_usuario === 'Profesor' ? 'selected' : ''
                    }}>Profesor
                </option>
            </select>
        </div>
        <div class="row input-submit">
            <input type="submit" value="Guardar usuario">
        </div>
        <!--
                <div class="row">
                <div class="col">
                    <input class="p-1 estilo-formulario w-100" type="text" name="name" id="nombre"
                        placeholder="Nombre" value="{{ isset($usuario) ? $usuario->nombre : '' }}">
                    <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">

                    @error('name')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input class="p-1 estilo-formulario w-100" type="text" name="apellidos" id="apellidos"
                        placeholder="Apellidos" value="{{ isset($usuario) ? $usuario->apellidos : '' }}">
                    <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">

                    @error('apellidos')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input class="p-1 estilo-formulario w-100" type="text" name="dni" id="dni"
                        placeholder="DNI" value="{{ isset($usuario) ? $usuario->dni : '' }}">
                    <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">

                    @error('dni')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input class="p-1 estilo-formulario w-100" type="tel" name="telefono" id="telefono"
                        placeholder="Telefono" value="{{ isset($usuario) ? $usuario->telefono : '' }}">
                    <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">

                    @error('telefono')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input class="p-1 estilo-formulario w-100" type="text" name="direccion" id="direccion"
                        placeholder="Direccion" value="{{ isset($usuario) ? $usuario->direccion : '' }}">
                    <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">

                    @error('direccion')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input class="p-1 estilo-formulario w-100" type="email" name="email" id="email"
                        placeholder="Email" value="{{ isset($usuario) ? $usuario->email : '' }}">
                    <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">

                    @error('email')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input class="p-1 estilo-formulario w-100" type="password" name="password" id="contraseña"
                        placeholder="Contraseña" value="{{ isset($usuario) ? $usuario->contraseña : '' }}">
                    <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">

                    @error('password')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input class="p-1 estilo-formulario w-100" type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                        value="{{ isset($usuario) ? $usuario->fecha_nacimiento : '' }}">
                    <hr class="linea-transition-weigth border border-warning-subtle border-1 ">

                    @error('fecha_nacimiento')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <select class="estilo-formulario-select fs-6" name="tipo_usuario" id="tipo-usuario">
                    <option value="Admin" {{ isset($usuario) && $usuario->tipo_usuario === 'Admin' ? 'selected' : '' }}>
                        Admin</option>
                    <option value="Alumno" {{ isset($usuario) && $usuario->tipo_usuario === 'Alumno' ? 'selected' : '' }}>
                        Alumno</option>
                    <option value="Profesor"
                        {{ isset($usuario) && $usuario->tipo_usuario === 'Profesor' ? 'selected' : '' }}>Profesor
                    </option>
                </select>
                @error('tipo-usuario')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <input class="estilo-formulario estilo-formulario-enviar" type="submit" value="Enviar">
            </div>
            -->
    </form>
</div>
@endsection