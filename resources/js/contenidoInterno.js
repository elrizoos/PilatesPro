function establecerClaseSelected(elementoDinamico, elementoDinamicoInterno) {
    console.log(
        elementoDinamico.attr("id"),
        elementoDinamicoInterno.attr("id")
    );
    borrarClaseSelected();
    desactivarDivs();
    $("#" + elementoDinamico.attr("id")).addClass("selected");
    $("." + elementoDinamico.attr("id")).addClass("selected");

    $("#" + elementoDinamicoInterno.attr("id")).addClass("selected");

    $("." + elementoDinamico.attr("id"))
        .removeClass("d-none")
        .addClass("d-flex");
    $("." + elementoDinamicoInterno.attr("id"))
        .removeClass("d-none")
        .addClass("d-flex");

    establecerEventosClick();
}

function borrarClaseSelected() {
    $(".selected").removeClass("selected");
}

function desactivarDivs() {
    $("#contenido-dinamico > div").addClass("d-none");
    $("#contenido-dinamico-interno > div").addClass("d-none");
}

function establecerEventosClick() {
    $(".contenido-cargable, .contenido-cargable-interno").on(
        "click",
        function () {
            const url = $(this).data("url");
            redirigirPagina(url);
            console.log(url);
        }
    );
}

function redirigirPagina(url) {
    window.location.href = url;
}

var path = window.location.pathname; // Obtiene la ruta completa
var parts = path.split("/"); // Divide la ruta en partes
var lastSegment = parts.pop() || parts.pop(); // Toma el último segmento no vacío

console.log(lastSegment);

switch (lastSegment) {
    case "informacionGeneral":
    case "informacionContacto":
    case "fotoPerfil":
    case "preferenciasIdioma":
        var elementoDinamico = "contenidoGeneral";
        break;
    case "historialReservas":
    case "reservasActivas":
    case "sugerenciasReservas":
        var elementoDinamico = "contenidoReservas";
        break;
    case "cambioPlan":
    case "detallesPlan":
    case "estadoSuscripcion":
    case "historialPago":
        var elementoDinamico = "contenidoSuscripcion";
        break;
    case "cambiarContraseña":
    case "opciones":
    case "politicas":
        var elementoDinamico = "contenidoContraseña";
        break;
    case "notificaciones":
    case "privacidad":
    case "redSocial":
    case "eliminar":
        var elementoDinamico = "contenidoOtros";
        break;
}
var elementoDinamicoInterno = $("#" + lastSegment);
var elementoDinamico = $("#" + elementoDinamico);
establecerClaseSelected(elementoDinamico, elementoDinamicoInterno);
