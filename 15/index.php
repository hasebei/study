<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <title>Document</title>

</head>
<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php'; ?>
<script src="./jquery.min.js"></script>
<script>
$(function(){
	$.ajax({
		type: 'GET',
		url: 'https://graph.facebook.com/v14.0/08011350157?fields=name%2Cmedia.limit(10)%7Bcaption%2Clike_count%2Cmedia_url%2Cpermalink%2Ctimestamp%2Cthumbnail_url%2Cmedia_type%2Cusername%7D&access_token=EAAK9ZB9fyEOQBAE02697UWqxHCwX8niSCz9tWgbnDZBtYGcg8z7mIVX3NnK2wN5WJwGx6cF68VSX4Yq5i7rJb36LPxrGZBvZB7BylcURlrIq26JNSHdY7qYT1I9llZBFSkrLtASWvcrn6donxZCZAZAnJbA77fpFHQ76RV3iNEMsJKgC24fbEskgquOyeGXlkbgZD',
		dataType: 'json',
		success: function(json) {
		    	
		    var html = '';
		    var insta = json.media.data;
		    for (var i = 0; i < insta.length; i++) {
		    var media_type = insta[i].media_type;
                if ( insta[i].media_type == "IMAGE" || insta[i].media_type == "CAROUSEL_ALBUM" ) {
		    	html += '<li><a href="' + insta[i].permalink + '" target="_blank"><img src="' + insta[i].media_url + '"></a></li>';                
                } else if (media_type == "VIDEO" ) {
		    	html += '<li><a href="' + insta[i].permalink + '" target="_blank"><img src="' + insta[i].thumbnail_url + '"></a></li>';           
		    var media_type = '';                    
                }       
		    }
		      $(".insta_list").append(html);			
		},
		error: function() {
 
		//エラー時の処理
		}
	});
});
</script>
<ul class="insta_list"></ul>
</body>
</html>