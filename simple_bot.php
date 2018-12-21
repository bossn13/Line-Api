<?php

require_once __DIR__ . '/vendor/autoload.php';

$channelAccessToken = 'qd9NeFW5MB99pfUIyLlpABREBMRTRrYNilFjJEb7Gqa37ipufRRdcxIR5WyFgTnVNORZVzTGzTK1n1Sr0/dRnQ8inCdcRRGET3nteJre8zdNiil0dvjXvvUK3r/xUcE0NkRUEBE8PGABs5syn03xLQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '1d596833968f8bce1da3bfeac10912d3';
$boss_lineID = "Udfdbe68286f0b0614403c2322def21d";

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($channelAccessToken);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

/*
$response = $bot->getProfile($boss_lineID);
if ($response->isSucceeded()) {
$profile = $response->getJSONDecodedBody();
echo $profile['displayName'];
echo $profile['pictureUrl'];
echo $profile['statusMessage'];
} else {
echo "fail";
}
 */

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->pushMessage($boss_lineID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
