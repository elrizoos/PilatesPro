@extends('admin/panel-control')

@section('CONT-opcion-uno')
    @isset($seccion)
        @if ($seccion->idSeccion === 1 && $seccion->idImagenUno !== null)
            <form id="delete-form" action="{{ route('imagenSeccion.destroy', ['imagenSeccion' => $seccion->imagenUno->id]) }}"
                method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Eliminar Imagen">
                </button>
            </form>
        @endif

        @if ($seccion->orden !== 1 || $numeroSecciones !== 1)
            <form action="{{ route('seleccionApartado', ['pagina' => $seccion->pagina->slug, 'seccion' => $seccion->id]) }}">
                <input type="submit" value="Cambiar Orden">
            </form>
        @endif
    @endisset
    <form class="formulario-creacion"
        action="{{ isset($seccion) ? route('seccion.update', ['seccion' => $seccion->id]) : route('crearContenidoGestionFormulario', ['tipoSeccion' => '1', 'pagina' => $idPagina]) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @isset($seccion)
            @method('PUT')
        @endisset
        <div class="seccion seccion-nueva seccion-uno">
            <div class="titulo">
                <input name="titulo" type="text" class="titulo-seccion" placeholder="Escribe el título"
                    value="{{ isset($seccion) ? $seccion->titulo : '' }}"></input>
                @error('titulo')
                    <span class="invalid-feedback active-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="imagen">
                @isset($seccion)
                    @if ($seccion->idSeccion === 1 && $seccion->idImagenUno !== null)
                        <img class="imagen-seccion-editable" src="{{ asset('storage/' . $seccion->imagenUno->ruta_imagen) }}"
                            alt="">
                    @endif
                @endisset
                <div id="imagen-upload" class="imagen-marco">
                    <p>Haz click para añadir la imagen</p>
                    <input name="imagenUno" id="input-upload" type="file" class="imagen-seccion"></input>
                    @error('imagenUno')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="parrafo">
                <textarea name="parrafo" class="parrafo-seccion" placeholder="Escribe el parrafo"> {{ isset($seccion) ? $seccion->parrafo : '' }}</textarea>
                @error('parrafo')
                    <span class="invalid-feedback active-block" role="alert">
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
