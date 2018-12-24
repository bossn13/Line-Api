<?php

require_once './line-tiny/LINEBotTiny.php';

$channelAccessToken = 'qd9NeFW5MB99pfUIyLlpABREBMRTRrYNilFjJEb7Gqa37ipufRRdcxIR5WyFgTnVNORZVzTGzTK1n1Sr0/dRnQ8inCdcRRGET3nteJre8zdNiil0dvjXvvUK3r/xUcE0NkRUEBE8PGABs5syn03xLQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '1d596833968f8bce1da3bfeac10912d3';
$boss_lineID = "Udfdbe68286f0b0614403c2322def21d3";
$ipadgsd_lineID = "Ucbd4be4dfa87b7b12382174af1529e93";

$client = new LINEBotTiny($channelAccessToken, $channelSecret);

$res = $client->getUser_profile($boss_lineID);
echo "<h1> LINE User Profile </h1>";

echo "<p> " . $res->displayName . "</p>";
echo "<img src='" . $res->pictureUrl . "' />";

echo "<pre>";
var_dump($res);
echo "</pre>";
