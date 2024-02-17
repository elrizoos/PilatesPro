@extends('usuario.general')
@section('informacionGeneral')
    <form action="{{ route('usuario-guardarCambios') }}" class="formulario-informacion-general">
        <input type="hidden" name="tipo_informacion" value="informacionGeneral">
        <input type="hidden" name="usuario" value="{{ Auth::user()->email }}">
        <div class="grupo-formulario">
            <label for="nombre">Nombre:</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ Auth::user()->nombre }}">
            <label for="apellidos">Apellidos:</label>
            <input class="form-control" type="text" name="apellidos" id="apellidos"
                value="{{ Auth::user()->apellidos }}">
        </div>
        <div class="grupo-formulario">
            <label for="fecha-nacimiento">Fecha de nacimiento:</label>
            <input class="form-control" type="date" name="fecha-nacimiento" id="fecha-nacimiento"
                value="{{ Auth::user()->fecha_nacimiento }}" disabled>
            <label for="dni">DNI:</label>
            <input class="form-control" type="text" name="dni" id="dni" value="{{ Auth::user()->dni }}"
                disabled>
        </div>
        <input type="submit" value="Guardar cambios">
    </form>
@vite(['resources/js/contenidoInterno.js'])
@endsection
