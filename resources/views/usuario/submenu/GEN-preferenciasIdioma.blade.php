@extends('usuario.general')
@section('preferenciasIdioma')
    <form class="formulario-preferenciasIdioma" action="" method="get">
        <label for="idiomaWeb">Idioma de la página:</label>
        <select name="idiomas" id="idiomas">
            <option value="español">Español-Castellano</option>
        </select>
    </form>
@vite(['resources/js/contenidoInterno.js'])
@endsection
