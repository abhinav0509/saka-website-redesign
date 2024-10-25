<?php
$handle = curl_init('https://phantombuster.com/api/v1/agent/165145/launch');
curl_setopt_array($handle, array(
	CURLOPT_POST => TRUE,
	CURLOPT_RETURNTRANSFER => TRUE,
	CURLOPT_HTTPHEADER => array(
		'X-Phantombuster-Key-1: wv1eQae75HchwVWnv6dRDzOrBMWflZYH',
		'Content-Type: application/json'
	),
	CURLOPT_POSTFIELDS => '{"output":"result-object-with-output","argument":{"sessionCookie":"AQEDAS0jsTwFQdIZAAABbJo-tj8AAAFsvks6P1EAIP7wprrlsH-K559byjE7F4sNIydUgqO-i1XuptX8f-xAHQiSPWtnJNrUBlpJgZR9r6VSQ8YIIn88rw2tkwoJCldMbJtitFtQ6UjS7xmaRsS0Aydx","spreadsheetUrl":"www.linkedin.com/in/niswender-matthew-73b74a4","emailChooser":"none","numberOfAddsPerLaunch":10,"csvName":"LinkedinProfile_Result","saveImg":false,"takeScreenshot":false,"takePartialScreenshot":false,"onlyCurrentJson":true}}'
));
$response = curl_exec($handle);
if($response === FALSE){
	echo 'Error: ' . curl_error($handle);
} else {
	echo $response;
	$decodedResponse = json_decode($response, TRUE);
}
?>