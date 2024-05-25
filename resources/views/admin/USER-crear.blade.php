@extends('admin/panel-control')

@section('USER-crear')
    <div class="d-flex align-items-center justify-content-center h-100">
        <form class="w-100 h-100 container-fluid  fs-5 border border-warning-subtle rounded p-5" action="{{ route('usuario.create') }}" method="get">
            @csrf
            <div class="row">
                <div class="col">
                    <input class="p-1 estilo-formulario w-100" type="text" name="name" id="nombre" placeholder="Nombre">
                    <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">

                    @error('name')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input class="p-1 estilo-formulario w-100" type="text" name="apellidos" id="apellidos"
                        placeholder="Apellidos">
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
                    <input class="p-1 estilo-formulario w-100" type="text" name="dni" id="dni" placeholder="DNI">
                <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">

                    @error('dni')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input class="p-1 estilo-formulario w-100" type="tel" name="telefono" id="telefono"
                        placeholder="Telefono">
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
                        placeholder="Direccion">
                <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">

                    @error('direccion')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input class="p-1 estilo-formulario w-100" type="email" name="email" id="email" placeholder="Email">
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
                        placeholder="Contraseña">
                <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">

                    @error('password')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input class="p-1 estilo-formulario w-100" type="date" name="fecha_nacimiento" id="fecha_nacimiento">
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
                    <option value="Alumno">Alumno</option>
                    <option value="Profesor">Profesor</option>
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
