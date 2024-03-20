import "./bootstrap";

$(document).ready(function () {
    console.log("SCRIPT JS LOAD");

    // Slider
    let slideIndex = 0;
    showSlides();
    showSlidesMovil();
    function showSlides() {
        const slides = $("#appEscritorio .slider");
        console.log(slides);
        slides.removeClass("active");
        slideIndex = slideIndex >= slides.length ? 0 : slideIndex;
        slides.eq(slideIndex++).addClass("active");
        setTimeout(showSlides, 3000);
    }

    function showSlidesMovil() {
        const slides = $("#appMovil .slider");
        console.log(slides);
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

    $(document).on('touchstart', '#botonPlay', function() {
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
    $(".imagen-logo").on("click", function () {
        const url = $(this).data("url");
        window.location.href = url;
    });

    $('#iconoMenu').on('click', function() {
        $('.lista ul').toggle();
    })
});
