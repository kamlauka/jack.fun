// // //поведение облаков с помощью gsap
// // function animateClouds() {
// //     //Animate clouds
// //     var cloud = $(".cloud-container");
// //     var cloud1 = $(".cloud__cloud1");
// //     var cloud2 = $(".cloud__cloud2");
// //     var cloud3 = $(".cloud__cloud3");
// //
// //
// //     var tl = new TimelineMax({yoyo:true, repeat:-1, ease: Power1.easeInOut});
// //     var tl2 = new TimelineMax({yoyo:true, repeat:-1, ease: Power1.easeInOut});
// //     var tl3 = new TimelineMax({yoyo:true, repeat:-1, ease: Power1.easeInOut});
// //
// //     tl.fromTo(cloud1, 3, {rotation:1, transformOrigin:"50% 50%", ease: Power1.easeInOut}, {rotation:-1, ease: Power1.easeInOut}, 'edge');
// //     tl2.fromTo(cloud2, 2, {rotation:1,transformOrigin:"50% 50%", ease: Power1.easeInOut}, {rotation:-1, ease: Power1.easeInOut}, 'edge');
// // }
//
//
//
// 'use strict'
// var canvases = document.getElementsByClassName('canvas');
var cloud = new Image();
var ctx = [];
var ts0;
var canvasSize = document.documentElement.clientWidth;
var time, dt;

function timeForAnimation() {
    time = new Date();
    if(!ts0) ts0 = time;
    dt = time - ts0; // milliseconds
}


$('canvas').each(function(i,elem) {
    ctx[i] = elem.getContext('2d');
    function draw() {


        ctx[i].clearRect(0,0,canvasSize,canvasSize);
        ctx[i].save();
        // cloud



        timeForAnimation();
        ctx[i].translate(50, 50 + Math.sin(dt/500)/20);
        ctx[i].rotate( Math.sin(dt/340) / 200 );

        ctx[i].drawImage(cloud,0,0, canvasSize*0.95, canvasSize*0.97);
        ctx[i].restore();
        ctx[i].save();
        ctx[i].translate(5, 0 + Math.sin(dt/382)*2);
        ctx[i].rotate( Math.sin(dt/630) / 40 );
        // ctx.drawImage(cloud2,150,100,canvasSize*0.84, canvasSize*0.84);
        // ctx.restore();

        // ctx.save();
        // ctx.translate(8, 150 + Math.sin(dt/198)*3);
        // ctx.rotate( Math.sin(dt/500) / 450 );
        // ctx.drawImage(cloud3,0,0, canvasSize*0.7, canvasSize*0.7);
        ctx[i].restore();
        ctx[i].restore();
        window.requestAnimationFrame(draw);

    }
    function init(elem){

        var t0 = performance.now();

        cloud.src = '../../../images/common/cloud.png';
        // cloud2.src= 'http://i.imgur.com/y3JAe69.png';
        // cloud3.src= 'http://i.imgur.com/v30JIWp.png';
        elem.setAttribute('width', canvasSize);
        elem.setAttribute('height', canvasSize);
        window.requestAnimationFrame(draw);
        var t1 = performance.now();
        console.log("Call to doSomething took " + (t1 - t0) + " milliseconds.");
    }


    init(elem);

});
//
//
//
// // //many clouds in one cloud
// // var cloud = new Image(), cloud2 = new Image(), cloud3 = new Image();
// // var canvases = document.getElementsByClassName('canvas');
// // var ts0;
// // var canvasSize = document.documentElement.clientWidth;
// //
// //
// // for(let i = 0; i < canvases.length; i++) {
// //     let ctx = canvases[i].getContext('2d');
// //     function draw(ts) {
// //         ctx.clearRect(0,0,canvasSize,canvasSize);
// //
// //         ctx.save();
// //         // cloud
// //         if(!ts0) ts0 = ts;
// //         const dt = ts - ts0; // milliseconds
// //
// //         ctx.translate(50, 50 + Math.sin(dt/500)/20);
// //         ctx.rotate( Math.sin(dt/340) / 200 );
// //
// //         ctx.drawImage(cloud,0,0, canvasSize*0.95, canvasSize*0.95);
// //         ctx.restore();
// //         ctx.save();
// //         ctx.translate(5, 0 + Math.sin(dt/382)*2);
// //         ctx.rotate( Math.sin(dt/630) / 40 );
// //         ctx.drawImage(cloud2,150,100,canvasSize*0.84, canvasSize*0.84);
// //         ctx.restore();
// //
// //         ctx.save();
// //         ctx.translate(8, 150 + Math.sin(dt/198)*3);
// //         ctx.rotate( Math.sin(dt/500) / 450 );
// //         ctx.drawImage(cloud3,0,0, canvasSize*0.7, canvasSize*0.7);
// //         ctx.restore();
// //         ctx.restore();
// //         window.requestAnimationFrame(draw);
// //     }
// //
// //     function init(){
// //         cloud.src = 'http://i.imgur.com/GigS3KR.png';
// //         cloud2.src= 'http://i.imgur.com/y3JAe69.png';
// //         cloud3.src= 'http://i.imgur.com/v30JIWp.png';
// //         canvases[i].setAttribute('width', canvasSize);
// //         canvases[i].setAttribute('height', canvasSize);
// //         window.requestAnimationFrame(draw);
// //     }
// //
// //     init();
// // }
