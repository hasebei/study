var win   = $(window);
var winT  = win.scrollTop();
var dfg   = $('.dfg');
var dfgT  = $('.dfg').offset().top;;
var h     = $('.h');
var hT    = $('.h').offset().top;
var rad   = 0;
var angle = 0;

let scrollEvent = () => {
    win.on('scroll', () => {
        angle = angle + 5;
        let winT = win.scrollTop();
        bgFixByScroll(winT);
        objRotate(winT);
    });
}

let bgFixByScroll = (winT) => {
    // let scroll = -(winT - dfgT);
    let scroll = -(winT / 3);
    dfg.css({
        'background-position': '50% ' + scroll + 'px'
    })
}

let objRotate = (winT) => {
    // console.log(angle)
    rad = Math.PI / 180 * angle ;
    console.log(Math.cos(rad) * 100);
    if (hT < winT){
        h.css({
            // transform: 'rotateY(' + ((winT - hT) / 10) + 'deg)'
            transform: 'rotateY(' + ((Math.cos(rad) * 90)) + 'deg)'
        });
    }else{
        h.css({
            transform: 'rotateY(0)'
        });
        
    }
    // target.css({
    //     ''
    // })
}

$(() => {
    scrollEvent();
});