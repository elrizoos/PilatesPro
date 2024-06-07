@extends('layouts.app')

@section('content')
    <div class="vw-100 vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="container mt-5">
            <h1 class="mb-4">Pregunta de Seguridad</h1>
            <form method="POST" action="{{ route('password.verificarPregunta') }}">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <div class="form-group">
                    <label for="security_question">Pregunta de Seguridad</label>
                    <input type="text" class="form-control" id="security_question" name="security_question"
                        value="{{ $user->security_question }}" readonly>
                </div>
                <div class="form-group">
                    <label for="security_answer">Respuesta</label>
                    <input type="text" class="form-control" id="security_answer" name="security_answer" required>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
@endsection
