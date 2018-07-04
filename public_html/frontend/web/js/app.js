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

//чекбокс в регистрации: поведение
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
function showForm(activeForm) {
    $('#link-top').attr('checked', false);
    $('.forms').css('display', 'flex');
    var kids = $('.forms__popup').children();
    kids.css('display', 'none');
    $(activeForm).css('display', 'block');
}

//При клике на затемнение, форма закрывается
function targetFunc(e) {
    if (!$(e.target).closest(".popup").length) {
        $(".forms").hide();
    }
    e.stopPropagation();
}


//поведение анимации лого на главной

var logoPosition = $(".logo-mini").first();
var logoContainer = $(".logo__container").first();
var mobileLogo = $(".logo-mini__image").first();
var logo = $(".logo__image").first();
var logoText = $(".logo__text").first();
var clouds = $(".clouds_fixed").first();
var cloudBottom = $(".cloud-container_bottom-scale").first();
var cloudLeft = $(".cloud-container_left-big").first();
var cloudRight = $(".cloud-container_right-big").first();

// с какого места начал юзер?
//если с середины страницы, то включаем лого конечное
$(document).ready(function() {
    if (window.pageYOffset > 200 || document.body.scrollTop > 200) {
        clouds.css('display', 'none');
        logoPosition.css({'z-index': '10000', 'position': 'fixed'});
        mobileLogo.removeClass("hidden");
        logo.addClass("hidden");
        logoContainer.removeClass("logo__container");
        logoContainer.addClass("logo-mini__container");
    }
    if ($(div).hasClass('popup__configuration')) {
        showForm('.popup__configuration');

    } else {
        console.log('no form configurations');
    }
        // logoText.css('z-index', '8999');
        // logoPosition.css('z-index', '2');
        // logo.attr('src', '../images/common/logo-mini.png');
        // logo.removeClass("logo__image");
        // logo.addClass("logo-mini__image");
    // }
        // else {
    //     console.log('window' + window.pageYOffset +'body' + document.body.scrollTop + 'raznoe' + window.pageYOffset + 'i' + document.documentElement.scrollTop)
    //     logoPosition.css('z-index', '1');
    // }
    animateClouds();
    animateNotes();
});
//если с начала, то включаем начальное лого и анимируем его
window.addEventListener('scroll', function () {
    //logo.offset().top
    if((($(this).scrollTop() <= 200) || (window.pageYOffset < 200)) && logoContainer.hasClass('logo__container')) {
        logo.attr('src', '../images/common/logo.gif');
        cloudBottom.css({'display' : 'block'});
        tl = new TimelineMax({yoyo:false});
        tl.fromTo(cloudLeft, 2, {opacity: 0.7}, {left: '26%', opacity: 1, width: '130%'},0).to (cloudLeft, 2, { left : '-11%', opacity: 0, width: '90%' },1);
        tl.fromTo(cloudRight, 2, {opacity: 0.7}, {left: '26%', opacity: 1, width: '130%'},0).to (cloudRight, 2, { left : '61%', opacity: 0, width: '90%'  },1);
        tl.fromTo(cloudBottom, 2, {opacity: 0.7}, {top: '-7%', opacity: 1, width: '130%'},0).to (cloudBottom, 2, { top : '27%', opacity: 0, width: '90%'  },1);
        // tl.to(logoText, 2, {zIndex: 8999},0.2);
        tl.to(logoPosition, 1, {zIndex: 10000, position: 'fixed'},0.2);

        tl.to(logoContainer, 1,
            {
                width: '200px',
                minWidth: '200px',
                padding: '5px 0 0',
                // position: 'fixed',
            },1.2);
        tl.to(logo, 1, {width: '140px'},1.2);
        tl.to(logoContainer, 1, {backgroundPosition: 'center'},1.5);
        tl.to(clouds, 0.1, {display: 'none'},3.1);
        // tl.to(logoPosition, 0.1, {zIndex: '2'},1.7);
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
    // tl3.fromTo(cloud3, 1, {rotation:0, transformOrigin:"0 0", ease: Power1.easeInOut}, {rotation:-0.5, ease: Power1.easeInOut}, 'edge');
    //     tl.to(cloud,12,{rotation:1,transformOrigin:"50% 10px",ease:Linear.easeNone})
    //     tl.to(".cloud",12,{rotation:-1,ease:Linear.easeNone},0);
}

//поведение ноток
function animateNotes() {
    var note1 = $(".note1");
    var note2 = $(".note2");
    var note3 = $(".note3");
    var note4 = $(".note4");


    var tl1 = new TimelineMax({yoyo:true, repeat:-1, ease: Power0.easeNone});
    var tl2 = new TimelineMax({yoyo:true, repeat:-1, ease: Back.easeInOut.config(1.7)});
    tl1.to(note1, 1, {rotation:-20, ease: Power0.easeNone}, 'edge');
    tl1.to(note2, 1, {rotation:20, ease: Power0.easeNone}, 'edge');
    tl1.to(note3, 1, {rotation:-20, ease: Power0.easeNone}, 'edge');
    tl1.to(note4, 1, {rotation:20, ease: Power0.easeNone}, 'edge');

    tl2.to(note1, 0.5, {y: -20}, 0);
    tl2.to(note1, 0.5, {y: 0}, 1);
    tl2.to(note2, 0.5, {y: -20}, 2);
    tl2.to(note2, 0.5, {y: 0}, 2);
    tl2.to(note3, 0.5, {y: -20}, 3);
    tl2.to(note3, 0.5, {y: 0}, 3);
    tl2.to(note4, 0.5, {y: -20}, 4);
}