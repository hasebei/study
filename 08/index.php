<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
    <style>
    .rainbow_text{
        background:linear-gradient(135deg, #0099AE 0%, #006DA6 20%, #FDCD72 40%, #D25972 60%, #D28859 100%);
        background-clip: text;
        -webkit-background-clip: text;
        position:relative;
        font-size: 50px;
        color: transparent;
    }
    </style>
</head>
<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php'; ?>
<article>
<span class="rainbow_text">TEXTTEXTTEXTTEXTTEXTTEXTTEXTTEXTTEXT</span><!-- /.rainbow_text -->
</article>
</body>
</html>