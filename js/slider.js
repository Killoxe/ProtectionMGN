$(document).ready(function () {
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        spaceBetween: 100,
        effect: 'coverflow',
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // fadeEffect: {
        //     crossFade: true
        // },
    });
});