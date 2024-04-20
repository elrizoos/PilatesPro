@extends('admin/panel-control')

@section('galeria-inicio')
    <div class="contenedor-galeria">

        <ul class="navegacion">
            <li id="botonPerfil">Imagenes Perfil</li>
            <li id="botonSeccion">Imagenes Seccion</li>
        </ul>
        <div class="galeria">
            <h2 id="tituloImagenesPerfil">Imágenes de Perfil</h2>
            <div id="galeriaPerfil" class="imagenes-galeria">
                @foreach ($imagenesPerfil as $imagen)
                    <div class="imagen-container">
                        <img src="{{ asset('storage/' . $imagen->ruta_imagen) }}" alt="Imagen de perfil">
                    </div>
                @endforeach
            </div>

            <h2 id="tituloImagenesSeccion">Imágenes de Sección</h2>
            <div id="galeriaSeccion" class="imagenes-galeria">
                @foreach ($imagenesSeccion as $imagen)
                    <div class="imagen-container">
                        <img src="{{ asset('storage/' . $imagen->ruta_imagen) }}" alt="Imagen de sección">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Ocultar todas las galerías al inicio, opcionalmente puedes dejar una visible
            $('#galeriaPerfil').addClass('no-active');
            $('#galeriaSeccion').addClass('no-active');

            // Manejar clic en el botón de Imágenes de Perfil
            $('#botonPerfil').click(function() {
                $('#galeriaSeccion').addClass('no-active'); // Ocultar imágenes de sección
                $('#galeriaPerfil').addClass('active'); // Mostrar imágenes de perfil
                $('#galeriaPerfil').removeClass('no-active'); // Mostrar imágenes de perfil
            });

            // Manejar clic en el botón de Imágenes de Sección
            $('#botonSeccion').click(function() {
                $('#galeriaPerfil').addClass('no-active'); // Ocultar imágenes de perfil
                $('#galeriaSeccion').addClass('active'); // Mostrar imágenes de sección
                $('#galeriaSeccion').removeClass('no-active'); // Mostrar imágenes de sección
            });
        });
    </script>
@endsection
