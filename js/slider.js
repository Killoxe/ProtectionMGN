$(document).ready(function () {
    var swiper = new Swiper('.slider__wrap', {
        loop: true,
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        speed: 1500,
        spaceBetween: 50,
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: 'coverflow',
        coverflowEffect: {
            rotate: 90,
            slideShadows: false,
        },
    });
    var swiper = new Swiper('.aboutUs__slider', {
        slidesPerView: 1,
        spaceBetween: 10,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        loop: true,
        breakpoints: {
            1601: {
                slidesPerView: 5,
            },
            1367: {
                slidesPerView: 4,
            },
            769: {
                slidesPerView: 3,
            },
            481: {
                slidesPerView: 2,
            },

        }
    });
  
});