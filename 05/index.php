<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .box{
            height: 1000px;
            background: #999;
        }
        #logo{
            height: 500px;
        }
        .str01,.str02,.str03,.str04,.str05{
            fill: none;
            stroke: #000000;
            stroke-width: 2;
        }
        .finished .str01,.finished .str02,.finished .str03,.finished .str04,.finished .str05{
            fill: #f00;
        }
    </style>
</head>
<body>
<svg  id="test01" data-name="レイヤー 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 88 438">
<image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="./logo.jpg" width="100%" height="100%" mask="url(#clipmask)"></image><!-- mask="url(#clipmask)" が重要 -->
<mask id="clipmask" maskUnits="objectBoundingBox"><!-- id="clipmask" が重要 -->
<line x1="31" y1="9" x2="31" y2="45" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><polyline points="33 11 58.11 7.65 59.96 7.65" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><line x1="33" y1="23.12" x2="59.96" y2="20.39" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><line x1="33" y1="33.6" x2="59.96" y2="30.41" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><line x1="6" y1="48" x2="80" y2="41" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><path d="M29.72,47.89l-2.9,31s9-4,10-6,7-6.84,7-6.84l1.75-1.9" transform="translate(0.18 0.11)" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><line x1="63.38" y1="48" x2="51.63" y2="57.95" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><path d="M37.82,49.89s28,23,30,24,12,1,12,1l2.65-.17" transform="translate(0.18 0.11)" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><line x1="36.38" y1="98.95" x2="14" y2="124" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><path d="M49.08,98.84s11.74,6,12.74,8S68.71,116,68.71,116v1.79" transform="translate(0.18 0.11)" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><path d="M45.57,111.37s-8.75,14.52-10.75,16.52-17,14.45-21,16.72-7.69,4.64-7.69,4.64" transform="translate(0.18 0.11)" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><path d="M45.57,117.74s21,20.58,23.14,21.86,16.56,3.17,16.56,3.17" transform="translate(0.18 0.11)" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><polyline points="26.91 142.18 33 162 34.01 163.47" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><path d="M30.28,144.16l25.54-3.27s4.15.54,3.08,3.27-5.08,15.73-5.08,15.73" transform="translate(0.18 0.11)" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><polyline points="34.01 161.35 55.41 160 57.41 159.62 59.25 159.62" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><path d="M23.82,181.89s5.92,4.53,6.46,5.76,1.54,4.24,1.54,4.24" transform="translate(0.18 0.11)" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><polyline points="14 197.78 44.26 192.22 45.75 193.8 46.63 195" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><line x1="20.16" y1="198.97" x2="25.19" y2="212.81" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><line x1="38.74" y1="196.43" x2="34.01" y2="211.45" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><line x1="4.65" y1="218.05" x2="49" y2="211" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><line x1="18" y1="224" x2="21" y2="244" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><path d="M22.5,226.59,38.56,223s2.26-1.06,2.26,1.94-4,14-4,14" transform="translate(0.18 0.11)" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><line x1="24" y1="240.14" x2="39.18" y2="237.18" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><line x1="54" y1="188" x2="54" y2="255.76" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/><path d="M57.51,191.89s11.1-4,13.2-4,3.82,0,3,2-8.09,14.78-8,15.89,3.27,2.11,5.7,5.11,4.77,6.76,4.1,10.88.32,7.12-1.68,6.12-12.21-5.72-12.21-5.72" transform="translate(0.18 0.11)" fill="none" stroke="#ed1c24" stroke-miterlimit="10" stroke-width="10"/></svg>
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