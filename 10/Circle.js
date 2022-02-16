export class Circle{
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
            console.log(this.color)
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
