@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-color-fondo vh-100">
        <h1 class="fs-2">Conversaciones</h1>
        <a href="{{ route('conversaciones.create') }}" class="btn btn-primary estilo-formulario border-dorado">Nueva
            Conversación</a>
        <ul class="fs-5 list-group mt-3">
            @foreach ($conversaciones as $conversacion)
                <li class="list-group-item bg-color-oscuro fs-4">
                    <a href="{{ route('conversaciones.show', $conversacion) }}">
                        Conversación con
                        {{ $conversacion->userOne->id == auth()->id() ? $conversacion->userTwo->nombre : $conversacion->userOne->nombre }}
                    </a>

                    @foreach ($conversacionesSinLeer['conversaciones'] as $conSin)
                        @if ($conSin['id'] == $conversacion->id)
                            @php
                                $mensajesSinLeer = $conSin['sin_leer'];
                            @endphp
                            @if ($mensajesSinLeer > 0)
                                <span>{{ $mensajesSinLeer }} mensajes nuevos</span>
                            @endif
                        @endif
                    @endforeach
                </li>
            @endforeach
        </ul>
    </div>
@endsection
