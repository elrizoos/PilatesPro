@extends('admin/panel-control')

@section('USER-gestionContrasena-formulario')
    
    <div>
        <form action="{{ route('modificarContrasena', ['usuario' => $usuario->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <div>
                    <input type="password" name="password" placeholder="Contraseña nueva">

                    <input type="password" name="password_confirmation"
                        placeholder="Repite Contraseña nueva">
                </div>
                <div>
                    @error('password')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('password_confirmation')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


            </div>
            <div>
                <div>
                    <input type="submit" value="Cambiar contraseña">
                </div>
            </div>

        </form>
    </div>
@endsection
