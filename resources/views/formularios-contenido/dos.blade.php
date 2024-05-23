@extends('admin/panel-control')

@section('CONT-opcion-dos')
    <form action="{{ route('crearContenidoGestionFormulario', ['tipoSeccion' => '2', 'pagina' => $idPagina]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <div>
                <input type="text" name="titulo" placeholder="Escribe el titulo">
                @error('titulo')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <div id="imagen-upload-imagenUno">
                    <p>Haz click para añadir la imagen</p>
                    <input name="imagenUno" id="input-imagenUno" type="file"></input>
                    @error('imagenUno')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div>
                <div id="imagen-upload-imagenDos">
                    <p>Haz click para añadir la imagen</p>
                    <input name="imagenDos" id="input-imagenDos" type="file"></input>
                    @error('imagenDos')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div>
                <textarea name="parrafo" placeholder="Escribe el parrafo"> {{ isset($seccion) ? $seccion->parrafo : 'Escriba el parrafo' }}</textarea>
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
