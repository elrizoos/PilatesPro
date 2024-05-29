@extends('usuario.general')
@section('preferenciasIdioma')
    <form class="formulario" action="" method="get">
        <label class="text-secondary" for="idiomaWeb">Idioma de la página:</label>
        <select name="idiomas" id="idiomas">
            <option value="español">Español-Castellano</option>
        </select>
    </form>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
