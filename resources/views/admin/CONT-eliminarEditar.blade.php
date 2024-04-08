@extends('admin.panel-control')

@section('CONT-eliminarEditar')
    <div id="contenedorSeleccion" class="contenedor-contenido seleccion">
        <input type="hidden" name="dataUrl" data-eliminarPagina="{{route('eliminarPagina', ['pagina' => 'INDEFINIDO'])}}" data-eliminarSeccion="{{route('eliminarSeccion', ['seccion' => 'INDEFINIDO'])}}" data-editarPagina="{{route('editarPagina', ['pagina' => 'INDEFINIDO'])}}" data-editarSeccion="{{route('editarSeccion', ['seccion' => 'INDEFINIDO'])}}" >
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
            <form action="" method="POST">
                @csrf
                @method('')
                <select name="paginaEscogida" id="paginaEscogida">
                    @foreach ($paginas as $pagina)
                        <option value="{{ $pagina->id }}">{{ $pagina->titulo }}</option>
                    @endforeach
                </select>
                <input type="submit" value="">
            </form>
        </div>
        <div class="contenedor-secciones">
            <form action="" method="POST">
                @csrf
                @method('')
                <select name="seccionEscogida" id="seccionEscogida">
                    @foreach ($secciones as $seccion)
                        <option value="{{ $seccion->id }}">
                            {{ 'Pagina: ' . $seccion->pagina->titulo . ' Seccion: ' . $seccion->titulo }}</option>
                    @endforeach
                </select>
                <input type="submit" value="">
            </form>
        </div>
    </div>
@endsection
