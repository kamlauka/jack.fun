$(window).on('load', function () {
    var preloader = $('.preloader');
    var preloaderFill = $('.preloader__fill');
    preloader.delay(5000).fadeOut('slow');
    var tl = new TimelineMax({yoyo:false});
    tl.to(preloaderFill, 3, {height: '100%'},0);
});

//
// jQuery(document).ready(function($) {
//     $(window).load(function() {
//         if (!window.localStorage.getItem('preloaderIsShown')) {
//             setTimeout(function() {
//                 $('#preloader').fadeOut('slow');
//                 window.localStorage.setItem('preloaderIsShown', true);
//             }, 2000);
//         } else {
//             $('#preloader').css('display', 'none');
//         }
//     });
// });


//canvas
//
// var canvas = document.getElementById('canvas');
// var ctx = canvas.getContext('2d');
// var mainCloud = new Image();
// mainCloud.src="..//images/common/cl1.png";
// var animateCloud1 = new Image();
// animateCloud1.src="..//images/common/cl2.png";
// var animateCloud2 = new Image();
// animateCloud2.src="..//images/common/cl3.png";
// animateCloud2.onload = function() {
//     ctx.drawImage(animateCloud2, 0,0,100,200);
// };
// animateCloud1.onload = function() {
//     ctx.drawImage(animateCloud1, 0,0,200,300);
// };
// mainCloud.onload = function() {
//     ctx.drawImage(mainCloud, 0,0,200,300);
// };
//
//
// // c.fillStyle = "red";
// // c.fillRect(100,100,400,300);