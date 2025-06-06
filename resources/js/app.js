import "./bootstrap";

$(document).ready(function () {
    console.log("SCRIPT JS LOAD");

    initSlider("#appEscritorio .slider", "Slider Escritorio");
    initSlider("#appMovil .slider", "Slider Móvil");

    initVideoControls("#botonPlay", "#botonCerrar", "#reproductor-video");

    $("#imagen-logo").on("click", redirectToUrl);
    $("#icono-salir").on("click", redirectToUrl);
    $(".iconoMenu").on("click", toggleMenu);
    $("#paginasPersonalizadas").on("click", togglePagesList);
    $("#paginasPersonalizadasMovil").on("click", togglePagesListMovil);

    $("#contenedorSeleccion .opcion").on("click", handleOptionSelection);
    $("#paginaEscogida, #seccionEscogida").on("change", updateFormAction);

    $("#cerrarBoton").on("click", () => {
        console.log("Cerrar botón clicado");
        $(".ventana-emergente").addClass("no-active");
    });

    $(".hora-inicio").on("click", () => {
        console.log("Hora inicio seleccionada");
        $(".seleccion-horas").removeClass("d-none");
        $("#inicioFin").text("Hora Inicio");
    });

    $("#tiempoClase").on("change", function () {
        var seleccionado = $(this).val();
        console.log("Tiempo de clase seleccionado:", seleccionado);
        $(this).attr("data-value", seleccionado);
    });

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

    $("#seleccionarHora").on("click", handleTimeSelection);
    $("#sliderHoras").on("input", updateProvisionalTime);

    $("#repetir").on("change", toggleRepeatOptions);
    $(".timeline").scroll(syncTimelineScroll);
    $("#input-mas-detalles-pago").on("click", showMorePaymentDetails);
    $(".evento").on("click", submitEventForm);
    $(".selectorMovil").on("click", function () {
        $("#listaMovil").toggleClass("d-none");
        $("#listaMovil").toggleClass("deslizamiento-click");
    });
    $("#selectorMovilCerrar").on("click", function () {
        $("#listaMovil").toggleClass("d-none");
        $("#listaMovil").toggleClass("deslizamiento-click");
    });

    document.querySelectorAll("form").forEach((form) => {
        form.setAttribute("autocomplete", "off");
    });

    document.querySelectorAll("input, textarea").forEach((input) => {
        input.setAttribute("autocomplete", "off");
        // Evita autocompletado usando un nombre "falso"
       
    });
});
function añadirEvento() {
    const diasCalendario = $(".dia-calendario");
    diasCalendario.on("click", function () {
        contenedorCalendario.addClass("d-none");
        fechaEspecifica.val(
            annoActual + "-" + pad(mesActual + 1) + "-" + pad($(this).text())
        );
    });
}

function initSlider(selector, sliderName) {
    let slideIndex = 0;

    function showSlides() {
        const slides = $(selector);
        slides.removeClass("active");
        slideIndex = slideIndex >= slides.length ? 0 : slideIndex;
        slides.eq(slideIndex++).addClass("active");
        setTimeout(showSlides, 3000);
        console.log(`${sliderName} slideIndex: ${slideIndex}`);
    }

    showSlides();
}

function initVideoControls(playButton, closeButton, videoElement) {
    const video = $(videoElement).get(0);
    let tiempo = 0;

    $(playButton).on("click", () => toggleVideo(true, video, tiempo));
    $(document).on("touchstart", playButton, () =>
        toggleElements(
            ".contenido-no-video,.contenido-video, #reproductor-video, #botonCerrar"
        )
    );

    $(closeButton).on("click", () => toggleVideo(false, video, tiempo));
    $(document).on("touchstart", closeButton, () =>
        toggleElements(
            ".contenido-no-video,.contenido-video, #reproductor-video, #botonCerrar"
        )
    );

    function toggleVideo(play, video, tiempo) {
        toggleElements(
            ".contenido-no-video,.contenido-video, #reproductor-video, #botonCerrar"
        );
        if (play) {
            video.currentTime = tiempo;
            video.play();
            console.log("Video play desde:", tiempo);
        } else {
            video.pause();
            tiempo = video.currentTime;
            console.log("Video pausado en:", tiempo);
        }
    }

    function toggleElements(selector) {
        $(selector).toggleClass("d-none");
    }
}

function redirectToUrl() {
    const url = $(this).data("url");
    console.log("Redirigiendo a URL:", url);
    window.location.href = url;
}

function toggleMenu() {
    console.log("Icono de menú clicado");
    $("#listaMenu ul").toggleClass("active no-active");
}

function togglePagesList() {
    console.log("Lista de páginas personalizadas clicada");
    $("#listaPaginas").toggleClass("d-none");
}
function togglePagesListMovil() {
    console.log("Lista de páginas personalizadas clicada");
    $("#listaPaginasMovil").toggleClass("d-none");
}

function handleOptionSelection(e) {
    var elemento = e.currentTarget.id;
    var valorBoton = elemento.replace(/([a-z])([A-Z])/g, "$1 $2");
    console.log("Opción seleccionada:", valorBoton);
    if (elemento === "eliminarPagina" || elemento === "editarPagina") {
        ocultarContenedores();
        mostrarContenedor("contenedor-paginas", valorBoton, elemento, "pagina");
    } else {
        ocultarContenedores();
        mostrarContenedor(
            "contenedor-secciones",
            valorBoton,
            elemento,
            "seccion"
        );
    }
}

function ocultarContenedores() {
    console.log("Ocultando contenedores");
    $("#contenedorSeleccion").addClass("d-none");
}

