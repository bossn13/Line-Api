<?php

require_once './line-tiny/LINEBotTiny.php';

$channelAccessToken = 'qd9NeFW5MB99pfUIyLlpABREBMRTRrYNilFjJEb7Gqa37ipufRRdcxIR5WyFgTnVNORZVzTGzTK1n1Sr0/dRnQ8inCdcRRGET3nteJre8zdNiil0dvjXvvUK3r/xUcE0NkRUEBE8PGABs5syn03xLQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '1d596833968f8bce1da3bfeac10912d3';
$boss_lineID = "Udfdbe68286f0b0614403c2322def21d3";
$ipadgsd_lineID = "Ucbd4be4dfa87b7b12382174af1529e93";

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
//Push user

$txtMsg_bubble = '{"type":"bubble","styles":{"footer":{"separator":true}},"body":{"type":"box","layout":"vertical","contents":[{"type":"text","text":"ระบบ e-Car Service","weight":"bold","color":"#1DB446","size":"sm"},{"type":"text","text":"6105001-J01","weight":"bold","size":"xxl","margin":"md"},{"type":"text","text":"สนามบินดอนเมือง","size":"xs","color":"#aaaaaa","wrap":true},{"type":"separator","margin":"xxl"},{"type":"box","layout":"vertical","margin":"xxl","spacing":"sm","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"ทะเบียนรถ","size":"sm","color":"#555555","flex":0},{"type":"text","text":"1กก 5050 (นนทบุรี)","size":"sm","color":"#111111","align":"end"}]},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"พขร.","size":"sm","color":"#555555","flex":0},{"type":"text","text":"นายใจดี ธงชัย","size":"sm","color":"#111111","align":"end"}]},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"ผู้ควบคุมรถ","size":"sm","color":"#555555","flex":0},{"type":"text","text":"นายสมชาย สมัยใหม่","size":"sm","color":"#111111","align":"end"}]}]},{"type":"separator","margin":"xxl"},{"type":"box","layout":"horizontal","margin":"md","contents":[{"type":"text","text":"ส่งออกเมื่อ","size":"xs","color":"#aaaaaa","flex":0},{"type":"text","text":"24 ธ.ค. 2561","color":"#aaaaaa","size":"xs","align":"end"}]}]}}';

$client->pushMessage([
    'to' => $boss_lineID,
    'messages' => [
        [
            'type' => 'flex',
            'altText' => "ทดสอบ flex message",
            'contents' => json_decode($txtMsg_bubble),
        ],
    ],
]);

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
