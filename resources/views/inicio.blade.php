@extends('layouts.app')

@section('content')
    <div class="slider-seccion">
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
                <h1>Titulo 1</h1>
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
                <h1>Titulo 1</h1>
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
                <h1>Titulo 1</h1>
                <p>parrafo Lorem, ipsum dolor sit amet consectetur</p>
                <input class="boton-slider" type="button" value="hola">
            </div>
        </div>
    </div>
    <div class="seccion claro">
        <div class="marco">
            <div class="columna columna-texto">
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
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque nihil corrupti sit velit modi quia
                    tempore laudantium consectetur soluta quas totam, recusandae suscipit reiciendis numquam explicabo
                    nostrum optio mollitia rerum!</p>
                <p class="parrafo-segundo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id beatae aliquid
                    incidunt rerum fugit dolore consequuntur voluptatum excepturi eaque! Impedit nesciunt enim id velit
                    optio magni eaque, qui mollitia ad.</p>

            </div>
            <div class="columna columna-imagenes">
                <div class="columna">
                    <div class="imagen-columna img-col-izquierda">

                    </div>
                </div>
                <div class="columna">
                    <div class="imagen-columna img-col-derecha">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="seccion seccion-abajo">
        <div class="texto-titulo">
            <h1>Chus Alvarez Pilates</h1>
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
            <iframe id="reproductor-video" class="reproductor-video" width="560" height="315" src="https://www.youtube.com/embed/iUYXLN4JAi0?si=ckAwHDSLjd2Lh1zl"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            <div class="contenido-video">
                <div class="linea-iconos">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <h3>Chus Alvarez Pilates</h3>
                <h4>Video de promoción</h4>
                <span class="icono-play"></span>
            </div>
        </div>
    </div>
@endsection
