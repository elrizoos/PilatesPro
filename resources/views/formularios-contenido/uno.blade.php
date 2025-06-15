@extends('admin/panel-control')

@section('CONT-opcion-uno')

<div class="container-fluid w-100 h-100 d-flex flex-column justify-content-center align-items-center">
    <div class="row">
        <div class="col">
            @isset($seccion)
            @if ($seccion->idSeccion === 1 && $seccion->idImagenUno !== null)
            <form class="formulario p-1  w-75 h-75" id="delete-form"
                action="{{ route('imagenSeccion.destroy', ['imagenSeccion' => $seccion->imagenUno->id]) }}"
                method="POST">
                @csrf
                @method('DELETE')
                <input class="estilo-formulario" type="submit" value="Eliminar Imagen">
                </button>
            </form>
            @endif

            @if ($seccion->orden !== 1 || $numeroSecciones !== 1)
            <form class="formulario"
                action="{{ route('seleccionApartado', ['pagina' => $seccion->pagina->slug, 'seccion' => $seccion->id]) }}">
                <input class="estilo-formulario" type="submit" value="Cambiar Orden">
            </form>
            @endif
            @endisset
        </div>
    </div>
    <form class="formulario-seccion" class="  w-75 h-75"
        action="{{ isset($seccion) ? route('seccion.update', ['seccion' => $seccion->id]) : route('crearContenidoGestionFormulario', ['tipoSeccion' => '1', 'pagina' => $idPagina]) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @isset($seccion)
        @method('PUT')
        @endisset
        <h3>Previsualización del contenido de sección</h3>
        <div class="contenedor-seccion">
            <div class="div1">
                <input class="titulo-seccion" name="titulo" type="text" placeholder="Escribe el título"
                    value="{{ isset($seccion) ? $seccion->titulo : '' }}"></input>
                @error('titulo')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="div2">
                <textarea class="parrafo-seccion" name="parrafo"
                    placeholder="Escribe el parrafo"> {{ isset($seccion) ? $seccion->parrafo : '' }}</textarea>
                @error('parrafo')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="div3">
                <div id="imagen-upload-imagenUno" class="imagen-seccion">
                    <div id="fondo-gris-imagen1">
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
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center">
                <input class="estilo-formulario estilo-formulario-enviar" type="submit"
                    value="{{ isset($seccion) ? 'Editar Seccion' : 'Guardar Seccion' }}">
            </div>
        </div>

        <!--
            <div class="row h-25  fs-3 w-100 text-center">
            <div class="col d-flex justify-content-center align-items-center">
                <input class="estilo-formulario text-center text-uppercase" name="titulo" type="text"
                    placeholder="Escribe el título" value="{{ isset($seccion) ? $seccion->titulo : '' }}"></input>
                @error('titulo')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>
        <div class="row h-75">
            <div class="col  d-flex justify-content-center align-items-center">
                <textarea class="fs-5 estilo-formulario fs-4  h-75 text-center d-flex border border-1 border-secondary"
                    name="parrafo"
                    placeholder="Escribe el parrafo"> {{ isset($seccion) ? $seccion->parrafo : '' }}</textarea>
                @error('parrafo')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="imagen-uno p-2">
                <div id="imagen-upload-imagenUno" class=" w-100 h-100">
                    <div id="fondo-gris-imagen1"
                        class="w-100 h-100 bg-light-subtle d-flex justify-content-center align-items-center fs-3">
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
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center">
                <input class="estilo-formulario estilo-formulario-enviar" type="submit"
                    value="{{ isset($seccion) ? 'Editar Seccion' : 'Guardar Seccion' }}">
            </div>
        </div>
        -->
    </form>
</div>



<script>
    $(document).ready(function () {
        $('#imagen-upload-imagenUno').on('click', function () {
            document.getElementById('input-imagenUno').click(); // Cambiamos .trigger por .click() nativo
        });

        $('#input-imagenUno').on('change', function (e) {
            var file = e.target.files[0];
            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    console.log(e.target.result);

                    $('#imagen-upload-imagenUno').css('background-image', 'url(' + e.target.result +
                        ')').css(
                            'background-size', 'contain').css('background-repeat', 'no-repeat').css(
                                'background-position', 'center');
                    $('#fondo-gris-imagen1').addClass('d-none');
                };

                reader.readAsDataURL(file);
            }
        });

        $('.borrarImagen').on('click', function () {

        });
    });
</script>*/
@endsection