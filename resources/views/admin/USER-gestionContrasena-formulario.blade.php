@extends('admin/panel-control')

@section('USER-gestionContrasena-formulario')
    @if (session('success'))
        <div class="alert alert-success ventana-emergente">
            <p>{{ session('success') }}</p>
            <span id=cerrarBoton></span>
        </div>
    @endif
    <div class="contenedor-formulario">
        <form class="formulario-corto" action="{{ route('modificarContrasena', ['usuario' => $usuario->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grupo-formulario">
                <div class="grupo-input">
                    <input class="estilo-formulario" type="password" name="password" placeholder="Contraseña nueva">

                    <input class="estilo-formulario" type="password" name="password_confirmation"
                        placeholder="Repite Contraseña nueva">
                </div>
                <div class="grupo-error">
                    @error('password')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('password_confirmation')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


            </div>
            <div class="grupo-formulario">
                <div class="grupo-input">
                    <input type="submit" value="Cambiar contraseña">
                </div>
            </div>

        </form>
    </div>
@endsection
