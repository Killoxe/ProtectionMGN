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