<?php
/*
Template Name: page-member
*/

define('SAMPLE_ID', 'userid'); // IDです
define('SAMPLE_PW', 'password'); // パスワードです
define('URL', 'http://test.study.co.jp/12/calendar/');
// var_dump(URL);

$opts = [
    'http' => [
        'method' => 'GET',
        'header' => 'Authorization: Basic ' . base64_encode(SAMPLE_ID . ':' . SAMPLE_PW)
    ]
];

$data = file_get_contents(URL, false, stream_context_create($opts));
// var_dump($data);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <header>HEADER</header>
    <ul>
        <li><a href="./calendar/">カレンダー</a></li>
    </ul>
</head>
<body>
    
</body>
</html>