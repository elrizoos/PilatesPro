import "./bootstrap";

$(document).ready(function () {
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let slides = $(".slider");
        for (let i = 0; i < slides.length; i++) {
            $(slides[i]).removeClass("active");
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }
        $(slides[slideIndex - 1]).addClass("active");
        setTimeout(showSlides, 3000);
    }
});

$(document).ready(function () {
    console.log("SCRIPT JS LOAD");
    var botonPlay = $("#botonPlay");
    var botonCerrar = $("#botonCerrar");
    var video = $('#reproductor-video').get(0);
    var tiempo = 0;

    botonPlay.click(function () {
        $(".contenido-video").toggle();
        $("#reproductor-video").toggle();
        $("#botonCerrar").toggle();
        video.currentTime = tiempo;
        video.play();
    });
    botonCerrar.click(function () {
        $(".contenido-video").toggle();
        $("#reproductor-video").toggle();
        $("#botonCerrar").toggle();

        video.pause();
        tiempo = video.currentTime;
    });
});

