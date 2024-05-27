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
        $("#contenedorSeleccion").addClass('d-none'); 
    }

    function mostrarContenedor(clase, valorBoton, elemento, objeto) {
        $("." + clase).removeClass("d-none");

        $("." + clase).addClass('d-flex');
        var botonEnviar = $("." + clase + " input[type=submit]");
        botonEnviar.val(valorBoton).addClass(elemento);

        var esEliminar =
            elemento === "eliminarPagina" || elemento === "eliminarSeccion";
        $("." + clase + " input[name=_method]").val(esEliminar ? "DELETE" : "");

        $("." + clase + " .formulario-contenedor").attr(
            "method",
            !esEliminar ? "GET" : "POST"
        );

        var tipoObjeto =
            objeto === "pagina" ? "paginaEscogida" : "seccionEscogida";
        var objetoId = $(
            "." + clase + " select[name=" + tipoObjeto + "]"
        ).val();
        var ruta = $("#data-input").data(elemento.toLowerCase());
        ruta = ruta.replace("INDEFINIDO", objetoId);
        console.log(ruta);

        $("." + clase + " form").attr("action", ruta);
    }

    $("#paginaEscogida, #seccionEscogida").on("change", function (e) {
        var objetoInicial = e.currentTarget.id;
        var tipoObjeto =
            objetoInicial === "seccionEscogida" ? "seccion" : "pagina";
        var formulario =
            tipoObjeto === "pagina"
                ? "formulario-pagina"
                : "formulario-seccion";
        var objetoId = $("#" + objetoInicial).val();
        var ruta = $("form." + formulario).attr("action");
        ruta = ruta.replace(/\/\d+/, "/" + objetoId);
        $("." + formulario).attr("action", ruta);
    });

    $("#cerrarBoton").on("click", function () {
        $(".ventana-emergente").addClass("no-active");
    });
});

$(".hora-inicio, .hora-fin").on("click", function () {
    if ($(this).hasClass("hora-inicio")) {
        $(".seleccion-horas").removeClass("d-none");
        $("#inicioFin").text("Hora Inicio");
    } else {
        $(".seleccion-horas").removeClass("d-none");
        $("#inicioFin").text("Hora Fin");
    }
});

$("#seleccionarHora").on("click", function () {
    const h3 = $("#inicioFin").text();
    let minutos;
    let horas;
    switch (h3) {
        case "Hora Inicio":
            minutos = $("#minutosProvisional").val();
            horas = $("#horaProvisional").val();
            console.log(horas);
            let inputInicio = $("#horaInicio");
            inputInicio.val(horas + ":" + minutos);

            $(".hora-inicio .hora").text(horas);
            $(".hora-inicio .minutos").text(minutos);

            console.log(inputInicio);
            break;
        case "Hora Fin":
            minutos = $("#minutosProvisional").val();
            horas = $("#horaProvisional").val();

            let inputFin = $("#horaFin");
            inputFin.val(horas + ":" + minutos);
            $(".hora-fin .hora").text(horas);
            $(".hora-fin .minutos").text(minutos);
            console.log(inputFin);
            break;
    }
    $(".seleccion-horas").addClass("d-none");
});

$("#sliderHoras").on("input", function () {
    const minutos = $(this).val() * 5;
    const horas = Math.floor(minutos / 60);
    const minutosRestantes = minutos % 60;

    const horasCeros = pad(horas);
    const minutosCeros = pad(minutosRestantes);

    $("#horaProvisional").val(horasCeros);
    $("#minutosProvisional").val(minutosCeros);
    setAgujas(horasCeros, minutosCeros);
});

function pad(num) {
    return num.toString().padStart(2, "0");
}

function setAgujas(horas, minutos) {
    const anguloHoras = ((horas % 12) / 12) * 360 + (minutos / 60) * 30;
    const anguloMinutos = (minutos / 60) * 360;

    $(".aguja-hora").css("transform", "rotate(" + anguloHoras + "deg)");
    $(".aguja-minuto").css("transform", "rotate(" + anguloMinutos + "deg)");
}

//Funcion para el funcionamiento del calendario

const mesAnno = $("#mesAnnoActual");
const diasMes = $("#diasMes");
const fechaActual = new Date();
let mesActual = fechaActual.getMonth();
console.log(mesActual);
let annoActual = fechaActual.getFullYear();

function calendario() {
    const primerDia = new Date(annoActual, mesActual, 1);
    const ultimoDia = new Date(annoActual, mesActual + 1, 0);
    const fecha = primerDia.toLocaleDateString("es-ES", {
        month: "long",
        year: "numeric",
    });
    mesAnno.text(fecha);

    diasMes.empty();
    for (let i = 0; i < primerDia.getDay()-1; i++) {
        diasMes.append("<div></div>");
    }

    for (let i = 1; i <= ultimoDia.getDate(); i++) {
        const diaDiv = $("<div class='dia-calendario'></div>").text(i);
        if (
            i === fechaActual.getDate() &&
            annoActual === fechaActual.getFullYear() &&
            mesActual === fechaActual.getMonth()
        ) {
            diaDiv.addClass("today");
        }
        diasMes.append(diaDiv);
    }
    añadirEvento();
}

$(".mes-anterior").click(function () {
    mesActual--;
    if (mesActual < 0) {
        mesActual = 11;
        annoActual--;
    }
    calendario();
});

$(".mes-siguiente").click(function () {
    mesActual++;
    if (mesActual > 11) {
        mesActual = 0;
        annoActual++;
    }
    calendario();
});

$(".anno-anterior").click(function () {
    annoActual--;
    calendario();
});

$(".anno-siguiente").click(function () {
    annoActual++;
    calendario();
});

calendario();

//Funcion para aparecer y desaparecer calendario y label de placeholder
const label = $("#fechaPlaceholder");
const contenedorCalendario = $("#contenedorCalendario");
const fechaEspecifica = $("#fechaEspecifica");
let dias = $(".dias-mes div");
label.on("click", function () {
    label.hide();
    contenedorCalendario.addClass("d-flex");
});
fechaEspecifica.on("click", function () {
    contenedorCalendario.removeClass("d-none");
});

function añadirEvento() {
    const diasCalendario = $(".dia-calendario");
    diasCalendario.on("click", function () {
        contenedorCalendario.addClass("d-none");
        fechaEspecifica.val(
            annoActual + "-" + pad(mesActual+1) + "-" + pad($(this).text())
        );
    });
}

//Funcionalidad de boton repetir
$("#repetir").on("change", function () {
    console.log($(this).prop("checked"));

    switch ($(this).prop("checked")) {
        case true:
            $(".opcionRepetir").addClass("d-flex");
            break;
        case false:
            $(".opcionRepetir").removeClass("d-flex");
            $(".listaDiasSemana li input").prop("checked", false);
    }
});

$(".timeline").scroll(function () {
    console.log("moviendo");
    $(".horas-timeline").css("left", $(".timeline").scrollLeft());
    $(".fecha-timeline").css("top", $(".timeline").scrollTop());
});

//Funcionalidad pagos
$('#input-mas-detalles-pago').on('click', function() {
    $('.mas-detalles-pago').addClass('d-flex');
    $(this).hide();
});
