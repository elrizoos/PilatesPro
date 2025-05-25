@extends('layouts.app')

@section('content')
    <div class="container bg-color-oscuro vh-100 ">
        <h1 class="fs-2 p-2">Nueva Conversación</h1>
        <form action="{{ route('conversaciones.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="fs-3 p-2" for="user_two_id">Seleccionar Usuario</label>
                <select name="user_two_id" id="user_two_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Conversación</button>
        </form>
    </div>
@endsection
