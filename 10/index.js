    import circle from './Circle.js';
    import circleContainer from './circleContainer.js';
    const circleMax = 10;
    const moveY = -2;
    var canvas = ctx = null;
    var winW = winH = 0;

    const raf = window.requestAnimationFrame ||
    window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame ||
    window.oRequestAnimationFrame ||

    function(callback) {
        setTimeout(callback, 15);
    };

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
        // let circle = new Circle(100, 100, canvas);
        // circleContainer.add(circle);

        for(let i = 0, l = circleMax; i < l; i++){
            setTimeout(function(){
                let circleX = Math.random() * winW;
                let circleY = winH;
                let circle = new Circle(circleX, circleY, canvas);
                // let moveY = -(Math.random() * 2);
                // circle.setMoveY = moveY;
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