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
        }
        #bg-canvas{
            /* width: 100%;
            height: 100%; */
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
    const canvas = ctx = null;
    const moveY = -2;
    var winW = 0, winH = 0;
    var cx = 0, cy = window.innerHeight;
    var cr = Math.random() * 50 + 20;

    const raf = window.requestAnimationFrame ||
    window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame ||
    window.oRequestAnimationFrame ||
    function(callback) {
        setTimeout(callback, 15);
    };

    class Circle{
        consutrctor = (x, y) =>{
            this.x = x || 0;
            this.y = y || 0;
            this.r = Math.random() * 50 + 20;
            this.move();
        }

        left = () => {
            this.x = this.x - 2;
        }

        right = () => {
            this.x = this.x + 2;
        }

        up = () => {
            this.y = this.y - 2;
        }

        down = () => {
            this.y = this.y + 2;
        }

        draw = (ctx) => {
            ctx.save();
            ctx.translate(this.x, this.y);
            ctx.rotate( 55 * Math.PI / 180);
            ctx.beginPath();
            ctx.fillStyle = 'rgba(255, 255, 255, .4)';
            ctx.scale(3, 0.15);
            ctx.arc(0, 0, 2, 0, 360 * Math.PI / 180, true);
            ctx.fill();
            ctx.restore();
        }

        move = () => {
            this.up();
        }
    }


    class CircleContainer{
        consutrctor = () => {
            this.rains = [];
        }

        add = (rain) => {
            this.rains.push(rain);
        }

        each = (configure) => {
            if(typeof configure === 'function'){
                for(let i=0, len = this.rains.length; i < len; i++){
                    configure(this.rains[i]);
                }
            }
        }
    }

    function init(){
        if(!canvas || !canvas.getContext ){
            // $('body').addClass('no-canvas');
        return;
        }

        var resizeEvent = new Event('resize');

        window.addEventListener('resize', function(e){
            winW = window.innerWidth;
            winH = window.innerHeight;

            canvas.width = winW;
            canvas.height = winH;
        });

        window.dispatchEvent(resizeEvent);

        ctx = canvas.getContext('2d');
        circleContainer = new CircleContainer();

        for(var i=0, l=100; i<l; i++){
            setTimeout(function(){
            var rainX = Math.random() * winW;
            var rainY = Math.random() * 200;
            var circle = new Circle(rainX, rainY, cvs[0]);
            circleContainer.add(rain);
            }, i*30)
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