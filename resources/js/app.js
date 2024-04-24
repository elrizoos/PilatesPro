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
            mostrarContenedor(
                "contenedor-paginas",
                valorBoton,
                elemento,
                "pagina"
            );
        } else {
            ocultarContenedores();
            mostrarContenedor(
                "contenedor-secciones",
                valorBoton,
                elemento,
                "seccion"
            );
        }
    });

    function ocultarContenedores() {
        $(".contenedor-opciones-pagina").toggle();
        $(".contenedor-opciones-seccion").toggle();
    }

    function mostrarContenedor(clase, valorBoton, elemento, objeto) {
        $("." + clase).toggle();
        var botonEnviar = $("." + clase + " input[type=submit]");
        botonEnviar.val(valorBoton).attr("class", elemento);

        var esEliminar =
            elemento === "eliminarPagina" || elemento === "eliminarSeccion";
        $("." + clase + " input[name=_method]").val(
            esEliminar ? "DELETE" : ""
        );

        $('.' + clase + ' .formulario-contenedor').attr('method', !esEliminar ? 'GET' : 'POST');

        var tipoObjeto =
            objeto === "pagina" ? "paginaEscogida" : "seccionEscogida";
        var objetoId = $(
            "." + clase + " select[name=" + tipoObjeto + "]"
        ).val();
        var ruta = $("#data-input").data(elemento.toLowerCase());
        ruta = ruta.replace("INDEFINIDO", objetoId);
        console.log(ruta);

        $("." + clase + " .formulario-contenedor").attr("action", ruta);
    }

    $("#paginaEscogida, #seccionEscogida").on("change", function (e) {
        var objetoInicial = e.currentTarget.id;
        var tipoObjeto = (objetoInicial === 'seccionEscogida') ? 'seccion' : 'pagina';
        var formulario = (tipoObjeto === 'pagina') ? 'formulario-pagina' : 'formulario-seccion';
        var objetoId = $("#" + objetoInicial).val();
        var ruta = $('.formulario-contenedor.' + formulario).attr('action');
        ruta = ruta.replace(/\/\d+/, "/" + objetoId);
        $("." + formulario).attr("action", ruta);
    });

    $("#cerrarBoton").on("click", function () {
        $(".ventana-emergente").addClass("no-active");
    });
});
