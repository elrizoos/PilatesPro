@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-color-oscuro vh-100 overflow-auto pb-5">
        <h1 class="fs-2">Conversación con
            {{ $conversacione->userOne->id == auth()->id() ? $conversacione->userTwo->nombre : $conversacione->userOne->nombre }}
        </h1>
        <div class="d-flex flex-column justify-content-end h-100">
            <ul class="fs-5 list-group bg-color-fondo mt-3 mb-3 w-100 d-flex flex-column  position-relative justify-content-end mb-5 bottom-0">
            @foreach ($conversacione->messages as $message)
                <li class="list-group-item bg-color-fondo texto-color-gris">
                    <strong class="{{ $conversacione->userOne->id == auth()->id() ? 'texto-color-resalte' : 'texto-color-secundario'  }}">{{ $message->user->nombre }}:</strong> {{ $message->body }}
                </li>
            @endforeach
        </ul>
        <form class="position-relative w-100 bottom-0 mb-3" action="{{ route('messages.store', $conversacione) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="body" class="form-control" rows="3" placeholder="Escribe tu mensaje..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        </div>
    </div>
@endsection
