@extends('admin/panel-control')

@section('USER-gestionContrasena-formulario')
    <div class="d-flex align-items-center justify-content-center h-100">
        <form class="formulario"
            class="formulario w-100 h-100 container-fluid  fs-5  p-5 d-md-flex flex-column align-items-center justify-content-center"
            action="{{ route('modificarContrasena', ['usuario' => $usuario->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <input class="p-1 estilo-formulario w-100 text-center" type="password" name="password"
                        placeholder="Contraseña nueva">
                    @error('password')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input class="p-1 estilo-formulario w-100 text-center" type="password" name="password_confirmation"
                        placeholder="Repite Contraseña nueva">
                    @error('password_confirmation')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input class="estilo-formulario estilo-formulario-enviar" type="submit" value="Cambiar contraseña">
                </div>
            </div>
        </form>
    </div>
@endsection
