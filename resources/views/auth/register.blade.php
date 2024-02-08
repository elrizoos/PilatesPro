@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="formulario-register">
            <div class="div-logo">
                <div class="imagen-logo"></div>
            </div>
            <div class="div-formulario">

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="row-registro">
                        <input type="text" name="name" id="name" placeholder="Nombre">
                        <hr class="linea-auth">
                        @error('name')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
                        <hr class="linea-auth">
                        @error('apellidos')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="password" name="password" id="password" placeholder="Contraseña">
                        <hr class="linea-auth">
                        @error('password')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="password" name="password_confirmed" id="password_confirmed"
                            placeholder="Confirmar Contraseña">
                        <hr class="linea-auth">
                        @error('password_confirmed')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="text" name="dni" id="dni" placeholder="DNI">
                        <hr class="linea-auth">
                        @error('dni')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row-registro">
                        <input type="tel" name="telefono" id="telefono" placeholder="Telefono">
                        <hr class="linea-auth">
                        @error('telefono')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="email" name="email" id="email" placeholder="Email">
                        <hr class="linea-auth">
                        @error('email')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input class="fecha-auth"type="date" name="fechaNacimiento" id="fechaNacimiento">
                        <hr class="linea-auth">
                        @error('fechaNacimiento')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="text" name="direccion" id="direccion" placeholder="Direccion">
                        <hr class="linea-auth">
                        @error('direccion')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input class="boton-enviar" type="submit" value="Entrar">
                </form>
            </div>
        </div>
    </div>
@endsection
