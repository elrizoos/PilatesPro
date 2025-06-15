@extends('admin/panel-control')

@section('USER-gestionContrasena-formulario')
<div class="d-flex align-items-center justify-content-center w-100 h-100">
    <form class="formulario-contraseña w-100 h-100"
        action="{{ route('modificarContrasena', ['usuario' => $usuario->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input class="p-1 estilo-formulario w-100 text-center" type="password" name="password"
                    placeholder="Contraseña nueva">
               
            </div>
            <div class="form-group">
                <label for="password_confirmation">Repite contraseña:</label>
                <input class="p-1 estilo-formulario w-100 text-center" type="password" name="password_confirmation"
                    placeholder="Repite Contraseña nueva">
                
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center">

            <input class="estilo-formulario estilo-formulario-enviar w-50" type="submit" value="Cambiar contraseña">

        </div>
    </form>
</div>
@endsection