<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
    <style>
        :root{
            --section_bg_color: #ffffff;
            --slope-height: 100px;
        }
        html,body{
            height: 100%;
        }
        article{
            height: 100%;
            overflow: hidden;
        }
        #bg-canvas{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php'; ?>

<article>
    <canvas id="bg-canvas"></canvas>
</article>
<script>

const circleMax = 10;
var canvas = ctx = null;
var winW = winH = 0;

const raf = window.requestAnimationFrame ||
window.webkitRequestAnimationFrame ||
window.mozRequestAnimationFrame ||
window.oRequestAnimationFrame ||
function(callback) {
    setTimeout(callback, 15);
};


class CircleContainer{
    constructor(){
        this.circles = [];
    }

    add = (circle) => {
        this.circles.push(circle);
    }

    each = (configure) => {
        if(typeof configure === 'function'){
            // console.log(this.circles)
            for(let i=0, len = this.circles.length; i < len; i++){
                configure(this.circles[i]);
            }
        }
    }
}

class Circle{
    constructor(x,y){
        this.x = x || 0;
        this.y = y || 0;
        this.r = Math.random() * 20 + 20;
        this.moveY = -(Math.random() * .5 + .5);
        let colors = [
            'rgba(252, 185, 207, .5)',
            'rgba(178, 251, 164, .5)',
            'rgba(164, 229, 251, .5)',
            'rgba(193, 185, 252, .5)',
            'rgba(251, 164, 246, .5)'
        ]
        this.color = colors[Math.floor(Math.random() * colors.length)];
        // console.log(this.color)
    }

    get getMoveY(){
        return this.moveY;
    }

    set setMoveY(y){
        this.moveY = y
    }

    down = () => {
        this.y = this.y + 2;
    }

    left = () => {
        this.x = this.x - 2;
    }

    right = () => {
        this.x = this.x + 2;
    }

    up = () => {
        if(this.y < -100){
            this.y = winH;
            this.x = Math.random() * winW;
        }
        this.y = this.y + this.moveY;
    }

    draw = (ctx) => {
        ctx.save();
        ctx.translate(this.x, this.y);
        ctx.beginPath();
        // ctx.fillStyle = 'rgba(255, 0, 0, 1)';
        ctx.fillStyle = this.color;
        ctx.arc(0, 0, this.r, 0, 360 * Math.PI / 180, true);
        ctx.fill();
        ctx.restore();
    }

    move = () => {
        this.up();
    }
}

function loop() {
    ctx.clearRect(0, 0, winW, winH);
    circleContainer.each((circle) => {
    // console.log('AAA')
        circle.move();
        circle.draw(ctx);
    });
    raf(loop);
}

function init(){
    canvas = document.getElementById('bg-canvas');
    if(!canvas || !canvas.getContext ){
        // $('body').addClass('no-canvas');
        throw new Error('no-canvas');
        return;
    }

    ctx = canvas.getContext('2d');

    var resizeEvent = new Event('resize');
    window.addEventListener('resize', function(e){
        winW = window.innerWidth;
        winH = window.innerHeight;

        canvas.width = winW;
        canvas.height = winH;
    });
    window.dispatchEvent(resizeEvent);

    circleContainer = new CircleContainer();

    for(let i = 0, l = circleMax; i < l; i++){
        setTimeout(function(){
            let circleX = Math.random() * winW;
            let circleY = winH;
            let circle = new Circle(circleX, circleY, canvas);
            circleContainer.add(circle);
        }, i * 30)
    }

    loop();
}

window.onload = function(){
    try{
        init();
    }catch(e){
        console.log(e);
    }
    // console.log('onload')
};
</script>

</body>
</html>