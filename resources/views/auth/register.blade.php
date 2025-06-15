@extends('layouts.app')

@section('content')
    <div class="contenido contenido-registro">
        <div class="caja-formulario">
            <div class="caja-logo">
                <div id="imagen-logo" class="imagen-logo w-100 h-100" data-url="{{ route('inicio') }}"></div>
            </div>
            <div class="caja-campos">
                <form class="formulario-registro" action="{{ route('registroUsuario') }}" method="post">
                    @csrf


                    <div class="row">
                        <input type="hidden" name="producto" value="{{ isset($producto) ? $producto : '' }}">
                        <div class="form-group">
                            <div class="label-error">
                                <label for="nombre">Nombre: </label>
                                @error('name')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="text" name="name" id="nombre" />
                        </div>
                        <div class="form-group">
                            <div class="label-error">
                                <label for="apellidos">Apellidos:</label>
                                @error('apellidos')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="text" name="apellidos" id="apellidos" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="label-error">
                                <label for="dni">DNI:</label>
                                @error('dni')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <input pattern="^[0-9]{8}[A-Z]$" maxlength="9"
                                title="Debe contener 8 números seguidos de una letra mayúscula (ej: 12345678Z)" required
                                type="text" name="dni" id="dni">

                        </div>
                        <div class="form-group">
                            <div class="label-error">
                                <label for="fecha">Fecha de Nacimiento:</label>
                                @error('fecha_nacimiento')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="label-error">
                                <label for="direccion">Dirección:</label>
                                @error('direccion')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="text" name="direccion" id="direccion" />
                        </div>
                        <div class="form-group">
                            <div class="label-error">
                                <label for="telefono">Teléfono:</label>
                                @error('telefono')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="text" name="telefono" id="telefono" pattern="^[0-9]{9}$" maxlength="9"
                                title="Debe ser un numero de telefono con formato valido" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="label-error">
                                <label for="email">Email:</label>
                                @error('email')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="email" name="email" id="email" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="label-error">
                                <label for="password">Contraseña:</label>
                                @error('password')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="password" name="password" id="password" />
                        </div>
                        <div class="form-group">
                            <div class="label-error">
                                <label for="repetir">Repite Contraseña:</label>
                                @error('password_confirmation')
                                    <span role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="password" name="password_confirmation" id="repetir" />
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn-registrar">Registrar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
