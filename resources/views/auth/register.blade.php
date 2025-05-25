@extends('layouts.app')

@section('content')
    <div class="vw-100 vh-100 d-flex flex-column justify-content-center align-items-center">
        <div style="min-height: 60%"
            class="w-50 p-4 border border-warning-subtle bg-color-fondo d-flex flex-column justify-content-evenly align-items-center">
            <div class="w-50 h-20">
                <div class="imagen-logo w-100 h-100" data-url="{{ route('inicio') }}"></div>
            </div>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="formulario" class="formulario d-flex flex-column fs-5 container-fluid"
                action="{{ route('registroUsuario') }}" method="post">
                @csrf
                <input type="hidden" name="producto" value="{{isset($producto) ? $producto : ''}}">
                <div class="row">
                    <div class="col">
                        <input class="estilo-formulario text-center w-100" type="text" name="apellidos" id="apellidos"
                            placeholder="Apellidos">
                        <hr>
                        @error('apellidos')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="estilo-formulario text-center w-100" type="text" name="name" id="name"
                            placeholder="Nombre">
                        <hr>
                        @error('name')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <input class="estilo-formulario text-center w-100" type="tel" name="telefono" id="telefono"
                            placeholder="Telefono">
                        <hr>
                        @error('telefono')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="estilo-formulario text-center w-100" type="email" name="email" id="email"
                            placeholder="Email">
                        <hr>
                        @error('email')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="estilo-formulario text-center w-100" type="text" name="direccion" id="direccion"
                            placeholder="Direccion">
                        <hr>
                        @error('direccion')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="estilo-formulario text-center w-100" type="text" name="dni" id="dni"
                            placeholder="DNI">
                        <hr>
                        @error('dni')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <input class="estilo-formulario text-center w-100" type="date" name="fecha_nacimiento"
                            id="fecha_nacimiento">
                        <hr>
                        @error('fecha_nacimiento')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="estilo-formulario text-center w-100" type="password" name="password" id="password"
                            placeholder="Contraseña">
                        <hr>
                        @error('password')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <input class="estilo-formulario text-center w-100" type="password" name="password_confirmation"
                            id="password_confirmation" placeholder="Confirmar Contraseña">
                        <hr>
                        @error('password_confirmed')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="estilo-formulario estilo-formulario-enviar text-center w-100" type="submit"
                            value="Entrar">
                            
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection
