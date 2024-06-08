@extends('usuario.otros')
@section('redSocial')
<div id="contenedor-redSocial">
    <h3>Conexiones Sociales</h3>
    <form>
        <div class="form-group">
            <label>Vincular cuentas</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="linkFacebook">
                <label class="form-check-label" for="linkFacebook">Facebook</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="linkTwitter">
                <label class="form-check-label" for="linkTwitter">Twitter</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection