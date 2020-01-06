$(document).ready(function () {
    //1. изменение класса при скролле
    var $header = $('header');

    $(window).scroll(function () {
        if ( $(this).scrollTop() > 75 ) {
            $header.addClass('sticky');

        } else {
            $header.removeClass('sticky');
        }
    });


    //2. плавный скролл
    var anchors = $('a[href*="#"]'),
        duration = 500;

    anchors.each(function (i, item) {
        $(item).on('click', function (e) {

            $('html').animate({
                scrollTop: $($(this).attr("href")).offset().top + "px"
            }, {
                duration: duration,
                easing: "swing"
            });

            return false;
        });
    });
});
