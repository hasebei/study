var win   = $(window);
var winT  = win.scrollTop();
var dfg   = $('.dfg');
var dfgT  = $('.dfg').offset().top;;
var h     = $('.h');
var hT    = $('.h').offset().top;
var hH    = $('.h').outerHeight();
var i     = $('.i');
var iT    = $('.i').offset().top;
var rad   = 0;
var angle = 0;

let scrollEvent = () => {
    win.on('scroll', () => {
        angle = angle + 5;
        let winT = win.scrollTop();
        bgFixByScroll(winT);
        objRotate(winT);
    }).trigger('scroll');
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
    // console.log(Math.cos(rad) * 100);
    console.log(hT+'-----------'+ winT);
    // console.log(iT + '-----------' + winT);
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

const itemHover = () => {
    let target = $('.n__item');
    target.on('mousemove', function(e){
        let item = $(this);
        let rad = Math.PI / 180 * (e.offsetY)
        let sin = Math.sin(rad) * 20;
        let cos = Math.cos(rad) * 20;
        console.log(cos)
        item.css({ 'transform': 'scale(1.2) rotateY(' + sin +'deg) rotateX(' + cos +'deg)'})
    });
    target.on('mouseout', function(e){
        let item = $(this);
        item.css({ 'transform': 'rotateY(0deg) rotateX(0deg)'})
    })
}
$(() => {
    scrollEvent();
    itemHover();
});