function mostrarContenedor(clase, valorBoton, elemento, objeto) {
    console.log("Mostrando contenedor:", clase);
    $("." + clase)
        .removeClass("d-none")
        .addClass("d-flex");

    var botonEnviar = $("." + clase + " input[type=submit]");
    botonEnviar.val(valorBoton).addClass(elemento);

    var esEliminar =
        elemento === "eliminarPagina" || elemento === "eliminarSeccion";
    $("." + clase + " input[name=_method]").val(esEliminar ? "DELETE" : "");

    $("." + clase + " .formulario-contenedor").attr(
        "method",
        !esEliminar ? "GET" : "POST"
    );

    var tipoObjeto = objeto === "pagina" ? "paginaEscogida" : "seccionEscogida";
    var objetoId = $("." + clase + " select[name=" + tipoObjeto + "]").val();
    var ruta = $("#data-input").data(elemento.toLowerCase());
    ruta = ruta.replace("INDEFINIDO", objetoId);
    console.log("Ruta ajustada:", ruta);

    $("." + clase + " form").attr("action", ruta);
}

function updateFormAction(e) {
    var objetoInicial = e.currentTarget.id;
    var tipoObjeto = objetoInicial === "seccionEscogida" ? "seccion" : "pagina";
    var formulario =
        tipoObjeto === "pagina" ? "formulario-pagina" : "formulario-seccion";
    var objetoId = $("#" + objetoInicial).val();
    var ruta = $("form." + formulario).attr("action");
    ruta = ruta.replace(/\/\d+/, "/" + objetoId);
    console.log("Ruta del formulario actualizada:", ruta);
    $("." + formulario).attr("action", ruta);
}

function handleTimeSelection() {
    const h3 = $("#inicioFin").text();
    let minutos, horas;

    switch (h3) {
        case "Hora Inicio":
            minutos = parseInt($("#minutosProvisional").val(), 10);
            horas = parseInt($("#horaProvisional").val(), 10);
            console.log("Horas:", horas, "Minutos:", minutos);
            var tiempoClase = parseInt(
                $("#tiempoClase").attr("data-value"),
                10
            );
            console.log("Tiempo de clase:", tiempoClase);

            if (!isNaN(tiempoClase)) {
                var minutosFinal = minutos + tiempoClase;
                var horasFinal = horas;

                if (minutosFinal >= 60) {
                    horasFinal += Math.floor(minutosFinal / 60);
                    minutosFinal = minutosFinal % 60;
                }

                let inputFin = $("#horaFin");
                inputFin.val(
                    (horasFinal < 10 ? "0" : "") +
                        horasFinal +
                        ":" +
                        (minutosFinal < 10 ? "0" : "") +
                        minutosFinal
                );
                $(".hora-fin .hora").text(
                    (horasFinal < 10 ? "0" : "") + horasFinal
                );
                $(".hora-fin .minutos").text(
                    (minutosFinal < 10 ? "0" : "") + minutosFinal
                );
                console.log(
                    "Hora Final:",
                    horasFinal,
                    "Minutos Finales:",
                    minutosFinal
                );
            } else {
                console.log("Seleccione un tiempo de clase válido.");
            }

            let inputInicio = $("#horaInicio");
            inputInicio.val(
                (horas < 10 ? "0" : "") +
                    horas +
                    ":" +
                    (minutos < 10 ? "0" : "") +
                    minutos
            );

            $(".hora-inicio .hora").text((horas < 10 ? "0" : "") + horas);
            $(".hora-inicio .minutos").text(
                (minutos < 10 ? "0" : "") + minutos
            );

            console.log("Hora Inicio:", inputInicio.val());
            break;
        case "Hora Fin":
            minutos = $("#minutosProvisional").val();
            horas = $("#horaProvisional").val();

            let inputFin = $("#horaFin");
            inputFin.val(horas + ":" + minutos);
            $(".hora-fin .hora").text(horas);
            $(".hora-fin .minutos").text(minutos);
            console.log("Hora Fin seleccionada:", inputFin.val());
            break;
    }
    $(".seleccion-horas").addClass("d-none");
}

function updateProvisionalTime() {
    const minutos = $(this).val() * 5;
    const horas = Math.floor(minutos / 60);
    const minutosRestantes = minutos % 60;

    const horasCeros = pad(horas);
    const minutosCeros = pad(minutosRestantes);

    $("#horaProvisional").val(horasCeros);
    $("#minutosProvisional").val(minutosCeros);
    setAgujas(horasCeros, minutosCeros);
}

function pad(num) {
    return num.toString().padStart(2, "0");
}

function setAgujas(horas, minutos) {
    const anguloHoras = ((horas % 12) / 12) * 360 + (minutos / 60) * 30;
    const anguloMinutos = (minutos / 60) * 360;

    $(".aguja-hora").css("transform", "rotate(" + anguloHoras + "deg)");
    $(".aguja-minuto").css("transform", "rotate(" + anguloMinutos + "deg)");
}

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
    for (let i = 0; i < primerDia.getDay() - 1; i++) {
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
function toggleRepeatOptions() {
    console.log("Repetir opción cambiada:", $(this).prop("checked"));
    $(".opcionRepetir").toggleClass("d-flex", $(this).prop("checked"));
    if (!$(this).prop("checked")) {
        $(".listaDiasSemana li input").prop("checked", false);
    }
}

function syncTimelineScroll() {
    console.log("Timeline desplazada");
    $(".horas-timeline").css("left", $(".timeline").scrollLeft());
    $(".fecha-timeline").css("top", $(".timeline").scrollTop());
}

function showMorePaymentDetails() {
    console.log("Mostrando más detalles del pago");
    $(".mas-detalles-pago").addClass("d-flex");
    $(this).hide();
}

function submitEventForm() {
    var elemento = $(this).attr("id");
    var formulario = $("#" + elemento + " form");
    console.log("Enviando formulario de evento:", formulario);
    formulario.submit();
}
