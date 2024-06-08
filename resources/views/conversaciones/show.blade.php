@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Conversación con
            {{ $conversacione->userOne->id == auth()->id() ? $conversacione->userTwo->nombre : $conversacione->userOne->nombre }}
        </h1>
        <ul class="list-group mt-3 mb-3">
            @foreach ($conversacione->messages as $message)
                <li class="list-group-item">
                    <strong>{{ $message->user->nombre }}:</strong> {{ $message->body }}
                </li>
            @endforeach
        </ul>
        <form action="{{ route('messages.store', $conversacione) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="body" class="form-control" rows="3" placeholder="Escribe tu mensaje..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection
