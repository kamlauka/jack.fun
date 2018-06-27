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
var test = false;


function mobileBackgroundUnderMenu() {
    console.log($('#link-top').prop('checked'));
    if($('#link-top').prop('checked')) {
        $('#white-background').css('opacity', '1')
        $('#white-background').css('visibility', 'visible');

    } else {
        $('#white-background').css('opacity', '0');
        $('#white-background').css('visibility', 'hidden');
        $('#white-background').css('transition', 'opacity 1s ease-in-out, visibility 1s ease-in-out 1s');
    }
}

function checkboxClick() {
    console.log(test);
    if (test === false) {
        $('.pseudo-checkbox').css('background-color','#FFB400');
        test = true;
        console.log(test);
    } else {
        $('.pseudo-checkbox').css('background-color','#5D6C6C');
        test = false;
        console.log(test);
    }
}

//Вызов попапа с какой-либо формой
function showForm(activeForm, hideForm) {
    $('.forms').css('display', 'flex');
    $(activeForm).css('display', 'block');
    if($(hideForm).css('display') !== 'none') {
        $(hideForm).css('display', 'none');
    }
}

//При клике на затемнение, форма закрывается
function targetFunc(e) {
    if (!$(e.target).closest(".popup").length) {
        $(".forms").hide();
    }
    e.stopPropagation();
}




//При клике на затемнение, форма закрывается
function targetFunc(e) {
    if (!$(e.target).closest(".popup").length) {
        $(".forms").hide();
    }
    e.stopPropagation();
}



var logoContainer = $(".logo__container").first();
var logo = $(".logo__image").first();
var clouds = $(".clouds_fixed").first();
var cloudBottom = $(".cloud-container_bottom-scale").first();
var cloudLeft = $(".cloud-container_left-big").first();
var cloudRight = $(".cloud-container_right-big").first();


$(document).ready(function() {
    if (window.pageYOffset > 100) {
        logoContainer.removeClass("logo__container");
        logoContainer.addClass("logo-mini__container");
        logo.attr('src', '../images/common/logo-mini.png');
        logo.removeClass("logo__image");
        logo.addClass("logo-mini__image");

        clouds.css('display', 'none');
    }
});

window.addEventListener('scroll', function () {
    if(($(this).scrollTop() <= logo.offset().top) && (window.pageYOffset < 100)) {
        logo.attr('src', '../images/common/logo.gif');
        cloudBottom.css({'display' : 'block'});
        tl = new TimelineMax({yoyo:false});
        tl.to(cloudLeft, 1, {left: '26%', opacity: 0.6},0).to (cloudLeft, 1 , { left : '-11%', opacity: 0 },1);
        tl.to(cloudRight, 1, {left: '26%', opacity: 0.6},0).to (cloudRight, 1 , { left : '61%', opacity: 0 },1);
        tl.to(cloudBottom, 1, {top: '-7%', opacity: 0.6},0).to (cloudBottom, 1 , { top : '27%', opacity: 0 },1);

        tl.to(logoContainer, 1,
            {
                width: '200px',
                minWidth: '200px',
                padding: '5px 0 0',
            },1.2);
        tl.to(logo, 1, {width: '140px'},1.2);
        tl.to(logoContainer, 1, {backgroundPosition: 'center'},1.5);
        tl.to(clouds, 0.1, {display: 'none'},1.2);

        // clouds.animate({'opacity': '0'}, 4000);

        // setTimeout(func, 1000); {backgroundImage: 'url(../images/common/logo-substrate.png)', backgroundRepeat: ' no-repeat', backgroundSize: 'contain', backgroundPosition: 'center -800px'}

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

var date = $('.timer__days').attr('data');
var time = $('.timer__time').attr('data');
console.log(date);
console.log(time);

var deadline = date + 'T' + time; //CURRENT DEADLINE OF TIMER

//START THE TIMER
initializeClock(deadline);
