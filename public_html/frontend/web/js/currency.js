

function animateNotes() {
    var currency = $(".currency__image");

    var tl = new TimelineMax({yoyo:true, repeat:-1,ease: Sine.easeInOut,});

    tl.fromTo(currency, 2.05, {x: '45%', ease: Sine.easeInOut,}, {x: '-45%', ease: Sine.easeInOut,}, 0);
    // tl.to(currency, 0.5, {x: '50%', ease: Back.easeInOut.config(1.7)}, 0.5);
}
