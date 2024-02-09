@extends('layouts.app')

@section('content')
<div class="container">
    <div class="formulario-login">
        <div class="div-logo">
            <div class="imagen-logo"></div>
        </div>
        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        <div class="div-formulario">
            <form action="{{route('login')}}" method="post">
                @csrf
                <input type="email" name="email" id="email" placeholder="Email">
                <hr class="linea-login">
                <input type="password" name="password" id="password" placeholder="Contraseña">
                <hr class="linea-login">
                <input class="boton-enviar" type="submit" value="Entrar">
            </form>
        </div>
    </div>
</div>
@endsection
