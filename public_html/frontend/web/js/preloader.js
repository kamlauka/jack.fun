$(window).on('load', function () {
    if (!window.localStorage.getItem('preloaderIsShown')) {
        $('.preloader').delay(5000).fadeOut('slow');
        var tl = new TimelineMax({yoyo: false});
        tl.to($('.preloader__fill'), 3, {height: '100%'}, 0);
        window.localStorage.setItem('preloaderIsShown', true);
    }  else {
        $('.preloader').css('display', 'none');
    }
});


// $(document).ready(function($) {
//     $(window).load(function() {
//         if (!window.localStorage.getItem('preloaderIsShown')) {
//             var preloader = $('.preloader');
//             setTimeout(function() {
//                 preloader.fadeOut('slow');
//                 window.localStorage.setItem('preloaderIsShown', true);
//             }, 2000);
//         } else {
//             var preloader = $('.preloader');
//
//             preloader.css('display', 'none');
//         }
//     });
// });


