@extends('admin.panel-control')

@section('CONT-eliminarEditar')
    <div id="contenedorSeleccion" class="contenedor-contenido seleccion">
        <input id="data-input" type="hidden" name="_dataUrl" data-eliminarPagina="{{ route('pagina.destroy', ['pagina' => 'INDEFINIDO']) }}"
            data-eliminarSeccion="{{ route('seccion.destroy', ['seccion' => 'INDEFINIDO']) }}"
            data-editarPagina="{{ route('pagina.edit', ['pagina' => 'INDEFINIDO']) }}"
            data-editarSeccion="{{ route('seccion.edit', ['seccion' => 'INDEFINIDO']) }}">
        <div class="contenedor-opciones-pagina">
            <h2>PAGINAS</h2>
            <div id="eliminarPagina" class="opcion opcion-eliminar">
                <span></span>
                <h3>ELIMINAR</h3>
            </div>
            <div id="editarPagina" class="opcion opcion-editar">
                <span></span>
                <h3>EDITAR</h3>
            </div>
        </div>
        <div class="contenedor-opciones-seccion">
            <h2>SECCIONES</h2>
            <div id="eliminarSeccion" class="opcion opcion-eliminar">
                <span></span>
                <h3>ELIMINAR</h3>
            </div>
            <div id="editarSeccion" class="opcion opcion-editar">
                <span></span>
                <h3>EDITAR</h3>
            </div>
        </div>

        <div class="contenedor-paginas">
            <form class="formulario-contenedor formulario-pagina" action="" method="POST">
                @csrf
                @method('')

                <select name="paginaEscogida" id="paginaEscogida">
                    @foreach ($paginas as $pagina)
                        <option value="{{ $pagina->id }}">{{ $pagina->titulo }}</option>
                    @endforeach
                </select>
                <input id="boton-pagina" type="submit" value="">
            </form>
        </div>
        <div class="contenedor-secciones">
            <form class="formulario-contenedor formulario-seccion " action="" method="POST">
                @csrf
                @method('')

                <select name="seccionEscogida" id="seccionEscogida">
                    @foreach ($secciones as $seccion)
                        <option value="{{ $seccion->id }}">
                            {{ 'Pagina: ' . $seccion->pagina->titulo . ' Seccion: ' . $seccion->titulo }}</option>
                    @endforeach
                </select>
                <input id="boton-seccion" type="submit" value="">
            </form>
        </div>
    </div>
@endsection
