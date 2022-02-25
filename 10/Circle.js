export default class Circle{
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

        get getPosX(){
            return this.x;
        }

        set setPosX(x){
            this.x = x
        }

        get getPosY(){
            return this.y;
        }

        set setPosY(y){
            this.y = y;
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
            if(this.y < -50){
                this.reset();
            }
            this.y = this.y + this.moveY;
        }

        reset = () => {
            this.y = window.innerHeight + 50;
            this.x = Math.random() * window.innerWidth;
            this.moveY = -(Math.random() * .5 + .5);
        }

        draw = (ctx) => {
            ctx.save();
            // ctx.translate(this.x, this.y);
            ctx.beginPath();
            // ctx.fillStyle = 'rgba(255, 0, 0, 1)';
            ctx.fillStyle = this.color;
            ctx.arc(this.x, this.y, this.r, 0, 360 * Math.PI / 180, true);
            ctx.fill();
            ctx.restore();
        }

        move = () => {
            this.up();
        }
    }
