@extends('usuario.contrasena')
@section('cambiarContrasena')
    <form class=" col d-flex justify-content-center align-items-center flex-column"
        action="{{ route('modificarContrasena', ['usuario' => Auth::user()->id]) }} " method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="tipo_informacion" value="informacionContacto">
        <input type="hidden" name="usuario" value="{{ Auth::user()->email }}">
        <div class="row">
            <div class="col">
                <input class="p-1 estilo-formulario w-100 text-center" type="password" name="password"
                    placeholder="Contraseña nueva">
                @error('password')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">
            </div>
            <div class="col">
                <input class="p-1 estilo-formulario w-100 text-center" type="password" name="password_confirmation"
                    placeholder="Repite Contraseña nueva">
                @error('password_confirmation')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <hr class="linea-transition-weigth border border-warning-subtle  border-1 ">
            </div>

        </div>
        <div>
            <input class="estilo-formulario estilo-formulario-enviar" type="submit" value="Guardar cambios">
        </div>
    </form>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
