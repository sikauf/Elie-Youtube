<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$apiKey = 'AIzaSyCKYtjoDrlFq3oIr8zW3Khprfkgy-LaOB0';
$channelId = 'UCy06jHRS_82N2i5v1YL7glQ';
$maxResults = 50;

$url = "https://www.googleapis.com/youtube/v3/search?key=$apiKey&channelId=$channelId&part=snippet,id&order=date&type=video&maxResults=$maxResults";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$data = json_decode($response, true);
curl_close($curl);

$videos = [];
    foreach ($data['items'] as $item) {
        if (isset($item['id']['videoId'])) {
            $videos[] = $item['id']['videoId'];
        }
    }

    if (count($videos) > 0) {
        $randomIndex = rand(0, count($videos) - 1);
        $randomVideoId = $videos[$randomIndex];
        $videoUrl = "https://www.youtube.com/watch?v=$randomVideoId";

        // Redirect to the random video URL
        header("Location: $videoUrl");
        exit;
    } else {
        echo "No videos found.";
    }
} else {
    // Redirect back to your main page (or wherever you have the button)
    header("Location: index.html");
    exit;
}
?>