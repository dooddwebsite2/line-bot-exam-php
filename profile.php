<?php


$access_token = 'Ehx/Hu1wH3uEtKDQyaDH5QAFN33t4H2M7kFfxAP7+2H5yytGbjv44Jn08ZWkNAQ08VITfnKwSa3GWbX4Fw4/IKv3pdrjik3Kp3TdGwlgFlDUWrmOxjb6hCpKzxTs3UYfljgUP3HwQgD8+56jIORaVgdB04t89/1O/w1cDnyilFU=';

$userId = 'Uffa138efe037e6e889d0b0f4a871c005';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

