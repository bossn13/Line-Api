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
foreach ($client->parseEvents() as $event)
{
    switch ($event['type'])
    {
        case 'message':
            $message = $event['message'];
            $userID = $event['source']['userId'];
            $replyToken = $event["replyToken"];
            $replyMessage = "";

            $arr_reply_message = array();

            switch ($message['type'])
            {
                case 'text':
                    $msg = $message["text"];
                    if ($msg == "login : linexfmd")
                    {//login url
                        $arr_reply_message["altText"] = "login FMD x Line";
                        //$arr_reply_message["type"] = "template";
                        //$arr_reply_message["template"] = json_decode('{"type":"buttons","actions":[{"type":"uri","label":"Login","uri":"http://ecar.egat.co.th/line-fmd-ws/login?a=' . $userID . '&b=' . strtotime("now") .'"}],"thumbnailImageUrl":"https://us.123rf.com/450wm/dirkercken/dirkercken1403/dirkercken140301620/26969365-login-icon-or-user-or-member-log-in-button-website-banner.jpg?ver=6","title":"เข้าสู่ระบบ","text":"เข้าสู่ระบบโดยใช้ e-mail กฟผ."}');
                        
                        $url_login = "http://ecar.egat.co.th/line-fmd-ws/login?a=" . $userID . "&b=" . strtotime("now");
                        //$url_login = "http://ecar.egat.co.th";
                        $bubble_txt = '{"type":"bubble","hero":{"type":"image","url":"https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_1_cafe.png","size":"full","aspectRatio":"20:13","aspectMode":"cover","action":{"type":"uri","uri":"' . $url_login .'"}},"body":{"type":"box","layout":"vertical","contents":[{"type":"text","text":"เข้าสู่ระบบ","weight":"bold","size":"xl"},{"type":"box","layout":"vertical","margin":"lg","spacing":"sm","contents":[{"type":"box","layout":"baseline","spacing":"sm","contents":[{"type":"text","text":"สามารถเข้าสู่ระบบเพื่อใช้งานระบบงานอหท. ผ่าน Line ได้ด้วยเลขประจำตัว และรหัสผ่านเดียวกับ e-mail กฟผ.","wrap":true,"color":"#666666","size":"sm","flex":1}]}]}]},"footer":{"type":"box","layout":"vertical","spacing":"sm","contents":[{"type":"button","style":"link","height":"sm","action":{"type":"uri","label":"กดที่นี่เพื่อเข้าสู่ระบบ","uri":"'. $url_login .'"}},{"type":"spacer","size":"sm"}],"flex":0}}';
                        $arr_reply_message["type"] = "flex";
                        $arr_reply_message["contents"] = json_decode($bubble_txt);
                    }
                    else
                    {
                        $arr_reply_message["type"] = "text";
                        $arr_reply_message["text"] = "Your Message Type : " . $message["type"] . "\n Message text : " . $message["text"];
                    }
                    break;
                case "sticker":
                    $arr_reply_message["type"] = "text";
                    $arr_reply_message["text"] = "Your Message Type : " . $message["type"] . "\n Sticker packageId : " . $message["packageId"] . "\n Sticker stickerId : " . $message["stickerId"];
                    break;
                default:
                    $arr_reply_message["type"] = "text";
                    $arr_reply_message["text"] = "Your Message Type : " . $message["type"] . "\n Unhandled ";
                    error_log('Unsupported message type: ' . $message['type']);
                    break;
            }

            //reply user
            $client->replyMessage([
                'replyToken' => $event['replyToken'],
                'messages' => [$arr_reply_message]
            ]);

            break;
        default:
            error_log('Unsupported event type: ' . $event['type']);
            break;
    }
}
;
