<?php

require_once './line-tiny/LINEBotTiny.php';

$channelAccessToken = 'qd9NeFW5MB99pfUIyLlpABREBMRTRrYNilFjJEb7Gqa37ipufRRdcxIR5WyFgTnVNORZVzTGzTK1n1Sr0/dRnQ8inCdcRRGET3nteJre8zdNiil0dvjXvvUK3r/xUcE0NkRUEBE8PGABs5syn03xLQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '1d596833968f8bce1da3bfeac10912d3';
$boss_lineID = "Udfdbe68286f0b0614403c2322def21d3";

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
//Push user

$txtMsg_bubble = '{"type":"bubble","styles":{"footer":{"separator":true}},"body":{"type":"box","layout":"vertical","contents":[{"type":"text","text":"สถานะ","weight":"bold","color":"#1DB446","size":"sm"},{"type":"text","text":"6105001-J01","weight":"bold","size":"xxl","margin":"md"},{"type":"text","text":"สนามบินดอนเมือง","size":"xs","color":"#aaaaaa","wrap":true},{"type":"separator","margin":"xxl"},{"type":"box","layout":"vertical","margin":"xxl","spacing":"sm","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"ทะเบียนรถ","size":"sm","color":"#555555","flex":0},{"type":"text","text":"1กก 5050 (นนทบุรี)","size":"sm","color":"#111111","align":"end"}]},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"พขร.","size":"sm","color":"#555555","flex":0},{"type":"text","text":"นายใจดี ธงชัย","size":"sm","color":"#111111","align":"end"}]},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"ผู้ควบคุมรถ","size":"sm","color":"#555555","flex":0},{"type":"text","text":"นายสมชาย สมัยใหม่","size":"sm","color":"#111111","align":"end"}]}]},{"type":"separator","margin":"xxl"},{"type":"box","layout":"horizontal","margin":"md","contents":[{"type":"text","text":"PAYMENT ID","size":"xs","color":"#aaaaaa","flex":0},{"type":"text","text":"#743289384279","color":"#aaaaaa","size":"xs","align":"end"}]}]}}';

$client->pushMessage([
    'to' => $boss_lineID,
    'messages' => [
        [
            'type' => 'flex',
            'altText' => "this is a flex mess",
            'contents' => json_decode($txtMsg_bubble),
        ],
    ],
]);
