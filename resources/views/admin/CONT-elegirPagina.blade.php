@extends('admin/panel-control')

@section('CONT-elegirPagina')
    <div class="contenedor-contenido">
         <form action="{{ route('seleccionarPagina') }}" method="get">
        <div class="grupo-formulario">
                <div class="grupo-input">
                    <select name="paginaElegida" id="paginaElegida">
                        @foreach ($paginas as $pagina)
                            <option value="{{$pagina->id}}">Pagina: {{ $pagina->titulo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grupo-error">
                    @error('paginaElegida')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>


            </div>
            <div class="grupo-formulario">
                <div class="grupo-input">
                    <input type="submit" value="Elegir esta página">
                </div>
            </div>
    </div>
@endsection
