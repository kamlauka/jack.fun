var logoPosition = $(".logo-mini").first();
var logoContainer = $(".logo__container").first();
var mobileLogo = $(".logo-mini__image").first();
var logo = $(".logo__image").first();
var logoText = $(".logo__text").first();
var clouds = $(".clouds_fixed").first();
var cloudBottom = $(".cloud-container_bottom-scale").first();
var cloudLeft = $(".cloud-container_left-big").first();
var cloudRight = $(".cloud-container_right-big").first();


function editAvatar() {
    $("#user-avatar").click();
}

function animateLogoScroll () {
    // logo.attr('src', '../images/common/logo.gif');
    cloudBottom.css({'display': 'block'});

    var tl = new TimelineMax({yoyo: false, ease: Power0.easeNone});

    tl
        .to(cloudLeft, 2, {left: '26%', width: '130%'}, 0)
        .to(cloudRight, 2, {left: '26%', width: '130%'}, 0)
        .to(cloudBottom, 2, {top: '-7%', width: '130%'}, 0)

        .to(logoPosition, 1, {zIndex: 10000, position: 'fixed'}, 1)
        .fromTo(logoText, 0.5, {opacity: 1}, {opacity: 0, zIndex: 1}, 0.2)

        .to(logo, 3, {width: '140px'}, 0.2)
        .to(logoText, 0.5, {opacity: 1, zIndex: 2}, 1)
        .to(logoContainer, 0.2, {width: '200px'}, 0.7)

        .to(logo, 1, {attr: {src: '../images/common/logo-mini.png'}}, 0.7)

        .to(cloudLeft, 2, {left: '-11%', opacity: 0, width: '90%'}, 1)
        .to(cloudRight, 2, {left: '61%', opacity: 0, width: '90%'}, 1)
        .to(cloudBottom, 2, {top: '27%', opacity: 0, width: '90%'}, 1)


        .to(logoContainer, 0.2, {padding: '5px 0 25px 0'}, 1.3)


        .to(logoContainer, 1.5, {backgroundPosition: 'center'}, 1.5)

        .to(clouds, 0.1, {display: 'none'}, 3.1);
    $("clouds").remove();
}


function mobileBackgroundUnderMenu() {
    if(screen.width<=768) {
        if($('#link-top').prop('checked')) {
            $('#white-background').css('opacity', '1')
            $('#white-background').css('visibility', 'visible');
            $('#white-background').css('transition', 'opacity 1s ease-in-out');

        } else {
            $('#white-background').css('opacity', '0');
            $('#white-background').css('visibility', 'hidden');
            $('#white-background').css('transition', 'opacity 1s ease-in-out, visibility 1s linear 1s');
        }
    }
}

//чекбокс в регистрации: поведение
function checkboxClick() {
    var test = false;
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
    console.log(true);
    $('#link-top').prop('checked', false);
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

function targetMenu(e) {
    if (!$(e.target).closest(".menu>ul").length) {
        $('#link-top').prop('checked', false);
    }
}


//поведение анимации лого на главной



// с какого места начал юзер?
//если с середины страницы, то включаем лого конечное
$(document).ready(function() {
    if($("div").is(".logo__container")) {
        if (window.pageYOffset > 200 || document.body.scrollTop > 200) {
            clouds.css('display', 'none');
            logoPosition.css({'z-index': '10000', 'position': 'fixed'});
            mobileLogo.removeClass("hidden");
            logo.addClass("hidden");
            logoContainer.removeClass("logo__container");
            logoContainer.addClass("logo-mini__container");
        }
        if ($('div').hasClass('popup__configuration')) {
            showForm('.popup__configuration');
        }
        logoText.css('z-index', '8999');
        logoPosition.css('z-index', '2');
        logo.attr('src', '../images/common/logo-mini.png');
        logo.removeClass("logo__image");
        logo.addClass("logo-mini__image");

        animateCurrency();
        }
        else {
            logoPosition.css('z-index', '1');
        }


    // }

    // animateClouds();
    if($("div").is(".disputes__image-container")) {
        animateNotes();
    }

    if ($('div').hasClass('logo__container')||$('div').hasClass('jackpot-flex-gorizontal')) {
        var date = $('.timer__days').attr('data');
        var time = $('.timer__time').attr('data');

        var deadline = date + 'T' + time; //CURRENT DEADLINE OF TIMER
        initializeClock(deadline);
    }



});

//если с начала, то включаем начальное лого и анимируем его
window.addEventListener('scroll', function () {
    if($("div").is(".logo__container")) {
        if ((($(this).scrollTop() <= 200) || (window.pageYOffset < 200)) && logoContainer.hasClass('logo__container')) {
            animateLogoScroll();
        }
        this.removeEventListener('scroll', arguments.callee);
    }
});


$(window).scroll(function() {
    $('#link-top').prop('checked', false);
});


// $(function(){
//     //ajax for editing info
//     $( "#button-edit" ).click(function() {
//
//         $.ajax({
//             type: 'GET',
//             url: '/cabinet/editing',
//             // url: '/cabinet/editing?id=' + $(this).attr("data"),
//             dataType: 'html',
//             success: function (data) {
//
//                 $('#user-info').html('');
//                 $('#user-info').append(data);
//             },
//             error: function () {
//                 console.log('Server error')
//             }
//         });
//     });
//
//     //ajax for editing password
//     $( "#edit-password" ).click(function() {
//         console.log("кнопка сработала");
//         var u ='/cabinet/change-password';
//
//         $.ajax({
//             type: 'GET',
//             url: u ,
//             dataType: 'html',
//             success: function (data) {
//
//                 $('#user-info').html('');
//                 $('#user-info').append(data);
//             },
//
//             error: function () {
//                 console.log('Server error')
//             }
//         });
//     });
// });