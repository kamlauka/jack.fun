//поведение облаков
function animateClouds() {
    //Animate clouds
    var cloud = $(".cloud-container");
    var cloud1 = $(".cloud__cloud1");
    var cloud2 = $(".cloud__cloud2");
    var cloud3 = $(".cloud__cloud3");


    var tl = new TimelineMax({yoyo:true, repeat:-1, ease: Power1.easeInOut});
    var tl2 = new TimelineMax({yoyo:true, repeat:-1, ease: Power1.easeInOut});
    var tl3 = new TimelineMax({yoyo:true, repeat:-1, ease: Power1.easeInOut});

    tl.fromTo(cloud1, 3, {rotation:1, transformOrigin:"50% 50%", ease: Power1.easeInOut}, {rotation:-1, ease: Power1.easeInOut}, 'edge');
    tl2.fromTo(cloud2, 2, {rotation:1,transformOrigin:"50% 50%", ease: Power1.easeInOut}, {rotation:-1, ease: Power1.easeInOut}, 'edge');
}
//
// canvas

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
// c.fillStyle = "red";
// c.fillRect(100,100,400,300);




var cloud = new Image();

var ctx = document.getElementById('canvas').getContext('2d');

var bodySize = document.body.getBoundingClientRect();
canvas.setAttribute('width', document.documentElement.clientWidth*0.8);
canvas.setAttribute('height', document.documentElement.clientWidth * 0.6);


function init(){
    cloud.src = '..//images/common/cl1.png';

    window.requestAnimationFrame(draw);
}

var ts0;
function draw(ts) {
    ctx.globalCompositeOperation = 'destination-over';
    ctx.clearRect(0,0,canvas.width,canvas.height);
    ctx.fillStyle = 'rgba(0,0,0,0.4)';
    ctx.strokeStyle = 'rgba(0,153,255,0.4)';
    ctx.save();

    // cloud
    if(!ts0) ts0 = ts;
    const dt = ts - ts0; // milliseconds

    ctx.translate(500, 180 + Math.sin(dt/352)*3);
    ctx.rotate( Math.sin(dt/630) / 40 );
    ctx.scale(1.8, 1.8);
    ctx.drawImage(cloud,-290,-100);
    ctx.restore();

    window.requestAnimationFrame(draw);
}

init();



/*
* var cloud = new Image();
function init(){
    cloud.src = '..//images/common/cl1.png';
    window.requestAnimationFrame(draw);
}

function draw() {
    var ctx = document.getElementById('canvas').getContext('2d');

    ctx.globalCompositeOperation = 'destination-over';
    ctx.clearRect(0,0,200,300); // clear canvas

    ctx.fillStyle = 'rgba(0,0,0,0.4)';
    ctx.strokeStyle = 'rgba(0,153,255,0.4)';
    ctx.save();
    ctx.translate(150,150);

    // cloud
    var time = new Date();
    ctx.rotate( ((2*Math.PI)/60)*time.getSeconds() + ((2*Math.PI)/60000)*time.getMilliseconds() );

    ctx.drawImage(cloud,-12,-12);
    ctx.restore();

    window.requestAnimationFrame(draw);
}

init();*/


//поведение облаков
function animateClouds() {
    //Animate clouds
    var cloud = $(".cloud-container");
    var cloud1 = $(".cloud__cloud1");
    var cloud2 = $(".cloud__cloud2");
    var cloud3 = $(".cloud__cloud3");


    var tl = new TimelineMax({yoyo:true, repeat:-1, ease: Power1.easeInOut});
    var tl2 = new TimelineMax({yoyo:true, repeat:-1, ease: Power1.easeInOut});
    var tl3 = new TimelineMax({yoyo:true, repeat:-1, ease: Power1.easeInOut});

    tl.fromTo(cloud1, 3, {rotation:1, transformOrigin:"50% 50%", ease: Power1.easeInOut}, {rotation:-1, ease: Power1.easeInOut}, 'edge');
    tl2.fromTo(cloud2, 2, {rotation:1,transformOrigin:"50% 50%", ease: Power1.easeInOut}, {rotation:-1, ease: Power1.easeInOut}, 'edge');
}


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
// c.fillStyle = "red";
// c.fillRect(100,100,400,300);



