import "./bootstrap";

$(document).ready(function () {
    console.log("SCRIPT JS LOAD");

    // Slider
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        const slides = $(".slider");
        slides.removeClass("active");
        slideIndex = slideIndex >= slides.length ? 0 : slideIndex;
        slides.eq(slideIndex++).addClass("active");
        setTimeout(showSlides, 3000);
    }

    // Control de Video
    const botonPlay = $("#botonPlay");
    const botonCerrar = $("#botonCerrar");
    const video = $("#reproductor-video").get(0);
    let tiempo = 0;

    botonPlay.on("click", function () {
        toggleVideo(true);
    });

    botonCerrar.on("click", function () {
        toggleVideo(false);
    });

    if (localStorage.getItem("elementosActivos")) {
        establecerElementosActivos();
    } else {
        cargarContenidoInicial();
    }

    // Redirección con Imagen del Logo
    $(".imagen-logo").on("click", function () {
        const url = $(this).data("url");
        window.location.href = url;
    });
});

function cargarContenidoInicial() {
    const urlPestana = $("#contenidoGeneral").data("url");
    cargarContenidoDinamico(urlPestana, false, function () {
        $("#contenidoGeneral").addClass("selected");
        const urlGrupo = $("#informacionGeneral").data("url");
        cargarContenidoDinamico(urlGrupo, true, function () {
            $("#informacionGeneral").addClass("selected");
            establecerEventosClick();
        });
    });
}

function cargarContenidoDinamico(url, esInterno, callback) {
    const destino = esInterno
        ? "#contenido-dinamico-interno"
        : "#contenido-dinamico";
    $(destino).load(url, function () {
        console.log("Contenido cargado desde: " + url);
        if (callback) callback();
    });
}

function actualizarEstadoSeleccion(elemento) {
    $(".contenido-cargable, .contenido-cargable-interno").removeClass(
        "selected"
    );
    elemento.addClass("selected");
    elementosActivos();
}

function elementosActivos() {
    let elementosActivos = {
        ids: [],
        urls: [],
    };

    $(".selected").each(function () {
        elementosActivos.ids.push(this.id);
        elementosActivos.urls.push($(this).data("url"));
    });

    console.log(elementosActivos);
    localStorage.setItem("elementosActivos", JSON.stringify(elementosActivos));
}

// Eventos de clic para cargar contenido dinámico
function establecerEventosClick() {
    $(".contenido-cargable, .contenido-cargable-interno").on(
        "click",
        function () {
            console.log("hola funciona");
            const url = $(this).data("url");
            const esInterno = $(this).hasClass("contenido-cargable-interno");
            cargarContenidoDinamico(url, esInterno);
            actualizarEstadoSeleccion($(this));
        }
    );
}

function establecerElementosActivos() {
    let elementosActivos = JSON.parse(localStorage.getItem("elementosActivos"));
    if (elementosActivos && elementosActivos.ids.length > 0) {
        // Asume que el primer elemento no es interno y el segundo sí
        cargarContenidoDinamico(elementosActivos.urls[0], false, function () {
            $("#" + elementosActivos.ids[0]).addClass("selected");
            if (elementosActivos.urls.length > 1) {
                cargarContenidoDinamico(
                    elementosActivos.urls[1],
                    true,
                    function () {
                        $("#" + elementosActivos.ids[1]).addClass("selected");
                        establecerEventosClick();
                    }
                );
            }
        });
    }
}
