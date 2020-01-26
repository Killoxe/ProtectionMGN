var $header = $('header');
// var $btnUp = $('butUp');

$(window).scroll(function () {
    if ( $(this).scrollTop() > 1 ) {
        $header.addClass('sticky');
        // $btnUp.removeClass('hidden');
    } else {
        $header.removeClass('sticky');
        // $btnUp.addClass('hidden');
    }
});

$('.header__btn').on('click', function (e) {
    e.preventDefault();
    $(this).closest('header').find('.menu').slideToggle(500);
});

