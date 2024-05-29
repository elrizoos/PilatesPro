@extends('usuario.general')
@section('fotoPerfil')
    <form class="formulario-dorado" id="formularioFotoPerfil" action="{{ route('imagen.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="tipo_informacion" value="informacionContacto">
        <input type="hidden" name="usuario" value="{{ Auth::user()->email }}">
        <input hidden type="file" name="fotoPerfil" id="inputFotoPerfil">

        <div class="row  h-75">
            <div class="col d-flex flex-column justify-content-center align-items-center gap-3">
                <div class="row">
                    <div class="col">
                        <label class="text-light fs-3" for="fotoPerfil">Foto de perfil:</label>
                    </div>
                </div>
                <div class="row w-100 h-50">
                    <div class="col d-flex justify-content-center align-items-center">
                        @if (auth()->user()->imagen)
                            <img class="imagen img-fluid w-25 h-auto"
                                src="{{ asset('storage/' . auth()->user()->imagen->ruta_imagen) }}" alt="Imagen de perfil">
                        @else
                            <div class="imagen img-fluid w-100 h-100" id="contenedorImagen">
                                <p class="text-danger-emphasis fs-4">No hay imagen de perfil</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">

                <div class="row h-50">
                    <div class="col">
                        <div id="subirImagen"
                            class="w-100 h-100 fs-2 d-flex gap-3 justify-content-center align-items-center text-light">
                            <svg class="icon icono-normal">
                                <use xlink:href="#subir" />
                            </svg>
                            SUBIR IMAGEN
                        </div>
                    </div>
                </div>
                <div class="row h-50">
                    <div class="col">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input class="estilo-formulario estilo-formulario-enviar" type="submit" value="Guardar cambios">
            </div>
        </div>
    </form>
    @if (Auth()->user()->imagen)
        <form class="formulario w-100 h-100"
            action="{{ route('imagen.destroy', ['imagen' => Auth()->user()->imagen->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="estilo-formulario estilo-formulario-enviar text-danger fs-4" id="borrarFoto" type="submit"
                value="Eliminar Imagen">
        </form>
    @endif
    <script>
        $(document).ready(function() {
            $('#subirImagen').on('click', function() {
                console.log('Div clickeado');
                $('#inputFotoPerfil').click(); // Usamos trigger para asegurarnos que funciona
            });

            $('#inputFotoPerfil').on('change', function(e) {
                console.log('Archivo seleccionado');
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#contenedorImagen').css('background-image', 'url(' + e.target.result + ')')
                            .css(
                                'background-size', 'contain').css('background-repeat', 'no-repeat').css(
                                'background-position', 'center');
                        $('#contenedorImagen p').addClass('d-none');
                    };

                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
