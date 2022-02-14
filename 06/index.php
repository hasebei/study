<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    </style>
</head>
<body>
<svg id="test01" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 643 185.15">
<image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="./image01.jpg" width="100%" height="100%" mask="url(#clipmask)"></image><!-- mask="url(#clipmask)" が重要 -->
<mask id="clipmask" maskUnits="objectBoundingBox"><!-- id="clipmask" が重要 -->
<g id="レイヤー_2" data-name="レイヤー 2"><line x1="103" y1="13.15" x2="141" y2="13.15" style="fill:#fff;stroke:#f40006;stroke-miterlimit:10;stroke-width:12px"/><polyline points="122 19.15 141 82.15 160 19.15 179 72.15 196 19.15" style="fill:#fff;stroke:#f40006;stroke-miterlimit:10;stroke-width:12px"/><line x1="185" y1="13.15" x2="207" y2="13.15" style="fill:#fff;stroke:#f40006;stroke-miterlimit:10;stroke-width:12px"/></g>
</mask>
</svg>
<script src="./vivus.min.js"></script>
<script>
    new Vivus('test01', { //ここにsvgタグにつけたIDを書き込む
        type: 'oneByOne',
        start: 'inViewport',
        duration: 200,
        forceRender: false,
        animTimingFunction: Vivus.LINEAR,
    });
</script>
</body>
</html>