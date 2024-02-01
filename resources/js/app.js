import './bootstrap';

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