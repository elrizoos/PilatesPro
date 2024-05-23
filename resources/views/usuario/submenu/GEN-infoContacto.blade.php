@extends('usuario.general')
@section('informacionContacto')
    <form action="{{ route('usuario-guardarCambios') }}">
        <input type="hidden" name="tipo_informacion" value="informacionContacto">
        <input type="hidden" name="usuario" value="{{ Auth::user()->email }}">
        <div>
            <label for="telefono">Telefono:</label>
            <input type="tel" name="telefono" id="telefono" value="{{ Auth::user()->telefono }}">
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}">
        </div>
        <div>
            <input type="submit" value="Guardar cambios">
        </div>
    </form>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
