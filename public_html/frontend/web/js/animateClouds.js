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
}