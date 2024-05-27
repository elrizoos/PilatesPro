@extends('admin/panel-control')

@section('CONT-elegirPagina')
    <div class="h-100 d-flex flex-column justify-content-center align-items-center">
        <form class=" h-75 w-75 container-fluid d-flex flex-column justify-content-center align-items-center" action="{{ route('seleccionarPagina') }}" method="get">
            <div class="row">
                <div class="col">
                    <select class="estilo-formulario estilo-formulario-select" name="paginaElegida" id="paginaElegida">
                        @foreach ($paginas as $pagina)
                            <option value="{{ $pagina->id }}">Pagina: {{ $pagina->titulo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    @error('paginaElegida')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>


            </div>
            <div class="row">
                <div class="col">
                    <input class="estilo-formulario estilo-formulario-enviar" type="submit" value="Elegir esta página">
                </div>
            </div>
        </form>
    </div>


    
@endsection
