export default class CircleContainer{
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