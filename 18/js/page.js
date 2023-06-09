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
        winT = win.scrollTop();
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
    // console.log(hT+'-----------'+ winT);
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
        let image = $('.n__img', item);
        console.log(image.height())
        let centerX = item.width() / 2;
        let centerY = item.height() / 2;
        let rotateY = (e.offsetX - centerX) / 10;
        let rotateX = (e.offsetY - centerY) / 10;
        console.log(centerY +'------------'+ (e.offsetY - centerY))
        // console.log(e.offsetY)
        let rad = Math.PI / 180 * e.offsetY;
        // console.log(Math.sin(rad) * 100 + centerY)
        // console.log(rotateX)
        image.css({
            'transform': 'scale(1.1) rotateY(' + rotateY + 'deg) rotateX(' + rotateX +'deg)'}
        );
    });

    target.on('mouseout', function(e){
        let item = $(this);
        let image = $('.n__img', item);
        
        image.css({ 'transform': 'rotateY(0deg) rotateX(0deg)'})
    })
}

var ct;
var rad02 = 0;
var angle02 = 0;
const imgClip = () =>{
    let container = $('.o');
    let target = $('img:nth-child(2)', container);
    ct = container.offset().top;
    let cp = 'polygon(0 0, 100% 0, 100% 100%, 0% 100%)';
    win.on('scroll', function(e){
        target.css({
            "clip-path": cp
        });
        angle02 += winT - ct;
        rad02 = Math.cos(angle02) * 100;
        let abs = (winT - ct + 100) / 10;
        cp = 'polygon(0 ' + abs + '%, 100% ' + abs +'%, 100% 100%, 0% 100%)'
        if(ct < winT){
        }
    }).trigger('scroll');
}

$(() => {
    scrollEvent();
    itemHover();
    imgClip();
});