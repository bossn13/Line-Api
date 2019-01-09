<?php

require_once './line-tiny/LINEBotTiny.php';

$channelAccessToken = 'qd9NeFW5MB99pfUIyLlpABREBMRTRrYNilFjJEb7Gqa37ipufRRdcxIR5WyFgTnVNORZVzTGzTK1n1Sr0/dRnQ8inCdcRRGET3nteJre8zdNiil0dvjXvvUK3r/xUcE0NkRUEBE8PGABs5syn03xLQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '1d596833968f8bce1da3bfeac10912d3';
$boss_lineID = "Udfdbe68286f0b0614403c2322def21d3";
$ipadgsd_lineID = "Ucbd4be4dfa87b7b12382174af1529e93";

$client = new LINEBotTiny($channelAccessToken, $channelSecret);

//create new richmenu 
//$rich_menu = json_decode('{"size":{"width":2500,"height":843},"selected":true,"name":"Default Menu","chatBarText":"ระบบงาน อหท.","areas":[{"bounds":{"x":0,"y":5,"width":1254,"height":420},"action":{"type":"message","text":"OK กำลังทำ"}},{"bounds":{"x":1250,"y":0,"width":635,"height":425},"action":{"type":"uri","uri":"http://ecar.egat.co.th"}}]}');
$rich_menu = json_decode('{"size":{"width":2500,"height":843},"selected":true,"name":"User Menu","chatBarText":"ระบบงาน อหท.","areas":[{"bounds":{"x":0,"y":0,"width":1254,"height":424},"action":{"type":"postback","text":"สวัสดีครับ","data":"Data 515"}},{"bounds":{"x":1885,"y":417,"width":615,"height":426},"action":{"type":"uri","uri":"http://ecar.egat.co.th/line-api/logout"}},{"bounds":{"x":1250,"y":4,"width":639,"height":421},"action":{"type":"uri","uri":"http://ecar.egat.co.th"}}]}');
$res = $client->rich_menu_create($rich_menu);
$richmenuID = $res->richMenuId;

//Upload Image
//$richmenuID = "richmenu-7e82ced02ba53360948ec00178a13c86";
$img_path = realpath('') . '/' . 'rich_menu-logout.png';
$res_upload = $client->rich_menu_upload($richmenuID, $img_path, "image/png");

//set default 


echo "<pre>";
var_dump($res_upload);
echo "</pre>";


/*
ส่งหลายคน
$client->pushMessage_multicast([
'to' => [$boss_lineID,$ipadgsd_lineID],
'messages' => [
[
'type' => 'flex',
'altText' => "ทดสอบ flex message",
'contents' => json_decode($txtMsg_bubble),
],
],
]);
 */
