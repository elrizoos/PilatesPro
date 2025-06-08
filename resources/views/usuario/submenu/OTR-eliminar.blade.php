@extends('usuario.otros')
@section('eliminar')
<div class="contenedor-eliminar" id="contenedor-eliminar">
    <h3>Eliminar Cuenta</h3>
    <p>Al eliminar tu cuenta, perderás acceso a todos tus datos y esta acción no se puede deshacer. ¿Estás seguro de que
        deseas continuar?</p>
    <form id="formularioBorrar" action="{{ route('eliminarCuenta', ['usuario' => auth()->user()->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="button" onclick="abrirModal()" class="btn btn-danger" value="Borrar Cuenta">
        <button hidden type="submit" class="btn btn-danger">Eliminar Cuenta</button>
    </form>
</div>
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Eliminar cuenta</h5>
                    <button onclick="ocultarModal()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Es muy importante que estes seguro de realizar esta operacion y de que seas consciente que cuando confirmes no habrá vuelta atrás ¿Estás seguro?
                </div>
                <div class="modal-footer">
                    <button onclick="ocultarModal()" type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button onclick="eliminarCuenta()" type="button" id="confirmYes" class="btn btn-primary">Sí</button>
                </div>
            </div>
        </div>
    </div>
@vite(['resources/js/contenidoInterno.js'])
@endsection

<script>

    function abrirModal() {
        form = document.getElementById('formularioBorrar');
        modal = $('#confirmModal');
        close = $('.close');
        console.log(form, modal, close);

        modal.modal('show');
    }
    function ocultarModal(){
        $('#confirmModal').modal('hide');
    }
    function eliminarCuenta(){
        $('#formularioBorrar').submit();
    }
</script>