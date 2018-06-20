// function openbox(id) {
//     display = document.getElementById(id).style.display;
//
//     if (display == 'none') {
//         document.getElementById(id).style.display = 'block';
//     } else {
//         document.getElementById(id).style.display = 'none';
//     }
// }

//ACTIVE CHECKBOX
// var checkbox = document.getElementsByClassName('pseudo-checkbox');
// checkbox.onclick = "this.style.backgroundColor = '#FFB400'";
// $('.pseudo-checkbox').click($('.pseudo-checkbox').css('background-color','#FFB400'));

function checkboxClick() {
    var checkbox = $('.pseudo-checkbox');
    if (checkbox.css('background-color') !== '#FFB400') {
        checkbox.css('background-color','#FFB400')
    } else if (checkbox.css('background-color') === '#FFB400') {
        checkbox.css('background-color','#5D6C6C')
    }


}

function targetFunc(e) {
if($('#sign-in-popup').css('display') !== 'none') {
    $('#sign-in-popup').css('display', 'none');
}
    if (!$(e.target).closest(".registration").length) {
        $('#sign-up-popup').hide();
    }
    e.stopPropagation();
}

//
// function targetFuncU(e) {
//     if($('#sign-up-popup').css('display') !== 'none') {
//         $('#sign-up-popup').css('display', 'none');
//     }
//     if (!$(e.target).closest(".registration").length) {
//         $('#sign-in-popup').hide();
//     }
//     e.stopPropagation();
// }


//
// $(document).ready(function() {
//     $('#sign-up').click($('#sign-in-popup').css('display', 'flex'));
//     $('#sign-in').click($('#sign-up-popup').css('display', 'flex'));
// });

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
    function updateClock() {
        var t = getTimeRemaining(endtime);
        var clock = document.getElementsByClassName('timer')[0];
        var daysSpan = clock.querySelector('.days');
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');
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


// var phpDays = daysSpan.text();
// var phpHours = hoursSpan.text();
// var phpMinutes = minutesSpan.text();
// var phpSeconds = secondsSpan.text();
var date = $('.timer__days').attr('data');
var time = $('.timer__time').attr('data');
console.log(date);
console.log(time);

var deadline = date + 'T' + time; //CURRENT DEADLINE OF TIMER
// var deadline = '2018-07-17T03:24:00'; //CURRENT DEADLINE OF TIMER
//var deadline = '2015-12-31'; // DEADLINE OF TIMER, TEMPLATE YEAR-MONTH-DAY
//var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000); //when the page is loaded, the timer always displays 15 days

//START THE TIMER
initializeClock(deadline);
