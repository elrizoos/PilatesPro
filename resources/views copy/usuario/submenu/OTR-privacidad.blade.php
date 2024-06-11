@extends('usuario.otros')
@section('privacidad')
<div id="contenedor-privacidad">
    <h3>Privacidad y Seguridad</h3>
    <form>
        <div class="form-group">
            <label>Visibilidad del Perfil</label>
            <select class="form-control">
                <option>Público</option>
                <option>Privado</option>
                <option>Solo amigos</option>
            </select>
        </div>
        <div class="form-group">
            <label>Autenticación de Dos Factores (2FA)</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="enable2fa">
                <label class="form-check-label" for="enable2fa">Habilitar 2FA</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection