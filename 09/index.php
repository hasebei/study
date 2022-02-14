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
        body{
            background: url(./image/1.png) no-repeat 0 0;
            background-size: cover;
        }
        .b-c{
            margin-bottom: 100px;
            background-color: var(--section_bg_color);
            padding: 20px 20px 100px;
            clip-path: polygon(0 0 , 100% 0, 0 100%)!important;
        }
        .h-c{
            background-color: var(--section_bg_color);
            padding: 120px 20px 100px;
            clip-path: polygon(0 100px, 100% 0,100% calc(100% - 100px),0 100%)!important;
        }
        .c-c{
            display: block;
            background-color: var(--section_bg_color);
            clip-path: circle(100px at 50% 50%);
            text-align: center;
            padding: 50px;
        }
    </style>
</head>
<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php'; ?>

<article>
    <section class="b-c">
        <h2>AAAAAAAAA</h2>
        <div>
            BBBBBBBBBBBBBBB
        </div>
    </section>
    <section class="h-c">
        <h2>AAAAAAAAA</h2>
        <div>
            BBBBBBBBBBBBBBB<br>
            BBBBBBBBBBBBBBB<br>
            BBBBBBBBBBBBBBB<br>
            BBBBBBBBBBBBBBB<br>
            BBBBBBBBBBBBBBB<br>
            BBBBBBBBBBBBBBB<br>
            BBBBBBBBBBBBBBB<br>
        </div>
    </section>
    <a href="./" class="c-c">
        <h2>AAAAAAAAA</h2>
        <div>
            BBBBBBBBBBBBBBB<br>
            BBBBBBBBBBBBBBB<br>
            BBBBBBBBBBBBBBB<br>
            BBBBBBBBBBBBBBB<br>
            BBBBBBBBBBBBBBB<br>
            BBBBBBBBBBBBBBB<br>
            BBBBBBBBBBBBBBB<br>
        </div>
    </a>
</article>

</body>
</html>