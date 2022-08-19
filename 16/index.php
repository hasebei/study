<?php
/***********

***********/
define('FB_API_URL', 'https://graph.facebook.com/');

/***********

***********/
define('FB_API_VERAION', 'v14.0/');

/***********

***********/
define('INSTAGRAM_BUSINESS_ACCOUNT', '17841454493164650');

/***********

***********/
define('GET_FIELD', 'caption,media_url,thumbnail_url,permalink,like_count,comments_count,media_type');

/***********

***********/
define('MEDIA_LIMIT', '9');

/***********

***********/
define('ACCESS_TOKEN', 'EAAIYX9YVrQ0BANFcP3nnM4sQiPsSeiPDZAzxb0dft0cLlMwPmCZBbIqZAqXH8AZBXU2OTjbDjJBQL5eoQ5t6eLRPq4e9m2q1uy9KT2ugVNq6KX2WUpRhku3huSIcQ6iKyitU0LeRWDizWnqjJTmuSpY3qAj24sKVlBZAMXTwju7a4OZBUcHZAZCa');

$url = FB_API_URL . FB_API_VERAION . INSTAGRAM_BUSINESS_ACCOUNT . '?fields=media.limit(' . MEDIA_LIMIT . ')' . '{' . GET_FIELD . '}&access_token=' . ACCESS_TOKEN;

// var_dump($url);

/***********
curl 初期化
***********/
$ch = curl_init();

/***********
URL を指定
***********/
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/***********
curlを実行する
***********/
//結果を変数に代入（失敗すれば false、成功すれば取得結果が格納される）
$result = curl_exec($ch);

/***********
cURL セッションを終了
***********/
curl_close($ch);

// var_dump($result);

$insta_response = json_decode( $result );

// var_dump($insta_response);
try{
    if(!empty($insta_response -> error)){
        $error = $insta_response -> error;
        $error_code    = $error -> code;
        $error_message = $error -> message;
        throw new Exception('エラーが発生しました。> エラーコード:' . $error_code . 'エラーメッセージ:' . $error_message);
    }
}catch(Exception $e){
    echo $e;
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
<?php
    foreach ( $insta_response->media->data as $val ) {
        // var_dump( $val);
        $media_url  = $val -> media_url;
        $media_type = $val -> media_type;
        $permalink  = $val -> permalink;
        if($media_type == 'IMAGE'){ 
?>
        <li><img src="<?php echo $media_url; ?>" alt=""></li>
<?php
        }else{ ?>
        <li><img src="" alt=""></li>
<?php
        }
    } ?>
    </ul>
</body>
</html>