@extends('usuario.contrasena')
@section('politicas')
    <div class=" col p-2  fs-5 text-center w-50 h-100 bg-color-principal">
            <div class="p-2  fs-5 text-center bg-color-principal w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                <h5 class="p-2  fs-5 text-center bg-color-principal texto-color-resalte">Requisitos Básicos de la Contraseña</h5>
                <ul class="p-2  fs-5 text-center bg-color-principal ">
                    <li class="p-2  fs-5 text-center bg-color-principal texto-color-gris">Longitud mínima de 8 caracteres</li>
                    <li class="p-2  fs-5 text-center bg-color-principal texto-color-gris">Al menos una letra mayúscula</li>
                    <li class="p-2  fs-5 text-center bg-color-principal texto-color-gris">Al menos una letra minúscula</li>
                    <li class="p-2  fs-5 text-center bg-color-principal texto-color-gris">Al menos un dígito</li>
                    <li class="p-2  fs-5 text-center bg-color-principal texto-color-gris">Al menos un carácter especial (por ejemplo, @, #, $)</li>
                </ul>
            </div>
        </div>
    @vite(['resources/js/contenidoInterno.js'])

@endsection