<?php

class InstagramFetcher{
    private $access_token;
    private $user_id;
    private $limit;

    public function __construct($user_id, $access_token, $limit = 10) {
        $this->access_token = $access_token;
        $this->user_id = $user_id;
        $this->limit = $limit;
    }

    public function getMediaData() {
        $endpoint = "https://graph.facebook.com/v16.0/{$this->user_id}/?fields=name,media.limit({$this->limit}){caption,media_url,thumbnail_url,permalink,username}&access_token={$this->access_token}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);

        // Check if the API call was successful
        if (isset($data['media']['data'])) {
            return $data['media']['data'];
        } else {
            throw new Exception('Failed to fetch media data from Instagram API.');
        }
    }}
?>