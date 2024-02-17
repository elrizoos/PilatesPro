function establecerClaseSelected(elementoUno, elementoDos) {
    console.log(elementoUno);
    borrarClaseSelected();
    desactivarDivs();
    elementoUno.addClass("selected");
    elementoDos.addClass("selected");

    $("." + elementoUno.attr("id"))
        .removeClass("no-active")
        .addClass("active");
    $("." + elementoDos.attr("id"))
        .removeClass("no-active")
        .addClass("active");

    establecerEventosClick();
}

function borrarClaseSelected() {
    $(".selected").removeClass("selected");
}

function desactivarDivs() {
    $("#contenido-dinamico > div").addClass("no-active");
    $("#contenido-dinamico-interno > div").addClass("no-active");
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

establecerClaseSelected($("#contenidoGeneral"), $("#informacionGeneral"));
