<?php

// var_dump(!empty($_SERVER['HTTPS']));
$to = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        setTimeout(() => {
            location.href = "<?php echo $to; ?>";
        }, 10000);
    </script>
</head>
<body>
    URLが変更され、http から https になりました。<br>
    自動で転送するようになっておりますが、ブックマーク等に保存されている方は、新しいURLをご登録ください。<br>
    ページは10秒後に転送されますが転送されない方は<a href="<?php echo $to; ?>">新しいURLへ</a>をクリックください。
</body>
</html>