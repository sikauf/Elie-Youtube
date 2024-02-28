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

// Handle the results here
print_r($data);
}
?>