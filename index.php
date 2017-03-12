<?php

$accessToken = "EAAKURmKtkWIBACAZCRdIHTY3FRRt0PRikxsutYKhb8HCCzC1fF0z5tE6LDL7oiNwgzFtf1CICW7N6Mg2PcSIfoz7CxDpBm5853zPHnyWIKlT5cRSYsF47MU6dyWyFsw0hAmCsmLL7IBQaXE3g4YicIyL8a6iyTDByBcQZAUAZDZD";

if(isset($_REQUEST['hub_challenge'])){
	$challenge = $_REQUEST['hub_challenge'];
	$token = $_REQUEST['hub_verify_token'];
}
if($token == "mohammad_jakir_hossain_voice_is_mohammad_jakir_hossain_also_facebook_messages"){
	echo $challenge;
}

$input = json_decode(file_get_contents('php://input'), true);
$userID = $input['entry'][0]['massaging'][0]['sender']['id'];
$message = $input['entry'][0]['massaging'][0]['message']['text'];
echo $userID." and ".$message;

//....................
$url = "https://graph.facebook.com/v2.6/me/messes?access_token=$accessToken";

$jsonData ="{
	'recipient':{
		'id': $userID
	},
	'message': {
		'text': 'Hello Bro!';
	}
}";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

if(!empty($input['entry'][0]['messaging'][0]['message'])){
	curl_exel($ch);
}
