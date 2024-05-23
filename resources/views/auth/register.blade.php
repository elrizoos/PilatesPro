@extends('layouts.app')

@section('content')
    <div>
        <div>
            <div>
                <div data-url="{{ route('inicio') }}"></div>
            </div>
            <div>
                @if (session('success'))
                    <div>
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div>
                        <div>
                            <input type="text" name="name" id="name" placeholder="Nombre">
                            <hr>
                            @error('name')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
                            <hr>
                            @error('apellidos')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <input type="password" name="password" id="password" placeholder="Contraseña">
                            <hr>
                            @error('password')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="Confirmar Contraseña">
                            <hr>
                            @error('password_confirmed')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <input type="text" name="dni" id="dni" placeholder="DNI">
                            <hr>
                            @error('dni')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div>
                            <input type="tel" name="telefono" id="telefono" placeholder="Telefono">
                            <hr>
                            @error('telefono')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <input type="email" name="email" id="email" placeholder="Email">
                            <hr>
                            @error('email')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <inputtype="date" name="fecha_nacimiento" id="fecha_nacimiento">
                            <hr>
                            @error('fecha_nacimiento')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <input type="text" name="direccion" id="direccion" placeholder="Direccion">
                            <hr>
                            @error('direccion')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <input type="submit" value="Entrar">
                </form>
            </div>
        </div>
    </div>
@endsection
