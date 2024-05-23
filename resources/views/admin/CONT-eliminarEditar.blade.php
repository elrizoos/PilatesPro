@extends('admin.panel-control')

@section('CONT-eliminarEditar')
    <div id="contenedorSeleccion">
        <input id="data-input" type="hidden" name="_dataUrl" data-eliminarPagina="{{ route('pagina.destroy', ['pagina' => 'INDEFINIDO']) }}"
            data-eliminarSeccion="{{ route('seccion.destroy', ['seccion' => 'INDEFINIDO']) }}"
            data-editarPagina="{{ route('pagina.edit', ['pagina' => 'INDEFINIDO']) }}"
            data-editarSeccion="{{ route('seccion.edit', ['seccion' => 'INDEFINIDO']) }}">
        <div>
            <h2>PAGINAS</h2>
            <div id="eliminarPagina">
                <span></span>
                <h3>ELIMINAR</h3>
            </div>
            <div id="editarPagina">
                <span></span>
                <h3>EDITAR</h3>
            </div>
        </div>
        <div>
            <h2>SECCIONES</h2>
            <div id="eliminarSeccion">
                <span></span>
                <h3>ELIMINAR</h3>
            </div>
            <div id="editarSeccion">
                <span></span>
                <h3>EDITAR</h3>
            </div>
        </div>

        <div>
            <form action="" method="POST">
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
        <div>
            <form action="" method="POST">
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
