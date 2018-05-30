// function openbox(id) {
//     display = document.getElementById(id).style.display;
//
//     if (display == 'none') {
//         document.getElementById(id).style.display = 'block';
//     } else {
//         document.getElementById(id).style.display = 'none';
//     }
// }

// window.onscroll = function() {
//
// }

// var marker = true;
//
// function count() {
//     var scrolled = window.pageYOffset || document.documentElement.scrollTop;
//     var logo = document.getElementsByClassName('logo__picture')[0];
//     var clouds = document.getElementsByClassName('clouds')[0];
//     console.log(logo);
//     console.log(clouds);
//     logo.setAttribute('src', 'dist/img/logo.gif');
//     clouds.style.display = 'block';
//     marker = false;
// }
//
// $( window ).on('scroll', function () {
//     if ( $( window ).scrollTop() > logo.offset().top - $( window ).height() * 0.5 ) {
//         if ( marker ) {
//             count();
//         }
//     }
// });


window.addEventListener('scroll', function () {
    // var scrolled = window.pageYOffset || document.documentElement.scrollTop;
    var logo = $(".logo__picture").first();
    var clouds = $(".clouds").first();
    var cloudBottom = $(".cloud-container_bottom-scale").first();
    var cloudleft = $(".cloud-container_left-big .cloud").first();
    var cloudright = $(".cloud-container_right-big .cloud").first();
    function func() {
        // clouds.css({'display' : 'none'});
        logo.animate({'top': '-20', 'width': '20%', 'left': '39%'}, 1000);
        // logo.css({'animation': 'totop 2s 0.5s linear'});
    }
    function func1() {
        cloudleft.animate({'left': '50%', 'width': '50%'}, 2000);
        cloudright.animate({'right': '50%', 'width': '50%'}, 2000);
        cloudBottom.animate({'top': '-50%'}, 2000);
        clouds.css({'display' : 'none'});
    }
    if($(this).scrollTop() <= logo.offset().top) {
        console.log(logo);
        console.log(clouds);
        logo.attr('src', 'dist/img/logo.gif');
        cloudBottom.css({'display' : 'block'});
        clouds.animate({'opacity': '0.5'}, 4000);

        setTimeout(func, 1000);
        setTimeout(func1, 700);
    }
    this.removeEventListener('scroll', arguments.callee);
});

// $("div.bigBlock").first()
//TIMER

function getTimeRemaining(endtime) {
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    };
}

function initializeClock(endtime) {
    var clock = document.getElementsByClassName('timer')[0];
    var daysSpan = clock.querySelector('.days');
    var hoursSpan = clock.querySelector('.hours');
    var minutesSpan = clock.querySelector('.minutes');
    var secondsSpan = clock.querySelector('.seconds');

    function updateClock() {
        var t = getTimeRemaining(endtime);

        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

        if (t.total <= 0) {
            clearInterval(timeinterval);
        }
    }

    updateClock();
    var timeinterval = setInterval(updateClock, 1000);
}

var deadline = '2018-07-17T03:24:00'; //CURRENT DEADLINE OF TIMER
//var deadline = '2015-12-31'; // DEADLINE OF TIMER, TEMPLATE YEAR-MONTH-DAY
//var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000); //when the page is loaded, the timer always displays 15 days

//START THE TIMER
initializeClock(deadline);



// /* === Don't allow the use of undefined variables === */
// "use strict";
//
// /* === Declare our canvas and context === */
// var canvas = document.querySelector('canvas');
// var c = canvas.getContext('2d');
//
// /* === Set the canvas to full screens === */
// function setCanvasSize() {
//     canvas.height = document.getElementById('canvas-wrapper').offsetHeight;
//     canvas.width  = document.getElementById('canvas-wrapper').clientWidth;
// }
//
// /* === Run the function that sets the canvas to 100% width and height of parent === */
// setCanvasSize();
//
// /* === On window resize resize the canvas so it's still full size === */
// window.addEventListener('resize', function() {
//     setCanvasSize();
// }, false);
//
// var colorArray = [
//     '#264653',
//     '#2a9d8f',
//     '#e9c46a',
//     '#f4a261',
//     '#e76f51',
// ];
//
// // This object-oriented function generates new circles when called
// function Circle(x, y, dx, dy, radius,opacity) {
//     this.x = x;
//     this.y = y;
//     this.dx = dx;
//     this.dy = dy;
//     this.radius = radius;
//     this.opacity = opacity;
//     this.color = colorArray[Math.floor(Math.random() * colorArray.length)];
//
//     // Draws the circles onto the canvas
//     this.draw = function() {
//         c.beginPath();
//         c.fillStyle = this.color;
//         c.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
//         c.globalAlpha = this.opacity;
//         c.fill();
//     }
//
//     // This updates the position of the circles
//     this.update = function() {
//         // If the circle reaches the horizontal edge, reverse the velocity so it 'bounces'
//         if( this.x + this.radius > canvas.width || this.x - this.radius < 0 ) {
//             this.dx = -this.dx;
//         }
//
//         // If the circle reaches the vertical edge, reverse the velocity so it 'bounces'
//         if( this.y + this.radius > canvas.height || this.y - this.radius < 0 ) {
//             this.dy = -this.dy;
//         }
//
//         // If the window is resized and the circle ends up off of the page, move it to the nearest on-screen point
//         if( this.x > (canvas.width - this.radius * 2) + this.radius ) {
//             this.x = (canvas.width - this.radius * 2) + this.radius;
//         }
//         if( this.y > (canvas.height - this.radius * 2) + this.radius ) {
//             this.y = (canvas.height - this.radius * 2) + this.radius;
//         }
//
//         this.x += this.dx;
//         this.y += this.dy;
//
//         this.draw();
//     }
// }
//
// var circleArray = [];
//
// for( var i = 0; i < 350; i++ ) {
//     // Circle radius
//     var radius = Math.random() * 35 + 10;
//     this.radius +=1;
//     // Start the circle somewhere random on the screen
//     var x = Math.random() * (canvas.width - radius * 2) + radius;
//     var y = Math.random() * (canvas.height - radius * 2) + radius;
//
//     // Set a random velocity for the x and y direction
//     var dx = ( Math.random() - 0.5 ) * 4;
//     var dy = ( Math.random() - 0.5 ) * 4;
//     var random = Math.random();
//
//     // Create a new circle using our values
//     circleArray.push(new Circle(x,y,dx,dy, radius, random));
// }
//
// function animateCircle() {
//     requestAnimationFrame(animateCircle);
//
//     c.clearRect(0,0,innerWidth,innerHeight);
//
//     for( var i = 0; i < circleArray.length; i++ ) {
//         circleArray[i].update();
//     }
// }
//
// animateCircle();