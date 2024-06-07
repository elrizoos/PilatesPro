@extends('layouts.app')

@section('content')
    <div class="vw-100 vh-100 d-flex flex-column justify-content-center align-items-center">
        <div
            class="w-50 h-75 border border-warning-subtle bg-color-fondo d-flex flex-column justify-content-evenly align-items-center">
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
                <input class="estilo-formulario estilo-formulario-enviar text-center" type="submit" value="Entrar">
            </form>
        </div>
    </div>
@endsection
