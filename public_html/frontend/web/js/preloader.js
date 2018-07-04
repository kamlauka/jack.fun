$(window).on('load', function () {
    var preloader = $('.preloader');
    var preloaderFill = $('.preloader__fill');
    preloader.delay(5000).fadeOut('slow');
    var tl = new TimelineMax({yoyo:false});
    tl.to(preloaderFill, 3, {height: '100%'},0);
});

