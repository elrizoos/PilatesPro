@extends('admin/panel-control')

@section('CONT-elegirPagina')
    <div>
         <form action="{{ route('seleccionarPagina') }}" method="get">
        <div>
                <div>
                    <select name="paginaElegida" id="paginaElegida">
                        @foreach ($paginas as $pagina)
                            <option value="{{$pagina->id}}">Pagina: {{ $pagina->titulo }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    @error('paginaElegida')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>


            </div>
            <div>
                <div>
                    <input type="submit" value="Elegir esta página">
                </div>
            </div>
    </div>
@endsection
