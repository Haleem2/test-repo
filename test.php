<?php
use Illuminate\Session\Middleware\StartSession;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
$track_id=$_GET['id'];
$url = 'https://api.jsonbin.io/b/5eafd4ca47a2266b1472794c'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$playlist = json_decode($data, true); // decode the JSON feed and make an associative array
$id=1;
$tracks=[];
foreach ($playlist['tracks'] as $track) {
  $track['id']= $id;
  array_push($tracks,$track);
  $id++;
}

$download_link=$tracks[$track_id-1]['url'];

$file_name = basename($download_link);

readfile($download_link); 

// $file = file_get_contents($download_link);
// echo file;
