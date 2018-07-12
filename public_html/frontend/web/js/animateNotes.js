//поведение ноток
function animateNotes() {
    var note1 = $(".note1");
    var note2 = $(".note2");
    var note3 = $(".note3");
    var note4 = $(".note4");

    var tl2 = new TimelineMax({yoyo:true, repeat:-1, ease: Back.easeInOut.config(1.7)});

    tl2.to(note1, 0.5, {y: -10, ease: Back.easeInOut.config(1.7)}, 0);
    tl2.to(note1, 0.5, {y: 0, ease: Back.easeInOut.config(1.7)}, 0.5);
    tl2.to(note2, 0.5, {y: -10, ease: Back.easeInOut.config(1.7)}, 0.5);
    tl2.to(note2, 0.5, {y: 0,ease: Back.easeInOut.config(1.7)}, 1);
    tl2.to(note3, 0.5, {y: -10,ease: Back.easeInOut.config(1.7)}, 1);
    tl2.to(note3, 0.5, {y: 0,ease: Back.easeInOut.config(1.7)}, 1.5);
    tl2.to(note4, 0.5, {y: -10,ease: Back.easeInOut.config(1.7)}, 1.5);
    tl2.to(note4, 0.5, {y: 0,ease: Back.easeInOut.config(1.7)}, 0);
}