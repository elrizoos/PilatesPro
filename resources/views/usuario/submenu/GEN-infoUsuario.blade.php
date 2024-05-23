@extends('usuario.general')
@section('informacionGeneral')
    <form action="{{ route('usuario-guardarCambios') }}">
        <input type="hidden" name="tipo_informacion" value="informacionGeneral">
        <input type="hidden" name="usuario" value="{{ Auth::user()->email }}">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ Auth::user()->nombre }}">
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos"
                value="{{ Auth::user()->apellidos }}">
        </div>
        <div>
            <label for="fecha-nacimiento">Fecha de nacimiento:</label>
            <input type="date" name="fecha-nacimiento" id="fecha-nacimiento"
                value="{{ Auth::user()->fecha_nacimiento }}" disabled>
            <label for="dni">DNI:</label>
            <input type="text" name="dni" id="dni" value="{{ Auth::user()->dni }}"
                disabled>
        </div>
        <div>
            <input type="submit" value="Guardar cambios">
        </div>
    </form>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
