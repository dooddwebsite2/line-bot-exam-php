<?php



require "vendor/autoload.php";

$access_token = 'Ehx/Hu1wH3uEtKDQyaDH5QAFN33t4H2M7kFfxAP7+2H5yytGbjv44Jn08ZWkNAQ08VITfnKwSa3GWbX4Fw4/IKv3pdrjik3Kp3TdGwlgFlDUWrmOxjb6hCpKzxTs3UYfljgUP3HwQgD8+56jIORaVgdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'c6d29fd704687b143ac24f680b7cc2f1';

$pushID = 'U7ef7a449f2a5c2057eacfc02ba2eb286';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







