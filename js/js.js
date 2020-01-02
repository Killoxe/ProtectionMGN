(function($) {
    'use strict';

    $(window).scroll(function() {
        console.log(1);
        if ($(this).scrollTop() >= 50){
            $('header').addClass("sticky");
            
        }
        else{
            $('header').removeClass("sticky");
        }
    });


});