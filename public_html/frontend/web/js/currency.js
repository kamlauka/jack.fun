

function animateCurrency() {
    var currency = $(".currency__image");

    var tl = new TimelineMax({yoyo:true, repeat:-1,ease: Power1.easeInOut,});

    tl.fromTo(currency, 2.2, {x: '701px', ease: Power1.easeInOut,}, {x: '-701px', ease: Power1.easeInOut,}, 0);
    // tl.to(currency, 0.5, {x: '50%', ease: Back.easeInOut.config(1.7)}, 0.5);
}
