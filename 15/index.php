<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<ul class="insta_list"></ul>
<script src="./jquery.min.js"></script>
<script>
(function ($){
/***********
フェイスブックAPI URL
***********/
const FB_API_URL = 'https://graph.facebook.com/';

/***********
フェイスブックAPI バージョン
***********/
const FB_API_VERAION = 'v14.0/';

/***********
インスタグラムビジネスアカウント
***********/
const INSTAGRAM_BUSINESS_ACCOUNT = '17841447339348985';

/***********
取得する項目
***********/
const GET_FIELD = 'caption, media_url, thumbnail_url, permalink, like_count, comments_count, media_type';

/***********
投稿の上限
***********/
const MEDIA_LIMIT = '9';

/***********
ACCESS TOKEN
***********/
const ACCESS_TOKEN = 'EAAKpFsU0cRcBAL2TLF6ZBc030HaL3yR5ZAPGFtK9ChsT5BH6ziKbvbT9giVXv7VFHcLVkYO4ZCTvgQhzs4PB198i1PctKEXf0ZCzFOZC54fJZC1yhgkuEhT768kNVllqAKOCCS9mX8EuQxfX9FkhGlG6n3ob86xPOKHVbWZBQ0AsXdneEQWfMiB';

const URL = FB_API_URL + FB_API_VERAION + INSTAGRAM_BUSINESS_ACCOUNT + '?fields=media.limit(' + MEDIA_LIMIT + ')' + '{' + GET_FIELD + '}&access_token=' + ACCESS_TOKEN;

    $.ajax({
        type: 'GET',
        url: URL,
        dataType: 'json',　
        success: function (json) {
			let instagram = json.media.data;
			for (let media in instagram){
				// console.log(media)
				let media_url     = instagram[media].media_url; // 動画ソースのURL
				let media_type    = instagram[media].media_type; // メディアの種類
				let media_link    = instagram[media].permalink; // リンク先URL
				let media_caption = instagram[media].caption; //　投稿のキャプション
				let media_like    = instagram[media].like_count; //　いいね！数の取得
				let appendHtml
				if(media_type == 'VIDEO'){
					appendHtml = '<li><a href="' + media_link + '" target="_blank"><img src="./movie.jpg" alt="' + media_caption + '">';
				}else if(media_type == 'CAROUSEL_ALBUM'){
					appendHtml = '<li><a href="' + media_link + '" target="_blank"><img src="./album.jpg" alt="' + media_caption + '">';
				}else{
					appendHtml = '<li><a href="' + media_link + '" target="_blank"><img src="'+ media_url +'" alt="' + media_caption + '">';
				}
				$('.insta_list').append(appendHtml);
			};
        }
    });
})(jQuery);
</script>	
</body>
</html>
