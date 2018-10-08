<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'Ehx/Hu1wH3uEtKDQyaDH5QAFN33t4H2M7kFfxAP7+2H5yytGbjv44Jn08ZWkNAQ08VITfnKwSa3GWbX4Fw4/IKv3pdrjik3Kp3TdGwlgFlDUWrmOxjb6hCpKzxTs3UYfljgUP3HwQgD8+56jIORaVgdB04t89/1O/w1cDnyilFU=';
 
// Get POST body content
$content = file_get_contents('php://input');


// Parse JSON
$events = json_decode($content, true);
echo 'events';
echo '<PRE>';
print_r($events);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	echo '1';
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}

}
echo "OK 5555555"; 
