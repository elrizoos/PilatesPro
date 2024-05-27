@extends('admin/panel-control')

@section('USER-formulario')
    <div class="d-flex align-items-center justify-content-center h-100">
        <form class="w-100 h-100 container-fluid  fs-5  p-5" action="{{ isset($usuario) ? route('usuario.update',['usuario' => $usuario->id]) : route('usuario.create') }}" method="{{ isset($usuario) ? 'post' : 'get'}}">
            @csrf
            @isset($usuario)
                @method('PUT')
            @endisset
            <div class="row">
                <div class="col">
                    <input class="p-1 estilo-formulario w-100" type="text" name="name" id="nombre" placeholder="Nombre" value="{{ isset($usuario) ? $usuario->nombre : '' }}">
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
                    <input class="p-1 estilo-formulario w-100" type="text" name="dni" id="dni" placeholder="DNI" value="{{ isset($usuario) ? $usuario->dni : '' }}">
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
                    <input class="p-1 estilo-formulario w-100" type="email" name="email" id="email" placeholder="Email" value="{{ isset($usuario) ? $usuario->email : '' }}">
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
                    <input class="p-1 estilo-formulario w-100" type="date" name="fecha_nacimiento" id="fecha_nacimiento"  value="{{ isset($usuario) ? $usuario->fecha_nacimiento : '' }}">
                <hr class="linea-transition-weigth border border-warning-subtle border-1 ">
                    
                    @error('fecha_nacimiento')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <select class="estilo-formulario-select" name="tipo_usuario" id="tipo-usuario">
                    <option value="Admin" {{ isset($usuario) && $usuario->tipo_usuario === 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Alumno" {{ isset($usuario) && $usuario->tipo_usuario === 'Alumno' ? 'selected' : '' }}>
                        Alumno</option>
                    <option value="Profesor" {{ isset($usuario) && $usuario->tipo_usuario === 'Profesor' ? 'selected' : '' }}>Profesor
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
        </form>
    </div>
@endsection
