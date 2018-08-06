$(window).on('load', function () {
    if (!window.localStorage.getItem('preloaderIsShown')) {
        $('.preloader').delay(3000).fadeOut('slow');
        var ctx = document.getElementById('preloader__canvas').getContext('2d');
        var ts0;

        ctx.scale(5,5);
        window.requestAnimationFrame(draw);

        function draw(ts) {
            ctx.save();
            if(!ts0) ts0 = ts;
            const dt = ts - ts0; // milliseconds
            ctx.translate(Math.sin(dt/300)*80, 0.08*( -dt));
            ctx.rotate( Math.sin(dt/800) / 30 );
            ellipse(100,450, 650,550);
            ctx.restore();
            ctx.restore();



            function ellipse(cx, cy, w, h){
                // $('canvas').each(function () {
                ctx.beginPath();
                var lx = cx - w/2,
                    rx = cx + w/2,
                    ty = cy - h/2,
                    by = cy + h/2;
                var magic = 0.5;
                var xmagic = magic*w/2;
                var ymagic = h*magic/2;
                ctx.moveTo(cx,ty);
                ctx.bezierCurveTo(cx+xmagic,ty,rx,cy-ymagic,rx,cy);
                ctx.bezierCurveTo(rx,cy+ymagic,cx+xmagic,by,cx,by);
                ctx.bezierCurveTo(cx-xmagic,by,lx,cy+ymagic,lx,cy);
                ctx.bezierCurveTo(lx,cy-ymagic,cx-xmagic,ty,cx,ty);
                ctx.fillStyle = "#FFB400";
                ctx.fill();
                // });
            }



            window.requestAnimationFrame(draw);
        }
        window.localStorage.setItem('preloaderIsShown', true);
    }  else {
        $('.preloader').css('display', 'none');
    }
});



// $(window).on('load', function () {
//     if (!window.localStorage.getItem('preloaderIsShown')) {
//         $('.preloader').delay(5000).fadeOut('slow');
//         var tl = new TimelineMax({yoyo: false});
//         tl.to($('.preloader__fill'), 3, {height: '100%'}, 0);
//         window.localStorage.setItem('preloaderIsShown', true);
//     }  else {
//         $('.preloader').css('display', 'none');
//     }
// });


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


