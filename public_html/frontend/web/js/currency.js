var currencyLeft = new Image(), currencyRotateLeft = new Image(), currencyRight = new Image(), currencyRotateRight = new Image();

currencyLeft.src = '../images/main/currency-left.gif';
currencyRotateLeft.src = '../images/main/currency-rotate-left.gif';
currencyRight.src = '../images/main/currency-right.gif';
currencyRotateRight.src = '../images/main/currency-rotate-right.gif'

function animateCurrency() {
    var currencyImage = $(".currency__image");

    var tl = new TimelineMax({yoyo:false, repeat:-1});
    var tl1 = new TimelineMax({yoyo:true, repeat:-1,ease: Power1.easeInOut});
    tl
        .to(currencyImage, 0, {attr: {src: currencyLeft.src}}, 0)
        .to(currencyImage, 0, {attr: {src: currencyRotateLeft.src}}, 2)
        .to(currencyImage, 0, {attr: {src: currencyRight.src}}, 2.1)
        .to(currencyImage, 0, {attr: {src: currencyRotateRight.src}}, 4.1)
        .to(currencyImage, 0, {attr: {src: currencyLeft.src}}, 4.2);
    tl1.fromTo(currencyImage, 2.1, {x: '40%', ease: Power1.easeInOut,}, {x: '-40%', ease: Power1.easeInOut,}, 0);
}
