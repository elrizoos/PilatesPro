@extends('layouts.app')

@section('content')
    @if (session('registro-exitoso'))
        <div class="alert alert-success">
            {{ session('registro-exitoso') }}
        </div>
    @endif
    <div id="cuadroActualizacion" class="cuadro-actualizaciones">
        <h5>¡La página ha sido actualizada!</h5>
        <h3>Version 0.1.1 (Nuevas funcionalidades)</h3>
       
            @include('actualizacion.version_0_1_1')
        
    </div>
    <div class="seccion slider-seccion">
        <div class="slider slider-uno">
            <div class="contenedorSlider">
                <div class="linea">
                    <div class="iconos">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <h2>Titulo 1</h2>
                <p>parrafo Lorem, ipsum dolor sit amet consectetur</p>
                <input class="boton-slider" type="button" value="hola">
            </div>
        </div>
        <div class="slider slider-dos">
            <div class="contenedorSlider">
                <div class="linea">
                    <div class="iconos">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <h2>Titulo 1</h2>
                <p>parrafo Lorem, ipsum dolor sit amet consectetur</p>
                <input class="boton-slider" type="button" value="hola">
            </div>
        </div>
        <div class="slider slider-tres">
            <div class="contenedorSlider">
                <div class="linea">
                    <div class="iconos">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <h2>Titulo 1</h2>
                <p>parrafo Lorem, ipsum dolor sit amet consectetur</p>
                <input class="boton-slider" type="button" value="hola">
            </div>
        </div>
    </div>
    <div class="seccion claro">
        <div class="marcoGrid">

            <div class="marcoGrid-elemento marcoGrid-uno">
                <div class="linea">
                    <div class="iconos iconos-pequeños iconos-izquierda">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <h1>Estudio Pilates Valladolid</h1>
                <h3>Disfruta de una experiencia única</h3>
            </div>
            <div class="marcoGrid-elemento marcoGrid-cuatro">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque nihil corrupti sit velit modi quia
                    tempore laudantium consectetur soluta quas totam, recusandae suscipit reiciendis numquam explicabo
                    nostrum optio mollitia rerum!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id beatae aliquid
                    incidunt rerum fugit dolore consequuntur voluptatum excepturi eaque! Impedit nesciunt enim id velit
                    optio magni eaque, qui mollitia ad.</p>
            </div>




            <div class="marcoGrid-elemento marcoGrid-tres">
                <div class="imagen-columna img-col-izquierda">

                </div>
            </div>


            <div class="marcoGrid-elemento marcoGrid-dos">
                <div class="imagen-columna img-col-derecha">

                </div>
            </div>


        </div>
    </div>
    <div class="seccion seccion-abajo">
        <div class="texto-titulo">
            <h2>Chus Alvarez Pilates</h2>
            <h3>Cursos por nivel de experiencia</h3>
        </div>
        <div class="contenedor-grid">
            <div class="cuadro-imagen uno">
                <div class="contenedor-imagen">
                    <div class="texto-imagen">
                        <p class="precio">
                            10€ / Clase
                        </p>
                        <p class="nivel-clase">Basico</p>
                    </div>
                    <hr>
                    <div class="submenu-imagen">
                        <div class="nivel-clase">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="mas-detalles">
                            <p>Más detalles </p><span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cuadro-imagen dos">
                <div class="contenedor-imagen">
                    <div class="texto-imagen">
                        <p class="precio">
                            15€ / Clase
                        </p>
                        <p class="nivel-clase">Principiante Avanzado</p>
                    </div>
                    <hr>
                    <div class="submenu-imagen">
                        <div class="nivel-clase">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="mas-detalles">
                            <p>Más detalles </p><span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cuadro-imagen tres">
                <div class="contenedor-imagen">
                    <div class="texto-imagen">
                        <p class="precio">
                            20€ / Clase
                        </p>
                        <p class="nivel-clase">Intermedio</p>
                    </div>
                    <hr>
                    <div class="submenu-imagen">
                        <div class="nivel-clase">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="mas-detalles">
                            <p>Más detalles </p><span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cuadro-imagen cuatro">
                <div class="contenedor-imagen">
                    <div class="texto-imagen">
                        <p class="precio">
                            25€ / Clase
                        </p>
                        <p class="nivel-clase">Intermedio Avanzado</p>
                    </div>
                    <hr>
                    <div class="submenu-imagen">
                        <div class="nivel-clase">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="mas-detalles">
                            <p>Más detalles </p><span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cuadro-imagen cinco">
                <div class="contenedor-imagen">
                    <div class="texto-imagen">
                        <p class="precio">
                            30€ / Clase
                        </p>
                        <p class="nivel-clase">Avanzado</p>
                    </div>
                    <hr>
                    <div class="submenu-imagen">
                        <div class="nivel-clase">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="mas-detalles">
                            <p>Más detalles </p><span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="seccion transparente fondo">
        <div class="marco-video">
            <video id="reproductor-video" class="reproductor-video" controls>
                <source src="{{ asset('videos/video-presentacion.mp4') }}" type="video/mp4">
                Tu navegador no soporta el elemento de video HTML5.
            </video>
            <span id="botonCerrar"></span>
            <div class="contenido-video">
                <div class="linea-iconos">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <h2>Chus Alvarez Pilates</h3>
                    <h3>Video de promoción</h4>
                        <span id="botonPlay" class="icono-play"></span>
            </div>
        </div>
    </div>
    <div class="seccion facilidades">
        <div class="contenedor-facilidades">
            <h2 class="facilidades-titulo">Nuestros servicios</h3>
                <h3 class="facilidades-subtitulo">Facilidades del estudio</h4>
                    <div class="contenedor-facilidades-grid">
                        <div class="elemento-uno">
                            <div class="elemento-row">
                                <span></span>
                                <h4>Sala de Relax</h4>
                            </div>
                            <p>Sala dónde podrás recuperar energías despues de cada clase y recibir un poco de calma</p>
                        </div>
                        <div class="elemento-dos">
                            <div class="elemento-row">
                                <span></span>
                                <h4>Duchas y Vestuarios</h4>
                            </div>
                            <p>Disponemos de vestuarios equipados completamente y duchas para cada usuario</p>
                        </div>
                        <div class="elemento-tres">
                            <div class="elemento-row">
                                <span></span>
                                <h4>Tienda de Productos</h4>
                            </div>
                            <p>Disponemos de una tienda con productos propios del estudio</p>
                        </div>
                        <div class="elemento-cuatro">
                            <div class="elemento-row">
                                <span></span>
                                <h4>Servicio de nutricion</h4>
                            </div>
                            <p>Podrás mejorar tu alimentación con nuestro servicio Aliméntate</p>
                        </div>
                        <div class="elemento-cinco">
                            <div class="elemento-row">
                                <span></span>
                                <h4>Cafe o zona de snacks saludables</h4>
                            </div>
                            <p>Tomate tu cafe mañanero o cuando lo necesites</p>
                        </div>
                        <div class="elemento-seis">
                            <div class="elemento-row">
                                <span></span>
                                <h4>Estacionamiento o facil transporte en la zona</h4>
                            </div>
                            <p>Disponemos de parquin privado, y zona de autobuses a menos de 100 metros</p>
                        </div>
                    </div>
        </div>
    </div>
@endsection
