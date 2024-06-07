@extends('usuario.contrasena')
@section('opciones')
    <div class="row">
        <div class="col d-flex justify-content-center align-items-end">
            <h1 class="mb-4">Opciones de Recuperación de Contraseña</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-start align-items-center flex-column">
            @if (isset($formularioPreguntaRespues))
                <h5>Formulario Pregunta y Respuesta</h5>
                <form id="preguntaRespuestaForm" action="">
                    <label for="pregunta">Selecciona una de las siguientes preguntas</label>
                    <select name="preguntas" id="preguntas">
                        <option value="1">¿Dónde has nacido?</option>
                        <option value="2">¿Cúal es tu color favorito?</option>
                        <option value="3">¿Cúal es el nombre de tu padre/madre?</option>
                        <option value="4">¿Cúal es tu mascota preferida?</option>
                    </select>

                    <label for="respuesta">Escribe aqui tu respuesta</label>
                    <input type="text" name="respuesta">

                    <input id="continuarFormulario" type="button" value="Continuar">
                    <input hidden type="submit" value="Guardar pregunta y respuesta">
                </form>
            @else
                <h5 class="fs-4">Selecciona un Método de Recuperación</h5>
                <form action="{{ route('metodoRecuperacion.store') }}" method="POST">
                    @csrf
                    <div>
                        <input class="estilo-formulario" type="radio"
                             name="method"
                            id="email" value="email">
                        <label class="estilo-formulario" for="email">
                            Recuperar mediante Correo Electrónico
                        </label>
                    </div>
                    <div>
                        <input class="estilo-formulario" type="radio"
                            {{ isset(Auth::user()->method) ? Auth::user()->metodosRecuperacion->method == 'email' ? 'checked' : '' : '' }}
                            name="method" id="security_question" value="security_question">
                        <label class="estilo-formulario" for="security_question">
                            Recuperar mediante Pregunta de Seguridad
                        </label>
                    </div>
                    <button type="submit" class="estilo-formulario estilo-formulario-enviar mt-3">Guardar Método</button>
                </form>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Es muy importante que recuerde tanto la pregunta como la respuesta para recuperar la cuenta en el futuro. ¿Desea continuar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" id="confirmYes" class="btn btn-primary">Sí</button>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/contenidoInterno.js'])
@endsection
