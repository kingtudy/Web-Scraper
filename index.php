<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://sophirion.net/cv/test.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$server_response = curl_exec($ch);

curl_close($ch);

$server_response = json_decode($server_response);

echo "<pre>";
print_r($server_response);
echo "</pre>";


//$url = "https://www.wikipedia.org";
//
//// Initialize a CURL session.
//$newCurl = curl_init();
//
////grab URL and pass it to the variable.
//curl_setopt($newCurl, CURLOPT_URL, $url);
//
//// Return Page contents.
//curl_setopt($newCurl, CURLOPT_RETURNTRANSFER, true);
//
//$output = curl_exec($newCurl);
//
//echo $output;