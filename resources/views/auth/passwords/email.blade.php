@extends('layouts.app')

@section('content')
   <div class="vw-100 vh-100 d-flex flex-column justify-content-center align-items-center">
        <div style="min-height: 50%"
            class="w-50 border border-warning-subtle bg-color-fondo d-flex flex-column justify-content-evenly align-items-center">
            <div class="w-50 h-25">
                <div class="imagen-logo w-100 h-100" data-url="{{ route('inicio') }}"></div>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="w-100 text-center">
                <h2 class="fs-5">{{ __('Restaurar contraseña') }}</h2>
            </div>
            <form class="formulario d-flex flex-column fs-5 w-75" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group mb-3">
                    <input class=" estilo-formulario fs-5" id="email" type="email" name="email" value="{{ old('email') }}"
                        required autocomplete="email" autofocus placeholder="Email">
                    @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <hr class="linea-transition-rigth border border-warning-subtle w-25 border-1">
                <div class="form-group text-center">
                    <button type="submit" class="btn fs-5 btn-primary estilo-formulario estilo-formulario-enviar text-center">
                        {{ __('Enviar link de recuperacion') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
