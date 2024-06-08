@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nueva Conversación</h1>
        <form action="{{ route('conversaciones.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_two_id">Seleccionar Usuario</label>
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
