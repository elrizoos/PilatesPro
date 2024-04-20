@extends('admin/panel-control')

@section('CONT-opcion-dos')
    <form action="{{ route('crearContenidoGestionFormulario', ['tipoSeccion' => '2', 'pagina' => $idPagina]) }}" class="formulario-creacion" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="seccion seccion-nueva seccion-dos">
            <div class="titulo">
                <input type="text" name="titulo" class="titulo-seccion" placeholder="Escribe el titulo">
                @error('titulo')
                    <span class="invalid-feedback active-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="imagen imagen-uno">
                <div id="imagen-upload-imagenUno" class="imagen-marco">
                    <p>Haz click para añadir la imagen</p>
                    <input name="imagenUno" id="input-imagenUno" type="file" class="imagen-seccion"></input>
                    @error('imagenUno')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="imagen imagen-dos">
                <div id="imagen-upload-imagenDos" class="imagen-marco">
                    <p>Haz click para añadir la imagen</p>
                    <input name="imagenDos" id="input-imagenDos" type="file" class="imagen-seccion"></input>
                    @error('imagenDos')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="parrafo">
                <textarea name="parrafo" class="parrafo-seccion" placeholder="Escribe el parrafo"> {{ isset($seccion) ? $seccion->parrafo : 'Escriba el parrafo' }}</textarea>
            </div>
        </div>
        <input type="submit" value="{{ isset($seccion) ? 'Editar Seccion' : 'aGuardar Seccion' }}">

    </form>

    <script>
        $(document).ready(function() {
            $('#imagen-upload-imagenUno').on('click', function() {
                document.getElementById('input-imagenUno')
            .click(); // Cambiamos .trigger por .click() nativo
            });
            $('#imagen-upload-imagenDos').on('click', function() {
                document.getElementById('input-imagenDos')
            .click(); // Cambiamos .trigger por .click() nativo
            });
            $('#input-imagenUno').on('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imagen-upload-imagenUno').css('background-image', 'url(' + e.target.result + ')').css(
                            'background-size', 'cover');
                    };

                    reader.readAsDataURL(file);
                }
            });
            $('#input-imagenDos').on('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imagen-upload-imagenDos').css('background-image', 'url(' + e.target.result + ')').css(
                            'background-size', 'cover');
                    };

                    reader.readAsDataURL(file);
                }
            });

            $('.borrarImagen').on('click', function() {

            });
        });
    </script>
@endsection
