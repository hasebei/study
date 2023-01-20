<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <title>Document</title>
</head>
<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php'; ?>

<article>
    <div class="blocks">
        <section id="a" class="block">
            <h2>AAAAAAAAA</h2>
            <div>
                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA<br>
                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA<br>
                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA<br>
                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA<br>
                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA<br>
            </div>
        </section>
        <section id="b" class="block">
            <h2>BBBBBBBBBBBBBBBBBBBBBBB</h2>
            <div>
                BBBBBBBBBBBBBBB<br>
                BBBBBBBBBBBBBBB<br>
                BBBBBBBBBBBBBBB<br>
                BBBBBBBBBBBBBBB<br>
                BBBBBBBBBBBBBBB<br>
                BBBBBBBBBBBBBBB<br>
                BBBBBBBBBBBBBBB<br>
                BBBBBBBBBBBBBBB<br>
                BBBBBBBBBBBBBBB<br>
                BBBBBBBBBBBBBBB<br>
                BBBBBBBBBBBBBBB<br>
                BBBBBBBBBBBBBBB<br>
                BBBBBBBBBBBBBBB<br>
                BBBBBBBBBBBBBBB<br>
                BBBBBBBBBBBBBBB<br>
            </div>
        </section>
        <section id="c" class="block">
            <div>
                <div class="left">LLLLLLLLL</div><!-- /.left -->
                <div class="right">RRRRRRRR</div><!-- /.right -->
            </div>
        </section>
        <section id="d" class="block">
            <h2>DDDDDDDDDDDDDDD</h2>
            <div>
                DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD<br>
                DDDDDDDDDDDDDDDDDDDDD<br>
            </div>
        </section>
        <section id="e" class="block">
            <h2>EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE</h2>
            <div>
                <p>
                EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE<br>
                EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE<br>
                EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE<br>
                EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE<br>
                EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE<br>
                EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE<br>
                EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE<br>
                EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE<br>
                EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE<br>
                EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE</p>
                <p><img src="./image/1.png" alt="" width="500" height="500"></p>
            </div>
        </section>
    </div>
</article>

<script src="./js/jquery.min.js"></script>
<script>

window.scrollTo({
  top: 0,
});

const RESIZE_EVENT = new Event('resize');

var heightC = 0;
var startPointC = 0;
var endPointC = 0;
var selectorC, selectorD;

window.addEventListener('resize', function(e){
    selectorC = document.querySelector('#c');
    startPointC = selectorC.offsetTop;
    heightC = selectorC.clientHeight;

    selectorD = document.querySelector('#d');
    startPointD = selectorD.offsetTop;
    heightD = selectorD.clientHeight;

    endPointC = startPointD - heightC;
});

window.dispatchEvent(RESIZE_EVENT);


$(function(){
    let win = window;
    win.addEventListener('scroll', function(){
        // let winT = win.scrollTop();
        let winT = win.scrollY;
        let boxC = $('#c');
        let boxD = $('#d');
        let boxCwidth = boxC.width();

        let boxCleft = $('.left', boxC);
        // console.log(endPointC)
        // console.log(winT)
        // console.log((endPointC - heightC) > winT)
        // console.log((boxCwidth / 2))
        if(startPointC < winT){
            // var plus = winT - startPointC < 50 ? 0 : (winT - startPointC);
            var plus = winT - startPointC < 50 ? 0 : ((winT - startPointC) / 5);
            // console.log((boxCwidth / 2 + plus))
            console.log((plus))
            console.log("-----------------------------")
            boxCleft.css({
                width: (boxCleft.width() + plus)
            });
        }
        if(startPointD < winT){
            boxD.css({
                'position': 'sticky',
                'top': 0
            });
        }
    });

});
</script>
</body>
</html>