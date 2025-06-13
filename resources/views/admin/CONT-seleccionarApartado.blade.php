@extends('admin.panel-control')

@section('CONT-seleccionarApartado')
    <div class="contenedor-previsualizacion-secciones">
        <div class="formulario-posicion">
            <h3>Seleccione la posicion de la sección dentro de la página</h3>
            <form action="{{ route('seleccionarOrden', ['seccion' => $idSeccion]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <select name="orden">
                        @foreach ($secciones as $seccion)
                            <option value="encima {{ $seccion->titulo }}">{{ 'Encima de ' . $seccion->titulo }}</option>
                            <option value="debajo {{ $seccion->titulo }}">{{ 'Debajo de ' . $seccion->titulo }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Finalizar">
                </div>
            </form>
        </div>
        <div class="contenedor-secciones">
            @foreach ($secciones as $seccion)
                @php
                    $imagen = $imagenes['Seccion: ' . $seccion->id . ': ' . $seccion->titulo]['imagenUno'];
                @endphp
                @switch($seccion->seccion->tipo)
                    @case('imagen-derecha')
                        <div class="contenedor-seccion">
                            <div class="div1 titulo-seccion-previa">
                                <h3>{{ $seccion->titulo }}</h3>
                            </div>
                            <div class="div2 parrafo-seccion-previa">
                                <p>{{ $seccion->parrafo }}</p>
                            </div>
                            <div class="div3 imagen-seccion-previa">
                                <div class="" style="background-image: url( {{ asset('storage/' . $imagen->ruta_imagen) }} )">
                                </div>
                            </div>
                        </div>
                    @break

                    @case('dos-imagenes')
                        <?php
                        $imagenUno = $imagenes['Seccion: ' . $seccion->id . ': ' . $seccion->titulo]['imagenUno'];
                        $imagenDos = $imagenes['Seccion: ' . $seccion->id . ': ' . $seccion->titulo]['imagenDos'];
                        ?>
                        <div class="contenedor-seccion contenedor-dos">
                            <div class="div1 titulo-seccion-previa">
                                <h3>{{ $seccion->titulo }}</h3>
                            </div>
                            <div class="div2 imagen-seccion-previa">
                                <div class=""
                                    style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }} )">
                                </div>
                            </div>
                            <div class="div3 imagen-seccion-previa">
                                <div class=""
                                    style="background-image: url( {{ asset('storage/' . $imagenDos->ruta_imagen) }} )">
                                </div>
                            </div>
                            <div class="div4 parrafo-seccion-previa">
                                <p>{{ $seccion->parrafo }}</p>
                            </div>

                        </div>
                    @break

                    @case('imagen-izquierda')
                        @yield('CONT-estructura-tres')
                    @break

                    @case('sin-imagen')
                        @yield('CONT-estructura-cuatro')
                    @break

                    @default
                @endswitch
            @endforeach
        </div>
    </div>
@endsection
