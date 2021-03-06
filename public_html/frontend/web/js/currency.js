

function animateCurrency() {
    var currencyImage = $(".currency__image");
    var currency = $(".currency");

    var tl = new TimelineMax({yoyo:false, repeat:-1});
    var tl1 = new TimelineMax({yoyo:true, repeat:-1,ease: Power1.easeInOut});
    // currencyImage.attr('src', '../images/main/currency-right.gif');
    tl
        .to(currencyImage, 0, {attr: {src: '../images/main/currency-left.gif'}}, 0)
        .to(currencyImage, 0, {attr: {src: '../images/main/currency-rotate-left.gif'}}, 2)
        .to(currencyImage, 0, {attr: {src: '../images/main/currency-right.gif'}}, 2.1)
        .to(currencyImage, 0, {attr: {src: '../images/main/currency-rotate-right.gif'}}, 4.1)
        .to(currencyImage, 0, {attr: {src: '../images/main/currency-left.gif'}}, 4.2);


    tl1.fromTo(currencyImage, 2.1, {x: '40%', ease: Power1.easeInOut,}, {x: '-40%', ease: Power1.easeInOut,}, 0);

    // tl.to(currency, 0.5, {x: '50%', ease: Back.easeInOut.config(1.7)}, 0.5);
}
