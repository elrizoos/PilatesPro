@extends('layouts.app')

@section('content')
    <div class="contenido contenido-login">
        <div class="caja-formulario">
            <div class="caja-logo">
                <div id="imagen-logo" class="imagen-logo w-100 h-100" data-url="{{ route('inicio') }}"></div>
            </div>
         
            <form class="formulario-login" action="{{ route('login') }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <div class="label-error">
                            <label for="email">Email: </label>
                            @error('email')
                                <span role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="email" name="email" id="email" />
                    </div>
                    <div class="form-group">
                        <div class="label-error">
                            <label for="password">Password:</label>
                            @error('password')
                                <span role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="password" name="password" id="password" />
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn-entrar">Entrar</button>
                </div>
                <a href="{{ route('password.request') }}" class="">¿Olvidaste tu contraseña?</a>
            </form>
        </div>
    </div>
@endsection
