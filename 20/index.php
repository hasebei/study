<?php
$date = new DateTime();
$timezone = $date->getTimezone();
echo $timezone->getName();            //現在のtimezone:Asia/Tokyo
echo $date->format('Y-m-d H:i:s');

$instagram = null;
$id = '17841456380140641';
$token = 'EAAN1mRayTIwBO3VOkSHhLbxyakuphKexHb6oSgklHoVDOesPIExB0AlWxaIYFZCgWvZCLKTeJP9VYuj0hwnH1UZCdyhhqsr2Wr9Mr7sznZC6bB6XioI6rJDSmmyEF42Qc55Hvm9ioTdfJoyaxZA1nUgXV4LCCaWCrZBbzQcreNrQhj1R3MHXdhubQQTUxj7pGRlJpAqJQZD';
$count = '20';
$url = 'https://graph.facebook.com/v23.0/' . $id . '?fields=name,media.limit(' . $count. '){caption,media_url,thumbnail_url,permalink,like_count,comments_count,media_type,timestamp}&access_token=' . $token;

try{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    $instagram = json_decode($response);
    if(isset($instagram->error)){
        throw new Exception("インスタグラムの情報を取得できませんでした。");
    }
}catch(Exception $e){
        // exit('this');
    $errors = $e->getMessage();
}
// if($response){
//     $instagram = json_decode($response);
//     if(isset($instagram->error)){
//         $instagram = null;
//     }
// }
// var_dump($instagram);
if(!empty($errors)){
?>
    <p><?php echo $errors; ?></p>
<?php
}else{ ?>
<ul>
<?php
    foreach($instagram->media->data as $value){
        if($value->media_type=='VIDEO'){
            $src=$value->thumbnail_url;
            $video = '<span class="video"></span>';
        }
        else{
            $src=$value->media_url;
            $video = "";
        }
        var_dump(strtotime($value->timestamp));
        var_dump(strtotime(date('Ymd')));
    ?>
    <li>
        <a href="<?php echo $value->permalink; ?>" target="_blank">
            <time datetime=""><?php echo $value->timestamp; ?></time>
            <img src="<?php echo $src; ?>" alt="<?php echo $value->caption; ?>">
            <?php echo $video; ?><span class="c"><span class="like"><?php echo $value->like_count ; ?></span>
            <!-- <span class="comme"><?php echo $value->comments_count; ?></span></span></a> -->
            <p class="message"><?php echo nl2br($value->caption); ?></p><!-- /.message -->
    </li>
<?php
    }
?>
</ul>
<?php
}
?>
