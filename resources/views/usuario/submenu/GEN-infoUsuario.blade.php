@extends('usuario.general')
@section('informacionGeneral')
    <form class="col d-flex justify-content-center align-items-center flex-column "  action="{{ route('usuario-guardarCambios') }}">
        <input type="hidden" name="tipo_informacion" value="informacionGeneral">
        <input type="hidden" name="usuario" value="{{ Auth::user()->email }}">
        <div class="row w-50 ">
            <div class="col">
                <input class="estilo-formulario" type="text" name="nombre" id="nombre"
                    value="{{ Auth::user()->nombre }}" placeholder="Nombre">
                <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">
            </div>
            <div class="col">
                <input class="estilo-formulario" type="text" name="apellidos" id="apellidos"
                    value="{{ Auth::user()->apellidos }}" placeholder="Apellidos">
                <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">
            </div>
        </div>
        <div class="row w-50 ">
            <div class="col">
                <input class="estilo-formulario" type="date" name="fecha-nacimiento" id="fecha-nacimiento"
                    value="{{ Auth::user()->fecha_nacimiento }}" disabled>
                <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">
            </div>
            <div class="col">
                <input class="estilo-formulario" type="text" name="dni" id="dni"
                    value="{{ Auth::user()->dni }}" disabled placeholder="DNI">
                <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">

            </div>
        </div>
        <div class="row w-50 ">
            <div class="col d-flex justify-content-center align-items-center">
                <input class="estilo-formulario estilo-formulario-dorado-enviar" type="submit" value="Guardar cambios">
                <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">
            </div>
        </div>
    </form>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
