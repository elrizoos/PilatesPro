@extends('admin/panel-control')

@section('CONT-opcion-dos')
    <div class=" h-100 d-flex justify-content-center align-items-center">
        <form class=" container-fluid w-75 h-75"
            action="{{ route('crearContenidoGestionFormulario', ['tipoSeccion' => '2', 'pagina' => $idPagina]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="contenedor-grid-seccion-dos w-100 h-100">
                <div class="titulo  d-flex justify-content-center align-items-center fs-3">
                    <input class="estilo-formulario text-center" type="text" name="titulo" placeholder="Escribe el titulo">
                    @error('titulo')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="imagen-uno p-2">
                    <div id="imagen-upload-imagenUno" class=" w-100 h-100">
                        <div id="fondo-gris-imagen1" class="w-100 h-100 bg-light-subtle d-flex justify-content-center align-items-center fs-3">
                            <p>Haz click para añadir la imagen</p>
                        </div>
                        <input hidden name="imagenUno" id="input-imagenUno" type="file"></input>
                        @error('imagenUno')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="imagen-dos p-2">
                    <div id="imagen-upload-imagenDos" class=" w-100 h-100">
                        <div id="fondo-gris-imagen2" class="w-100 h-100 bg-light-subtle d-flex justify-content-center align-items-center fs-3">
                            <p>Haz click para añadir la imagen</p>
                        </div>
                        <input hidden name="imagenDos" id="input-imagenDos" type="file"></input>
                        @error('imagenDos')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="parrafo d-flex justify-content-center align-items-center">
                    <textarea class="estilo-formulario fs-4  h-75 text-center d-flex border border-1 border-secondary" name="parrafo"
                        placeholder="Escribe el parrafo"> {{ isset($seccion) ? $seccion->parrafo : 'Escriba el parrafo' }}</textarea>
                </div>
            </div>
            <div class="col d-flex-justify-content-center align-items-center">
                <input class="estilo-formulario estilo-formulario-enviar" type="submit" value="{{ isset($seccion) ? 'Editar Seccion' : 'Guardar Seccion' }}">
            </div>
        </form>
    </div>

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
                        $('#imagen-upload-imagenUno').css('background-image', 'url(' + e.target.result +
                            ')').css(
                            'background-size', 'contain').css('background-repeat', 'no-repeat').css('background-position', 'center');
                        $('#fondo-gris-imagen1').addClass('d-none');
                    };

                    reader.readAsDataURL(file);
                }
            });
            $('#input-imagenDos').on('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imagen-upload-imagenDos').css('background-image', 'url(' + e.target.result +
                            ')').css(
                            'background-size', 'contain').css('background-repeat', 'no-repeat').css('background-position', 'center');
                        $('#fondo-gris-imagen2').addClass('d-none');

                    };

                    reader.readAsDataURL(file);
                }
            });

            $('.borrarImagen').on('click', function() {

            });
        });
    </script>
@endsection
