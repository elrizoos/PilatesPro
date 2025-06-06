@extends('usuario.general')
@section('informacionGeneral')
    <form class="col d-flex justify-content-center align-items-center flex-column "
        action="{{ route('usuario-guardarCambios') }}">
        <input type="hidden" name="tipo_informacion" value="informacionGeneral">
        <input type="hidden" name="usuario" value="{{ Auth::user()->email }}">


        <div class="formulario-infoUsuario">
            <div class="row">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input class="" type="text" name="nombre" id="nombre" value="{{ Auth::user()->nombre }}"
                        placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input class="" type="text" name="apellidos" id="apellidos"
                        value="{{ Auth::user()->apellidos }}" placeholder="Apellidos">
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="fecha-nacimiento">Fecha nacimiento:</label>
                    <input class="" type="text" name="fecha-nacimiento" id="fecha-nacimiento"
                        value="{{ Auth::user()->fecha_nacimiento }}" disabled>
                </div>
                <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input class="" type="text" name="dni" id="dni" value="{{ Auth::user()->dni }}"
                        disabled placeholder="DNI">
                </div>
            </div>
            <div class="row row-btn-guardar">
                <input class="btn-guardar" type="submit" value="Guardar cambios">
            </div>
        </div>



        <!--
                    <div class="d-none">
                        <div class="row w-50 ">
                            <input class="" type="text" name="nombre" id="nombre"
                                value="{{ Auth::user()->nombre }}" placeholder="Nombre">
                            <input class="" type="text" name="apellidos" id="apellidos"
                                value="{{ Auth::user()->apellidos }}" placeholder="Apellidos">
                        </div>



                        <div class="row w-50 ">
                            <input class="" type="date" name="fecha-nacimiento" id="fecha-nacimiento"
                                value="{{ Auth::user()->fecha_nacimiento }}" disabled>
                            <input class="" type="text" name="dni" id="dni"
                                value="{{ Auth::user()->dni }}" disabled placeholder="DNI">
                        </div>



                        <div class="row w-50 ">
                            <div class="col d-flex justify-content-center align-items-center">
                                <input class="estilo-formulario estilo-formulario-dorado-enviar" type="submit" value="Guardar cambios">
                            </div>
                        </div>
                    </div> -->
    </form>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
