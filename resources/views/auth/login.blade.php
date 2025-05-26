@extends('layouts.app')

@section('content')
    <div class="vw-100 vh-100 d-flex flex-column justify-content-center align-items-center">
        <div  id="login"
            class="w-50 border border-warning-subtle bg-color-fondo d-flex flex-column justify-content-evenly align-items-center p-4" style="min-height: 40%">
            <div class="w-50 h-25">
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
            <form class="formulario" class="formulario d-flex flex-column fs-5" action="{{ route('login') }}" method="post">
                @csrf
                <input class="estilo-formulario" type="email" name="email" id="email" placeholder="Email">
                <hr class="linea-transition-rigth border border-warning-subtle w-25 border-1 ">
                <input class="estilo-formulario" type="password" name="password" id="password" placeholder="Contraseña">
                <hr class="linea-transition-rigth border border-warning-subtle w-25 border-1">
                <input class="estilo-formulario estilo-formulario-enviar text-center mb-3" type="submit" value="Entrar">
                <a href="{{ route('password.request') }}" class="estilo-formulario text-center p-2   d-inline-block">¿Olvidaste tu contraseña?</a>
            </form>
        </div>
    </div>
@endsection
