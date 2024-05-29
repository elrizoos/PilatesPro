@extends('layouts.app')

@section('content')
    <div>
        <div>
            <div>
                <div>
                    <div>{{ __('Reset Password') }}</div>

                    <div>
                        @if (session('status'))
                            <div role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="formulario" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div>
                                <label for="email">{{ __('Email Address') }}</label>

                                <div>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>

                                    @error('email')
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <div>
                                    <button type="submit">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
