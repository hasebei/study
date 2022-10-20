var win = $(window);
var winT = win.scrollTop();
var dfg = $('.dfg');
var h = $('.h');
var hT = $('.h').offset().top;
var rad = 0;
var angle = 0;

let scrollEvent = () => {
    win.on('scroll', () => {
        angle = angle + 2;
        let winT = win.scrollTop();
        bgFixByScroll(winT);
        objRotate(winT);
    });
}

let bgFixByScroll = (winT) => {
    let scroll = -(winT / 3);
    dfg.css({
        'background-position': '50% ' + scroll + 'px'
    })
}

let objRotate = (winT) => {
    // console.log(angle)
    rad = Math.PI / 180 * angle;
    console.log((winT - hT) / 50);
    h.css({
        transform: 'rotateY(' + ((winT - hT) / 10) + 'deg)'
    })
    // target.css({
    //     ''
    // })
}
$(() => {
    scrollEvent();
})