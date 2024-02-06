@extends('layouts.app')

@section('content')
<div class="container">
    <div class="formulario-login">
        <div class="div-logo">
            <div class="imagen-logo"></div>
        </div>
        <div class="div-formulario">
            <form action="" method="post">
                <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                <hr class="linea-login">
                <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña">
                <hr class="linea-login">
                <input class="boton-enviar" type="submit" value="Entrar">
            </form>
        </div>
    </div>
</div>
@endsection
