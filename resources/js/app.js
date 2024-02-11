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

    // Carga de Contenido Dinámico
    $(".contenido-cargable").on("click", function () {
        const url = $(this).data("url");
        $("#contenido-dinamico").load(url);
        $(".contenido-cargable").removeClass("selected");
        $(this).addClass("selected");
    });

    $(".contenido-cargable-interno").on("click", function () {
        const url = $(this).data("url");
        $("#contenido-dinamico-interno").load(url);
        $(".contenido-cargable-interno").removeClass("selected");
        $(this).addClass("selected");
    });

    // Redirección con Imagen del Logo
    $(".imagen-logo").on("click", function () {
        const url = $(this).data("url");
        window.location.href = url;
    });
});