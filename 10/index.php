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
<script src="./index.js" type="module"></script>
</body>
</html>