<?php 
$username="abollenguillaume";
$profileurl = "https://www.linkedin.com/in/".$username;

$fp = curl_init($profileurl);
echo $response = curl_exec($fp);
echo $response_code = curl_getinfo($fp, CURLINFO_HTTP_CODE);
echo $validprofile = ($response_code == 200);

?>