@extends('admin/panel-control')

@section('USER-crear')
    @if (session('success'))
        <div class="alert alert-success ventana-emergente">
            <p>{{ session('success') }}</p>
            <span id=cerrarBoton></span>
        </div>
    @endif
    <div class="contenedor-formulario">
        <form class="formulario-usuario-nuevo" action="{{ route('crearUsuarioNuevo') }}" method="POST">
            @csrf

            <div class="grupo-formulario">
                <div class="grupo-input">
                    <input class="estilo-formulario" type="text" name="name" id="nombre" placeholder="Nombre">
                    <input type="text" name="apellidos" id="apellidos" class="estilo-formulario" placeholder="Apellidos">
                </div>
                <div class="grupo-error">
                    @error('name')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('apellidos')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="grupo-formulario">
                <div class="grupo-input">
                    <input type="text" name="dni" id="dni" class="estilo-formulario" placeholder="DNI">
                    <input type="tel" name="telefono" id="telefono" class="estilo-formulario" placeholder="Telefono">
                </div>
                <div class="grupo-error">
                    @error('dni')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('telefono')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="grupo-formulario">
                <div class="grupo-input">
                    <input type="text" name="direccion" id="direccion" class="estilo-formulario" placeholder="Direccion">
                    <input type="email" name="email" id="email" class="estilo-formulario" placeholder="Email">
                </div>
                <div class="grupo-error">
                    @error('direccion')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('email')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="grupo-formulario">
                <div class="grupo-input">
                    <input type="password" name="password" id="contraseña" class="estilo-formulario"
                        placeholder="Contraseña">
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
                </div>
                <div class="grupo-error">
                    @error('password')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('fecha_nacimiento')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="grupo-formulario">
                <select name="tipo_usuario" id="tipo-usuario">
                    <option class="optionvalue" value="Alumno">Alumno</option>
                    <option value="Profesor">Profesor</option>
                </select>
                @error('tipo-usuario')
                    <span class="invalid-feedback active-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="grupo-formulario">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#cerrarBoton').on('click', function() {
                $('.ventana-emergente').addClass('no-active');
            })
        });
    </script>
@endsection
