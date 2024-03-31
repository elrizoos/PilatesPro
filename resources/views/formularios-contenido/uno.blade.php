@extends('panel-control')

@section('CONT-opcion-uno')
    <form class="formulario-creacion" action="{{ route('crearContenidoGestionFormulario')}}" method="POST">
        @csrf
        <div class="seccion seccion-nueva seccion-uno">
            <div class="titulo">
                <input name="titulo" type="text" class="titulo-seccion" placeholder="Escribe el título"></input>
            </div>
            <div class="imagen">
                <div id="imagen-upload" class="imagen-marco">
                    <p>Haz click para añadir la imagen</p>
                    <input name="foto" id="input-upload" type="file" class="imagen-seccion"></input>
                </div>
            </div>
            <div class="parrafo">
                <textarea name="parrafo" class="parrafo-seccion" placeholder="Escribe el parrafo"></textarea>
            </div>
        </div>
        <input type="submit" value="Guardar seccion">
    </form>

    <script>
        $(document).ready(function() {
            $('#imagen-upload').on('click', function() {
                document.getElementById('input-upload').click(); // Cambiamos .trigger por .click() nativo
            });

            $('#input-upload').on('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imagen-upload').css('background-image', 'url(' + e.target.result + ')').css(
                            'background-size', 'cover');
                    };

                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
