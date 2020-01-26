var $cookiesInfo = $('#cookies_info');

if (document.cookie !== 'accept_cookie=true') {
    $cookiesInfo.css({display: 'flex'});
}

$cookiesInfo.on('click', '.btnn', function () {
    $(this).parent().animate({opacity: 0}, 300);
    document.cookie = 'accept_cookie=true';
});