function resizeGame() {
    var gameArea = document.getElementById('gameArea');
    var widthToHeight = 4 / 3;
    var newWidth = window.innerWidth;
    var newHeight = window.innerHeight;
    var newWidthToHeight = newWidth / newHeight;

    if (newWidthToHeight > widthToHeight) {
        newWidth = newHeight * widthToHeight;
        gameArea.style.height = newHeight + 'px';
        gameArea.style.width = newWidth + 'px';
    } else {
        newHeight = newWidth / widthToHeight;
        gameArea.style.width = newWidth + 'px';
        gameArea.style.height = newHeight + 'px';
    }

    gameArea.style.marginTop = (-newHeight / 2) + 'px';
    gameArea.style.marginLeft = (-newWidth / 2) + 'px';

    var gameCanvas = document.getElementById('gameCanvas');
    gameCanvas.width = newWidth;
    gameCanvas.height = newHeight;
}

var cloud = new Image();
var cloud2 = new Image();
var cloud3 = new Image();
var cloud4 = new Image();

var ctx = document.getElementById('canvas').getContext('2d');

var bodySize = document.body.getBoundingClientRect();
canvas.setAttribute('width', document.documentElement.clientWidth*0.8);
canvas.setAttribute('height', document.documentElement.clientWidth * 0.6);


function init(){
    cloud.src = '..//images/common/cl1.png';
    // cloud2.src = '..//images/common/cl2.png';
    // cloud3.src = '..//images/common/cl3.png';
    // cloud4.src = '..//images/common/cl4.png';

    window.requestAnimationFrame(draw);
}

var ts0;
function draw(ts) {
    ctx.globalCompositeOperation = 'destination-over';
    ctx.clearRect(0,0,canvas.width,canvas.height);
    ctx.save();

    // cloud
    if(!ts0) ts0 = ts;
    const dt = ts - ts0; // milliseconds

    ctx.translate(500, 180 + Math.sin(dt/352)*3);
    ctx.rotate( Math.sin(dt/630) / 40 );
    ctx.scale(1.7, 1.7);
    ctx.drawImage(cloud,-290,-100);
    // ctx.drawImage(cloud2,-290,-100);
    // ctx.drawImage(cloud3,-290,-100);
    // ctx.drawImage(cloud4,-290,-100);
    ctx.restore();

    window.requestAnimationFrame(draw);
}

init();



// var cloud = new Image();
//
//
// var ctx = document.getElementById('canvas').getContext('2d');
//
// var bodySize = document.body.getBoundingClientRect();
// canvas.setAttribute('width', document.documentElement.clientWidth*0.8);
// canvas.setAttribute('height', document.documentElement.clientWidth * 0.6);
//
//
// function init(){
//     cloud.src = '..//images/common/cl1.png';
//     cloud.width = canvas.width;
//
//     window.requestAnimationFrame(draw);
// }
//
// var ts0;
// function draw(ts) {
//     ctx.globalCompositeOperation = 'destination-over';
//     ctx.clearRect(0,0,canvas.width,canvas.height);
//     ctx.save();
//
//     // cloud
//     if(!ts0) ts0 = ts;
//     const dt = ts - ts0; // milliseconds
//
//     ctx.translate(500, 180 + Math.sin(dt/352)*3);
//     ctx.rotate( Math.sin(dt/630) / 40 );
//     ctx.scale(1.7, 1.7);
//     ctx.drawImage(cloud,-290,-100);
//
//     ctx.restore();
//
//     window.requestAnimationFrame(draw);
// }
//
// init();

