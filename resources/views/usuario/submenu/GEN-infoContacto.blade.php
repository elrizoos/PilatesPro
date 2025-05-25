@extends('usuario.general')
@section('informacionContacto')
    <form class=" col d-flex justify-content-center align-items-center flex-column"
        action="{{ route('usuario-guardarCambios') }}">
        <input type="hidden" name="tipo_informacion" value="informacionContacto">
        <input type="hidden" name="usuario" value="{{ Auth::user()->email }}">
        <div class="row">
            <div class="col">
                <input class="estilo-formulario" type="tel" name="telefono" id="telefono" value="{{ Auth::user()->telefono }}">
                <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">
            </div>
            <div class="col">
                <input class="estilo-formulario" type="email" name="email" id="email" value="{{ Auth::user()->email }}">
                <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">
            </div>
        </div>
        <div>
            <input class="estilo-formulario estilo-formulario-enviar" type="submit" value="Guardar cambios">
        </div>
    </form>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
