@extends('layouts.app')

@section('content')
    @if (session('registro-exitoso'))
        <div>
            {{ session('registro-exitoso') }}
        </div>
    @endif
    <div class="" id="cuadroActualizacion">
        <h5>¡La página ha sido actualizada!</h5>
        <h3>Version 0.0.1 (Primeras notas)</h3>

        @include('actualizacion.version_0_0_1')

    </div>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <h2>Titulo 1</h2>
                <p>parrafo Lorem, ipsum dolor sit amet consectetur</p>
                <input type="button" value="hola">
            </div>
        </div>
        <div>
            <div>
                <div>
                    <div>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <h2>Titulo 1</h2>
                <p>parrafo Lorem, ipsum dolor sit amet consectetur</p>
                <input type="button" value="hola">
            </div>
        </div>
        <div>
            <div>
                <div>
                    <div>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <h2>Titulo 1</h2>
                <p>parrafo Lorem, ipsum dolor sit amet consectetur</p>
                <input type="button" value="hola">
            </div>
        </div>
    </div>
    <div>
        <div>

            <div>
                <div>
                    <div>
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
            <div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque nihil corrupti sit velit modi quia
                    tempore laudantium consectetur soluta quas totam, recusandae suscipit reiciendis numquam explicabo
                    nostrum optio mollitia rerum!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id beatae aliquid
                    incidunt rerum fugit dolore consequuntur voluptatum excepturi eaque! Impedit nesciunt enim id velit
                    optio magni eaque, qui mollitia ad.</p>
            </div>




            <div>
                <div>

                </div>
            </div>


            <div>
                <div>

                </div>
            </div>


        </div>
    </div>
    <div>
        <div>
            <h2>Chus Alvarez Pilates</h2>
            <h3>Cursos por nivel de experiencia</h3>
        </div>
        <div>
            <div>
                <div>
                    <div>
                        <p>
                            10€ / Clase
                        </p>
                        <p>Basico</p>
                    </div>
                    <hr>
                    <div>
                        <div>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div>
                            <p>Más detalles </p><span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <div>
                        <p>
                            15€ / Clase
                        </p>
                        <p>Principiante Avanzado</p>
                    </div>
                    <hr>
                    <div>
                        <div>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div>
                            <p>Más detalles </p><span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <div>
                        <p>
                            20€ / Clase
                        </p>
                        <p>Intermedio</p>
                    </div>
                    <hr>
                    <div>
                        <div>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div>
                            <p>Más detalles </p><span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <div>
                        <p>
                            25€ / Clase
                        </p>
                        <p>Intermedio Avanzado</p>
                    </div>
                    <hr>
                    <div>
                        <div>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div>
                            <p>Más detalles </p><span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <div>
                        <p>
                            30€ / Clase
                        </p>
                        <p>Avanzado</p>
                    </div>
                    <hr>
                    <div>
                        <div>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div>
                            <p>Más detalles </p><span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div>
            <video id="reproductor-video" controls>
                <source src="{{ asset('videos/video-presentacion.mp4') }}" type="video/mp4">
                Tu navegador no soporta el elemento de video HTML5.
            </video>
            <span id="botonCerrar"></span>
            <div>
                <div>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <h2>Chus Alvarez Pilates</h3>
                    <h3>Video de promoción</h4>
                        <span id="botonPlay"></span>
            </div>
        </div>
    </div>
    <div>
        <div>
            <h2>Nuestros servicios</h3>
                <h3>Facilidades del estudio</h4>
                    <div>
                        <div>
                            <div>
                                <span></span>
                                <h4>Sala de Relax</h4>
                            </div>
                            <p>Sala dónde podrás recuperar energías despues de cada clase y recibir un poco de calma</p>
                        </div>
                        <div>
                            <div>
                                <span></span>
                                <h4>Duchas y Vestuarios</h4>
                            </div>
                            <p>Disponemos de vestuarios equipados completamente y duchas para cada usuario</p>
                        </div>
                        <div>
                            <div>
                                <span></span>
                                <h4>Tienda de Productos</h4>
                            </div>
                            <p>Disponemos de una tienda con productos propios del estudio</p>
                        </div>
                        <div>
                            <div>
                                <span></span>
                                <h4>Servicio de nutricion</h4>
                            </div>
                            <p>Podrás mejorar tu alimentación con nuestro servicio Aliméntate</p>
                        </div>
                        <div>
                            <div>
                                <span></span>
                                <h4>Cafe o zona de snacks saludables</h4>
                            </div>
                            <p>Tomate tu cafe mañanero o cuando lo necesites</p>
                        </div>
                        <div>
                            <div>
                                <span></span>
                                <h4>Estacionamiento o facil transporte en la zona</h4>
                            </div>
                            <p>Disponemos de parquin privado, y zona de autobuses a menos de 100 metros</p>
                        </div>
                    </div>
        </div>
    </div>
@endsection
