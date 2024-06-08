@extends('layouts.app')

@section('content')
    <div class="vw-100 vh-100 d-flex flex-column justify-content-center align-items-center">
        <div style="min-height: 40%"
            class="w-50 border border-warning-subtle bg-color-fondo d-flex flex-column justify-content-evenly align-items-center">
            <div class="w-50 h-20">
                <div class="imagen-logo w-100 h-100" data-url="{{ route('inicio') }}"></div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger w-75">
                    <ul class="fs-5 mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="w-100 text-center">
                <h2>{{ __('Reset Password') }}</h2>
            </div>
            <form class="formulario d-flex flex-column fs-5 w-75" method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group mb-3">
                    <input class="form-control estilo-formulario" id="email" type="email" name="email"
                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                    @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <hr class="linea-transition-rigth border border-warning-subtle w-25 border-1">

                <div class="form-group mb-3">
                    <input class="form-control estilo-formulario" id="password" type="password" name="password" required
                        autocomplete="new-password" placeholder="Contraseña">
                    @error('password')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <hr class="linea-transition-rigth border border-warning-subtle w-25 border-1">

                <div class="form-group mb-3">
                    <input class="form-control estilo-formulario" id="password-confirm" type="password"
                        name="password_confirmation" required autocomplete="new-password"
                        placeholder="Confirmar Contraseña">
                </div>
                <hr class="linea-transition-rigth border border-warning-subtle w-25 border-1">

                <div class="form-group text-center">
                    <input class="btn btn-primary estilo-formulario estilo-formulario-enviar text-center" type="submit"
                        value="{{ __('Reset Password') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
