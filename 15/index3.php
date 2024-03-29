<?php 

require_once ('./class/InstagramFetcher.php');

$user_id = '100733716097217'; #【InstagramビジネスアカウントID】; 
$access_token = 'EAANATBD7obYBOZBygt9ZAizFiZC4Qj3BjpfD0oPcSInuFBfkN8YIG3oFC0gOCInUXc5ySXfGUhkPbxEJMDC4SJZB90urRJV7uulYU784NJZC4XEWrSROItpPwyNLnDonZAdIwVjZBN17zDI4RCpZA9L8Tgk97rfKdyNMMtlFP4UL2ftsPiHpScehIRxOOKuOsPZAPPfmGZA3wZD'; #【３番めに取得したアクセストークン】; 
$limit = 10; // 取得件数（任意）

try {
    $instagramFetcher = new InstagramFetcher($user_id, $access_token, $limit);
    $instagramPosts = $instagramFetcher -> getMediaData();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

if( $igPosts ): ?>
<div class="container">
    <div class="flex flex-wrap -m-4">
<?php
    foreach ( $igPosts as $post ): ?>
        <div class="p-4 md:w-1/3">
            <div class="h-full border-2 rounded-lg overflow-hidden">
                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="<?php echo $post['thumbnail_url'] ?? $post['media_url']; ?>" alt="">
                <div class="p-6">
                    <p class="mb-3"><?php echo $post['caption'] ?></p>
                    <div class="flex items-center flex-wrap ">
                        <a class="text-indigo-500 items-center md:mb-2 lg:mb-0" href="<?php echo $post['permalink']; ?>">View More</a>
                </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>