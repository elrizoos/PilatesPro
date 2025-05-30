<div class="container-fluid">
    <div class="row  seccion-video">
    <div class="col w-100 h-100 g-0">
        <div class="w-100 h-100 bg-color-fondo-oscuro-transparente border-bottom border-1 border-dorado-claro">
            <div class="position-relative w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                <div class="contenido-video position-absolute d-none w-75 h-75 d-flex flex-column align-items-end gap-2">
                    <svg class="icon icono-normal top-0 end-0 fs-1  z-3 d-none" id="botonCerrar">
                        <use xlink:href="#botn-cerrar" />
                    </svg>
                    <video id="reproductor-video" class="h-100 w-100 d-none fs-5" controls>
                        <source src="{{ asset('videos/video-presentacion.mp4') }}" type="video/mp4">
                        Tu navegador no soporta el elemento de video HTML5.
                    </video>
                </div>
                <div class="contenido-no-video d-flex gap-4 flex-column justify-content-center align-items-center fs-4">
                    <div>
                        <svg class="icon icono-grande">
                            <use xlink:href="#pelota-de-pilates" />
                        </svg>
                        <svg fill="red" class="icon icono-grande">
                            <use xlink:href="#pelota-de-pilates" />
                        </svg>
                        <svg class="icon icono-grande">
                            <use xlink:href="#pelota-de-pilates" />
                        </svg>
                        <svg class="icon icono-grande">
                            <use xlink:href="#pelota-de-pilates" />
                        </svg>
                        <svg class="icon icono-grande">
                            <use xlink:href="#pelota-de-pilates" />
                        </svg>
                    </div>
                    <h2 class="texto-color-resalte text-uppercase fs-2">Chus Alvarez Pilates</h2>
                    <h3 class="texto-color-titulo text-uppercase fs-2">Video de promoción</h3>
                    <svg id="botonPlay" class="icon icono-muy-grande">
                        <use xlink:href="#reproducir-msica" />
                    </svg>
                </div>
            </div>
        </div>

    </div>
</div>

</div>