//jQuery to collapse the navbar on scroll
// $(document).ready(function () {
//     'use strict';
//     let nav = $(".navbar"), heda = $(".header");
//     $(window).scroll(function() {
        
//         if (nav.offset().top > 100) {
            
//             heda.addClass("top-nav-collapse");
//         } else {
//             heda.removeClass("top-nav-collapse");
//         }
//     });
// });


$(document).ready(function () {

    'use strict';

    var c, currentScrollTop = 0,
        heada = $('.header'),
        navba = $('.navbar');

    $(window).scroll(function () {
        var a = $(window).scrollTop();
        var b = heada.height();

        currentScrollTop = a;

        if (c < currentScrollTop && a > b ) {
            heada.addClass("top-nav-collapse");
        } 
        if (c > currentScrollTop && !(a >= b)) {
            heada.removeClass("top-nav-collapse");
        }
        if (navba.offset().top > b) {
            heada.addClass("top-nav-collapse");
        }
        c = currentScrollTop;
    });

});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        let x = $anchor.offset();
        console.log($($anchor.attr('href')));
        console.log($anchor.attr('href'));

        $('html, body').stop().animate({
           scrollTop: $($anchor.attr('href')).offset().top
       }, 1500, 'easeInOutExpo');


//        $('html, body').stop().animate({
//            scrollTop: $($anchor.attr('href')).offset().top
//        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});