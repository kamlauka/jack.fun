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
//     logo.setAttribute('src', 'dist/images/logo.gif');
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

//ANIMATION LOGO
window.addEventListener('scroll', function () {
    // var scrolled = window.pageYOffset || document.documentElement.scrollTop;
    var logo = $(".logo__picture").first();
    var clouds = $(".clouds").first();
    var cloudBottom = $(".cloud-container_bottom-scale").first();
    var cloudleft = $(".cloud-container_left-big .cloud").first();
    var cloudright = $(".cloud-container_right-big .cloud").first();
    function func() {
        logo.animate({'top': '-14px', 'width': '16%', 'left': '41%'}, 1000);
    }
    function func1() {
        cloudleft.animate({'left': '50%', 'width': '50%'}, 2000);
        cloudright.animate({'right': '50%', 'width': '50%'}, 2000);
        cloudBottom.animate({'top': '-50%'}, 2000);
        clouds.css({'display' : 'none'});
    }
    if($(this).scrollTop() <= ( logo.offset().top)) {
        console.log(logo);
        console.log(clouds);
        logo.attr('src', 'images/common/logo.gif');
        logo.attr('src', 'dist/images/logo.gif');
        cloudBottom.css({'display' : 'block'});
        clouds.animate({'opacity': '0.5'}, 4000);

        setTimeout(func, 1000);
        setTimeout(func1, 700);
    } else {
        logo.attr('src', 'images/common/logo_mobile.png');
        logo.css({'top': '-14px', 'width': '16%', 'left': '41%'});
        cloudBottom.css({'display' : 'none'});
        clouds.css({'display' : 'none'});
    }
    this.removeEventListener('scroll', arguments.callee);
});

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