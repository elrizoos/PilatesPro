@extends('admin.panel-control')

@section('CONT-eliminarEditar')
    <div class=" w-75 h-75 d-flex justify-content-center align-items-center container-fluid" id="contenedorSeleccion">
        <input id="data-input" type="hidden" name="_dataUrl"
            data-eliminarPagina="{{ route('pagina.destroy', ['pagina' => 'INDEFINIDO']) }}"
            data-eliminarSeccion="{{ route('seccion.destroy', ['seccion' => 'INDEFINIDO']) }}"
            data-editarPagina="{{ route('pagina.edit', ['pagina' => 'INDEFINIDO']) }}"
            data-editarSeccion="{{ route('seccion.edit', ['seccion' => 'INDEFINIDO']) }}">


        <div class="contenedor-editarEliminar">
            <div class="">
                <h2 class="fs-1 top-0 mt-4 texto-color-secundario">PAGINAS</h2>
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
            <div class="">
                <h2 class="fs-1 top-0 mt-4 texto-color-secundario">SECCIONES</h2>
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
    
    <div class="contenedor-paginas aux d-none">
        <form class=""  action="" method="POST">
            @csrf
            @method('')

            <select class="" name="paginaEscogida" id="paginaEscogida">
                @foreach ($paginas as $pagina)
                    <option value="{{ $pagina->id }}">{{ $pagina->titulo }}</option>
                @endforeach
            </select>
            <input class="" id="boton-pagina" type="submit" value="">
        </form>
    </div>
    <div class="contenedor-secciones aux d-none">
        <form action="" method="POST">
            @csrf
            @method('')

            <select class="" name="seccionEscogida" id="seccionEscogida">
                @foreach ($secciones as $seccion)
                    <option value="{{ $seccion->id }}">
                        {{ 'Pagina: ' . $seccion->pagina->titulo . ' Seccion: ' . $seccion->titulo }}</option>
                @endforeach
            </select>
            <input class="" id="boton-seccion" type="submit"
                value="">
        </form>
    </div>

    <script></script>
@endsection
