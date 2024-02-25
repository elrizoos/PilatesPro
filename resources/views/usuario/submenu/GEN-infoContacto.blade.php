@extends('usuario.general')
@section('informacionContacto')
<form action="{{ route('usuario-guardarCambios') }}" class="formulario-informacion-general">
    <input type="hidden" name="tipo_informacion" value="informacionContacto">
    <input type="hidden" name="usuario" value="{{ Auth::user()->email }}">
    <div class="grupo-formulario">
        <label for="telefono">Telefono:</label>
        <input class="form-control" type="tel" name="telefono" id="telefono" value="{{ Auth::user()->telefono }}">
        <label for="email">Correo electrónico:</label>
        <input class="form-control" type="email" name="email" id="email" value="{{ Auth::user()->email }}">
    </div>
    <input type="submit" value="Guardar cambios">
</form>
@vite(['resources/js/contenidoInterno.js'])
@endsection
