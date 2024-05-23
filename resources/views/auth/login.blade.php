@extends('layouts.app')

@section('content')
<div>
    <div>
        <div>
            <div data-url="{{ route('inicio') }}"></div>
        </div>
        @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        <div>
            <form action="{{route('login')}}" method="post">
                @csrf
                <input type="email" name="email" id="email" placeholder="Email">
                <hr>
                <input type="password" name="password" id="password" placeholder="Contraseña">
                <hr>
                <input type="submit" value="Entrar">
            </form>
        </div>
    </div>
</div>
@endsection
