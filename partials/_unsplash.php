<?php
if (isset($filter) && $filter = "high") {
    $filter = "&content_filter=high";
}

$filter = "&content_filter=low";

$url = 'https://api.unsplash.com/photos/random?client_id=7dJjjDXmknR9bQm01rVWKBGh7xxlC3r27fpueLQk8pM&query=' . $imgOf . '&orientation=' . $orientation . $filter;
$response = file_get_contents($url);
$data = json_decode($response, true);
$imageUrl = $data['urls']['regular'];
