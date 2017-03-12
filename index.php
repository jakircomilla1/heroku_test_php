<?php
if(isset($_REQUEST['hub_challenge'])){
	$challenge = $_REQUEST['hub_challenge'];
	$token = $_REQUEST['hub_verify_token'];
}
if($token == "mohammad_jakir_hossain_voice_is_mohammad_jakir_hossain_also_facebook_messages"){
	echo $challenge;
}
?>
