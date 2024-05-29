@extends('admin.panel-control')

@section('CONT-eliminarEditar')
    <div class=" w-75 h-75 d-flex justify-content-center align-items-center container-fluid" id="contenedorSeleccion">
        <input id="data-input" type="hidden" name="_dataUrl"
            data-eliminarPagina="{{ route('pagina.destroy', ['pagina' => 'INDEFINIDO']) }}"
            data-eliminarSeccion="{{ route('seccion.destroy', ['seccion' => 'INDEFINIDO']) }}"
            data-editarPagina="{{ route('pagina.edit', ['pagina' => 'INDEFINIDO']) }}"
            data-editarSeccion="{{ route('seccion.edit', ['seccion' => 'INDEFINIDO']) }}">
        <div class="row w-100 h-100 text-light d-flex gap-3">
            <div
                class="col  d-flex flex-column justify-content-center align-items-center fs-3 position-relative gap-3 border border-2 border-secondary-subtle rounded-5">
                <h2 class="fs-1 position-absolute top-0 mt-4 texto-color-secundario">PAGINAS</h2>
                <div class="opcion d-flex justify-content-center align-items-center gap-2 text-warning" id="eliminarPagina">
                    <svg class="icon icono-normal">
                        <use xlink:href="#eliminar" />
                    </svg>
                    <h3>ELIMINAR</h3>
                </div>
                <div class="opcion d-flex justify-content-center align-items-center gap-2 text-danger" id="editarPagina">
                    <svg class="icon icono-normal">
                        <use xlink:href="#editar" />
                    </svg>
                    <h3>EDITAR</h3>
                </div>
            </div>
            <div
                class="col d-flex flex-column justify-content-center align-items-center fs-3 position-relative gap-3 border border-2 border-secondary-subtle rounded-5">
                <h2 class="fs-1 position-absolute top-0 mt-4 texto-color-secundario">SECCIONES</h2>
                <div class="opcion d-flex justify-content-center align-items-center gap-2 text-warning"
                    id="eliminarSeccion">
                    <svg class="icon icono-normal">
                        <use xlink:href="#eliminar" />
                    </svg>
                    <h3>ELIMINAR</h3>
                </div>
                <div class="opcion d-flex justify-content-center align-items-center gap-2 text-danger" id="editarSeccion">
                    <svg class="icon icono-normal">
                        <use xlink:href="#editar" />
                    </svg>
                    <h3>EDITAR</h3>
                </div>
            </div>
        </div>

    </div>

    <div class="contenedor-paginas d-none">
        <form class="formulario" class="formulario formulario-pagina" action="" method="POST">
            @csrf
            @method('')

            <select class="estilo-formulario estilo-formulario-select w-100" name="paginaEscogida" id="paginaEscogida">
                @foreach ($paginas as $pagina)
                    <option value="{{ $pagina->id }}">{{ $pagina->titulo }}</option>
                @endforeach
            </select>
            <input class="estilo-formulario estilo-formulario-enviar w-100" id="boton-pagina" type="submit" value="">
        </form>
    </div>
    <div class="contenedor-secciones d-none">
        <form class="formulario" class="formulario formulario-seccion" action="" method="POST">
            @csrf
            @method('')

            <select class="estilo-formulario estilo-formulario-select w-100" name="seccionEscogida" id="seccionEscogida">
                @foreach ($secciones as $seccion)
                    <option value="{{ $seccion->id }}">
                        {{ 'Pagina: ' . $seccion->pagina->titulo . ' Seccion: ' . $seccion->titulo }}</option>
                @endforeach
            </select>
            <input class="estilo-formulario estilo-formulario-enviar w-100" id="boton-seccion" type="submit"
                value="">
        </form>
    </div>

    <script></script>
@endsection
