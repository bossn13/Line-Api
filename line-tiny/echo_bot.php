<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once './LINEBotTiny.php';

$channelAccessToken = 'qd9NeFW5MB99pfUIyLlpABREBMRTRrYNilFjJEb7Gqa37ipufRRdcxIR5WyFgTnVNORZVzTGzTK1n1Sr0/dRnQ8inCdcRRGET3nteJre8zdNiil0dvjXvvUK3r/xUcE0NkRUEBE8PGABs5syn03xLQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '1d596833968f8bce1da3bfeac10912d3';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            $userID = $event['source']['userId'];
            $replyToken = $event["replyToken"];
            $replyMessage = "";

            switch ($message['type']) {
                case 'text':
                    $replyMessage = "Your Message Type : " . $message["type"] . "\n Message text : " . $message["text"];
                    break;
                case "sticker":
                    $replyMessage = "Your Message Type : " . $message["type"] . "\n Sticker packageId : " . $message["packageId"] . "\n Sticker stickerId : " . $message["stickerId"];
                    break;
                default:
                    $replyMessage = "Your Message Type : " . $message["type"] . "\n Unhandled ";
                    error_log('Unsupported message type: ' . $message['type']);
                    break;
            }

            //reply user
            $client->replyMessage([
                'replyToken' => $event['replyToken'],
                'messages' => [
                    [
                        'type' => 'text',
                        'text' => $replyMessage . "\n From : " . $userID,
                    ],
                ],
            ]);

            break;
        default:
            error_log('Unsupported event type: ' . $event['type']);
            break;
    }
}
;
