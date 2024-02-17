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

    

    // Redirección con Imagen del Logo
    $(".imagen-logo").on("click", function () {
        const url = $(this).data("url");
        window.location.href = url;
    });
});

function establecerElementosDinamicos() {
    
}
