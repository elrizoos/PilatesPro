@extends('admin/panel-control')

@section('CONT-opcion-uno')
    @isset($seccion)
        @if ($seccion->idSeccion === 1 && $seccion->idImagenUno !== null)
            <form id="delete-form" action="{{ route('imagenSeccion.destroy', ['imagenSeccion' => $seccion->imagenUno->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Eliminar Imagen">
                </button>
            </form>
        @endif
    @endisset
    <form
        action="{{ isset($seccion) ? route('seccion.update', ['seccion' => $seccion->id]) : route('crearContenidoGestionFormulario', ['tipoSeccion' => '1', 'pagina' => $idPagina]) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @isset($seccion)
            @method('PUT')
        @endisset
        <div>
            <div>
                <input name="titulo" type="text" placeholder="Escribe el título"
                    value="{{ isset($seccion) ? $seccion->titulo : '' }}"></input>
                @error('titulo')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                @isset($seccion)
                    @if ($seccion->idSeccion === 1  && $seccion->idImagenUno !== null)
                        <img src="{{ asset('storage/' . $seccion->imagenUno->ruta_imagen) }}"
                            alt="">
                    @endif
                @endisset
                <div id="imagen-upload">
                    <p>Haz click para añadir la imagen</p>
                    <input name="foto" id="input-upload" type="file"
                        ></input>
                    @error('foto')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div>
                <textarea name="parrafo" placeholder="Escribe el parrafo"> {{ isset($seccion) ? $seccion->parrafo : '' }}</textarea>
                @error('parrafo')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <input type="submit" value="{{ isset($seccion) ? 'Editar Seccion' : 'aGuardar Seccion' }}">
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

            $('.borrarImagen').on('click', function() {

            });
        });
    </script>
@endsection
