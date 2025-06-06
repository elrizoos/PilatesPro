@extends('usuario.contrasena')
@section('politicas')
    <div class="recuadro-politicas col p-2  fs-5 text-center w-50 h-100">
        <div
            class="p-2  fs-5 text-center w-100 h-100 d-flex flex-column justify-content-center align-items-center">
            <h5 class="p-2  fs-5 text-center">Requisitos Básicos de la Contraseña</h5>
            <ul class="fs-5 p-2  fs-5 text-center ">
                <li class="p-2  fs-5 text-center ">Longitud mínima de 8 caracteres</li>
                <li class="p-2  fs-5 text-center ">Al menos una letra mayúscula</li>
                <li class="p-2  fs-5 text-center ">Al menos una letra minúscula</li>
                <li class="p-2  fs-5 text-center ">Al menos un dígito</li>
                <li class="p-2  fs-5 text-center ">Al menos un carácter especial (por
                    ejemplo, @, #, $)</li>
            </ul>
        </div>
    </div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
