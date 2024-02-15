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

    if (localStorage.getItem("elementosActivos")) {
        establecerElementosActivos();
    } else {
        const URLPREDEFINIDAPESTAÑA = $("#contenidoGeneral").data("url");
        $("#contenido-dinamico").load(URLPREDEFINIDAPESTAÑA, function () {
            $("#contenidoGeneral").addClass("selected");

            const URLPREFEFINIDAGRUPO = $("#informacionGeneral").data("url");
            $("#contenido-dinamico-interno").load(URLPREFEFINIDAGRUPO);
            $("#informacionGeneral").addClass("selected");
        });
    }

    //Carga de contenido dinámico precargado

    // Carga de Contenido Dinámico
    $(".contenido-cargable").on("click", function () {
        console.log("hola funciona");
        const url = $(this).data("url");
        $("#contenido-dinamico").load(url);
        $(".contenido-cargable").removeClass("selected");
        $(this).addClass("selected");
        elementosActivos();
    });

    $(document).on("click", ".contenido-cargable-interno", function () {
        console.log("hola funciona");
        const url = $(this).data("url");
        $("#contenido-dinamico-interno").load(url);
        $(".contenido-cargable-interno").removeClass("selected");
        $(this).addClass("selected");
        elementosActivos();
    });

    function contenidoDinamico(elemento, url, callback) {
        $("#contenido-dinamico").load(url, function() {
            if(callback){
                callback();
            }
        });
        $(".contenido-cargable").removeClass("selected");

    }

    function contenidoDinamicoInterno(elemento, url) {
        const url = $("." + clase).data("url");
        console.log(url);
        $("#contenido-dinamico-interno").load(url);
        $(".contenido-cargable-interno").removeClass("selected");
    }

    function elementosActivos() {
        var elementos = $(".selected");

        var clasesElementosActivos = [];
        var idsElementosSelected = [];
        var urlElementosActivos = [];

        var elementosActivos = [];

        elementos.each(function () {
            urlElementosActivos.push($("#" + this.id).data("url"));
        });

        elementos.each(function () {
            clasesElementosActivos.push($("#" + this.id).attr("class"));
        });
        console.log(clasesElementosActivos);

        elementos.each(function () {
            idsElementosSelected.push(this.id);
        });
        console.log(idsElementosSelected);
        elementosActivos.push(
            clasesElementosActivos,
            idsElementosSelected,
            urlElementosActivos
        );

        console.log(elementosActivos);

        localStorage.setItem(
            "elementosActivos",
            JSON.stringify(elementosActivos)
        );
    }

    function establecerElementosActivos() {
        var elementosActivosStorage = localStorage.getItem("elementosActivos");
        //0 para clases
        //1 para id
        //2 para url
        var elementosActivos = JSON.parse(elementosActivosStorage);
        var id = elementosActivos[1][0]; //1 para id 0 para el primer elemento
        var elemento = $('#' + id);
        var url = elementosActivos[1][2];

        var idInterno = elementosActivos[1][1];
        var elementoInterno = $('#' + idInterno);
        var urlInterno = elementosActivos[2][1];

        contenidoDinamico(url, elemento, function() {
            contenidoDinamicoInterno(urlInterno, elementoInterno)
        })

    }

    // Redirección con Imagen del Logo
    $(".imagen-logo").on("click", function () {
        const url = $(this).data("url");
        window.location.href = url;
    });
});
