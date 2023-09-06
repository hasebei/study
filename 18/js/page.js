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
        listMove()
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
    let target = $('.n__img');
    target.on('mousemove', function(e){
        let item = $(this);
        // console.log(item.height())
        let centerX = item.width() / 2;
        let centerY = item.height() / 2;
        let rotateY = (e.offsetX - centerX) / 7;
        let rotateX = (e.offsetY - centerY) / 7;
        // console.log(e.offsetY + centerY)
        // console.log(item.height())
        // console.log(e.offsetY)
        let rad = Math.PI / 180 * item.height();
        // console.log(Math.sin(rad))
        // console.log(rotateX)
        item.css({
            'transform': 'scale(1.1) rotateY(' + rotateY + 'deg) rotateX(' + rotateX +'deg)'}
        );
    });

    target.on('mouseout', function(e){
        let item = $(this);
        let image = $('.n__img', item);
        
        image.css({ 'transform': 'rotateY(0deg) rotateX(0deg)'})
    })
}

const imgClip = () =>{
    let container = $('.o');
    let target = $('img:nth-child(2)', container);
    let ct = container.offset().top;
    let cp = 'polygon(0 0, 100% 0, 100% 100%, 0% 100%)';
    win.on('scroll', function(e){
        // console.log(winT - ct)
        target.css({
            "clip-path": cp
        });
        let abs = (winT - ct +100) / 10;
        cp = 'polygon(0 ' + abs + '%, 100% ' + abs +'%, 100% 100%, 0% 100%)'
        if(ct < winT){
        }
    }).trigger('scroll');
}

const traceCursor = () => {
    let target = $('.v');
    let scale = 0.8
    $('.link').on('mouseover', function(){
        scale = 0.4;
    });
    $('.link').on('mouseout', function(){
        scale = 0.8;
    });
    // console.log(window.devicePixelRatio)
    win.on('mousemove', function(e){
        let mouseX, mouseY;
        if(window.devicePixelRatio === 2){
            mouseX = e.clientX * 2;
            mouseY = e.clientY * 2;
        }else{
            mouseX = e.clientX;
            mouseY = e.clientY;
        }
        target.css({
            'transform': 'translate( calc(-50% + ' + mouseX + 'px), calc( -50% + ' + mouseY +'px)) scale(' + scale + ') ' 
        });
    });
}

const listMove = () => {
    let target = $('.r ul');
    // console.log(target.offset().left)
    // target.css({

    // })
}

const listScroll = () => {
    let container = $('.w');
    let ct = container.offset().top;
    let target = $('.w ul');
    win.on('scroll', function(e){
        console.log(ct < winT)
        if(ct < winT){
            // console.log(winT - ct)
            target.css({
                transform: 'translateX(-' + (winT - ct) +'px)'
            })
        }else{
            target.css({
                transform: 'translateX(0px)'
            })
        }
    });
}

const lineView = () => {
    let container = $('#rainbow');
    setInterval(() => {
        container.addClass('line')
    },2000)
    setInterval(() => {
        container.removeClass('line')
    },6000)
}

const cloudMove = () => {
    
}

$(() => {
    scrollEvent();
    itemHover();
    imgClip();
    traceCursor();
    listScroll();
    // lineView();
});