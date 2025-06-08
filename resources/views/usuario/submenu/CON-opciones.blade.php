@extends('usuario.contrasena')
@section('opciones')

<div class="contenedor-formulario-recuperacion">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    @if (session()->has('formularioPreguntaRespuesta'))
    <h5>Formulario Pregunta y Respuesta</h5>
    <form class="formulario-preguntas-respuestas" id="preguntaRespuestaForm"
        action="{{ route('guardarInformacionPreRes') }}">
        <label for="pregunta">Selecciona una de las siguientes preguntas</label>
        <select name="preguntas" id="preguntas">
            <option value="1">¿Dónde has nacido?</option>
            <option value="2">¿Cúal es tu color favorito?</option>
            <option value="3">¿Cúal es el nombre de tu padre/madre?</option>
            <option value="4">¿Cúal es tu mascota preferida?</option>
        </select>

        <label for="respuesta">Escribe aqui tu respuesta</label>
        <input class="input-respuesta" type="text" name="respuesta">

        <input class="continuar" id="continuarFormulario" type="button" value="Continuar">
        <input hidden type="submit" value="Guardar pregunta y respuesta">
    </form>
    @else
    <h3>Opciones de recuperación de contraseña</h3>
    <p>Seleccione una de las dos opciones siguientes para establecer la forma
        de restablecer su contraseña
    </p>

    <form class="formulario-recuperacion" action="{{ route('metodoRecuperacion.store') }}" method="POST">
        @csrf
        <div class="contenedor-opciones">
            <div>
                <input class="" type="radio" {{ isset(Auth::user()->metodosRecuperacion) ?
                (Auth::user()->metodosRecuperacion->method == 'email' ? 'checked' : '') : '' }}
                name="method" id="email" value="email">
                <label class="" for="email">
                    Recuperar mediante Correo Electrónico
                </label>
            </div>
            <div>
                <input class="" type="radio" {{ isset(Auth::user()->metodosRecuperacion) ?
                (Auth::user()->metodosRecuperacion->method != 'email' ? 'checked' : '') : '' }}
                name="method" id="security_question" value="security_question">
                <label class="" for="security_question">
                    Recuperar mediante Pregunta de Seguridad
                </label>
            </div>
        </div>
        <button type="submit" class="">Guardar Método</button>
    </form>
    @endif
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Es muy importante que recuerde tanto la pregunta como la respuesta para recuperar la cuenta en el
                    futuro. ¿Desea continuar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" id="confirmYes" class="btn btn-primary">Sí</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const continuarBtn = document.getElementById('continuarFormulario');
    const confirmYesBtn = document.getElementById('confirmYes');
    const preguntaRespuestaForm = document.getElementById('preguntaRespuestaForm');

    if (continuarBtn && confirmYesBtn && preguntaRespuestaForm) {
        continuarBtn.addEventListener('click', function () {
            $('#confirmModal').modal('show');
        });

        confirmYesBtn.addEventListener('click', function () {
            $('#confirmModal').modal('hide');
            preguntaRespuestaForm.submit();
        });
    }
</script>
@vite(['resources/js/contenidoInterno.js'])
@endsection