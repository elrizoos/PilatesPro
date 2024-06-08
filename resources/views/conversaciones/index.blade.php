@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-color-fondo vh-100">
        <h1>Conversaciones</h1>
        <a href="{{ route('conversaciones.create') }}" class="btn btn-primary">Nueva Conversación</a>
        <ul class="list-group mt-3">
            @foreach ($conversaciones as $conversacion)
                <li class="list-group-item">
                    <a href="{{ route('conversaciones.show', $conversacion) }}">
                        Conversación con
                        {{ $conversacion->userOne->id == auth()->id() ? $conversacion->userTwo->nombre : $conversacion->userOne->nombre }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
