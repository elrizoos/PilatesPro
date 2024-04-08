import "./bootstrap";

$(document).ready(function () {
    console.log("SCRIPT JS LOAD");

    // Slider
    let slideIndex = 0;
    showSlides();
    showSlidesMovil();
    function showSlides() {
        const slides = $("#appEscritorio .slider");
        //console.log(slides);
        slides.removeClass("active");
        slideIndex = slideIndex >= slides.length ? 0 : slideIndex;
        slides.eq(slideIndex++).addClass("active");
        setTimeout(showSlides, 3000);
    }

    function showSlidesMovil() {
        const slides = $("#appMovil .slider");
        //console.log(slides);
        slides.removeClass("active");
        slideIndex = slideIndex >= slides.length ? 0 : slideIndex;
        slides.eq(slideIndex++).addClass("active");
        setTimeout(showSlidesMovil, 3000);
    }

    // Control de Video
    const botonPlay = $("#botonPlay");
    const botonCerrar = $("#botonCerrar");
    const video = $("#reproductor-video").get(0);
    let tiempo = 0;

    botonPlay.on("click", function () {
        toggleVideo(true);
    });

    $(document).on("touchstart", "#botonPlay", function () {
        $(".contenido-video, #reproductor-video, #botonCerrar").toggle();
    });

    botonCerrar.on("click", function () {
        toggleVideo(false);
    });

    $(document).on("touchstart", "#botonCerrar", function () {
        $(".contenido-video, #reproductor-video, #botonCerrar").toggle();
    });
    function toggleVideo(play) {
        $(".contenido-video, #reproductor-video, #botonCerrar").toggle();
        if (play) {
            video.currentTime = tiempo;
            video.play();
        } else {
            video.pause();
            tiempo = video.currentTime;
        }
    }
    // Redirección con Imagen del Logo
    $("#imagen-logo").on("click", function () {
        const url = $(this).data("url");
        window.location.href = url;
    });

    $(".iconoMenu").on("click", function () {
        console.log("hola");
        if ($("#listaMenu ul").hasClass("active")) {
            $("#listaMenu ul").addClass("no-active");
            $("#listaMenu ul").removeClass("active");
        } else {
            $("#listaMenu ul").addClass("active");
            $("#listaMenu ul").removeClass("no-active");
        }
    });

    $("#paginasPersonalizadas").on("click", function () {
        if ($("#listaPaginas").hasClass("listaPaginasTransicion")) {
            $("#listaPaginas").addClass("no-active");
            $("#listaPaginas").removeClass("listaPaginasTransicion");
        } else {
            $("#listaPaginas").addClass("listaPaginasTransicion");
            $("#listaPaginas").removeClass("no-active");
        }
    });

    $("#contenedorSeleccion .opcion").on("click", function (e) {
        var elemento = e.currentTarget.id;
        var valorBoton;
        valorBoton = elemento.replace(/([a-z])([A-Z])/g, "$1 $2");
        console.log(valorBoton);
        if (elemento === "eliminarPagina" || elemento === "editarPagina") {
            ocultarContenedores();
            mostrarContenedor("contenedor-paginas", valorBoton, elemento);
        } else {
            ocultarContenedores();
            mostrarContenedor("contenedor-secciones", valorBoton, elemento);
        }
    });

    function ocultarContenedores() {
        $(".contenedor-opciones-pagina").toggle();
        $(".contenedor-opciones-seccion").toggle();
    }

    function mostrarContenedor(clase, valorBoton, elemento) {
        $("." + clase).toggle();
        $("." + clase + " input[type=submit]").val(valorBoton);
        $("." + clase + " input[type=submit]").attr("id", elemento);
        $("#" + elemento).on("click", function (e) {
            if (
                elemento === "eliminarPagina" ||
                elemento === "eliminarSeccion"
            ) {
                $("." + clase + " input[name=_method]").val("DELETE");
                var ruta = $("." + clase + " input[name=dataUrl]").data(
                    elemento
                );
                var pagina = $(
                    "." + clase + " select[name=paginaEscogida"
                ).val();
                ruta = ruta.replace("INDEFINIDO", pagina);
                $("." + clase + " form").attr("action", ruta);
            } else {
                $("." + clase + " input[name=_method]").attr("value", "POST");
            }
        });
    }
});
