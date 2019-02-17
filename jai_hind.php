<?php
function url_get_contents($url)
{
    if (function_exists('curl_exec')) {
        $conn = curl_init($url);
        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($conn, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
        $url_get_contents_data = (curl_exec($conn));
        curl_close($conn);
    } elseif (function_exists('file_get_contents')) {
        $url_get_contents_data = file_get_contents($url);
    } elseif (function_exists('fopen') && function_exists('stream_get_contents')) {
        $handle = fopen($url, "r");
        $url_get_contents_data = stream_get_contents($handle);
    } else {
        $url_get_contents_data = false;
    }
    return $url_get_contents_data;
}

if (!empty($_SERVER["HTTP_CLIENT_IP"]))
{
 $ip = $_SERVER["HTTP_CLIENT_IP"];
}
elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
{
 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else
{
 $ip = $_SERVER["REMOTE_ADDR"];
}

$tags = json_decode(url_get_contents('https://www.iplocate.io/api/lookup/'.$ip), true) ;
 $country = $tags[country];

if($country == "Pakistan"){
    echo 'pakistani are not allowed on hindustani site... fuck you mc';
 exit();
}
?>
