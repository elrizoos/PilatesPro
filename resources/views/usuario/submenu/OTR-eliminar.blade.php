@extends('usuario.otros')
@section('eliminar')
<div id="contenedor-eliminar">
    <h3>Eliminar Cuenta</h3>
    <p>Al eliminar tu cuenta, perderás acceso a todos tus datos y esta acción no se puede deshacer. ¿Estás seguro de que deseas continuar?</p>
    <form>
        <button type="submit" class="btn btn-danger">Eliminar Cuenta</button>
    </form>
</div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection