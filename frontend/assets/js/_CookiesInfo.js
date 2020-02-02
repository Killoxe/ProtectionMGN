var $cookiesInfo = $('#cookies_info');

if (document.cookie !== 'accept_cookie=true') {
    $cookiesInfo.css({display: 'flex'});
}

$cookiesInfo.on('click', '.btnn', function () {
    $cookiesInfo.animate({opacity: 0}, 300, 'swing', function () {
        $cookiesInfo.css({display: 'none'});
    });
    document.cookie = 'accept_cookie=true';
});