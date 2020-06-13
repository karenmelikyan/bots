<!-- Ftp Access:
host: 37.230.115.187
user: karen
pass: D0e3C0r8
Server Url: https://mebel-bs.ru/bot/ 
-->

<!-- Google Calendar
https://developers.google.com/calendar/quickstart/php

CAllback Url: https://mebel-bs.ru/bot/gc_callback

Client ID
1068018710786-ms3dc706uu98t0184stc23957iqhrpvo.apps.googleusercontent.com

Client Secret
3JBxEm7PruMugsuLg6b6T5TY
-->

<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// require_once 'watsapp/WatsAppBot.php';

// $bot = new WatsAppBot();
// $bot->sendMessage('37477424845', 'Hi Ashot It`s my script working'

require_once 'watsapp/DemoBot.php';
echo 'Demo bot test';
//new DemoBot();















/** google calendar */
//cliet id:      1068018710786-ms3dc706uu98t0184stc23957iqhrpvo.apps.googleusercontent.com
//client secret: 3JBxEm7PruMugsuLg6b6T5TY
            
//lib for telegramm bot: https://github.com/unreal4u/telegram-api

//telegramm bot name:@KarenBSTestBot
//telegramm access token: 1111167370:AAHPMrivyguJn_eFmWCQ6YHRJzjYtGAzLrg

//WatsApp access token:ysrvpynzssf5gsa4

// /**usefull links*/
// //https://app.chat-api.com/instance/135361



// class WatsAppBot
// {
//     private $apiUrl;
//     private $token;
//     /**
//      * 
//      */
//     public function __construct($url = 'https://eu14.chat-api.com/instance135361/', $token = 'ysrvpynzssf5gsa4')
//     {
//         $this->apiUrl = $url;
//         $this->token = $token;
//     }

//     /**
//      * 
//      */
//     public function sendMessage($phone, $message)
//     {
//         $body = [
//             'phone' => $phone . '@c.us',
//             'body'  => $message,
//         ];
        
//         $options = stream_context_create(['http' => [
//             'method'  => 'POST',
//             'header'  => 'Content-type: application/json',
//             'content' => json_encode($body),
//             ]]);

//         $url = $this->apiUrl . 'sendMessage?token=' . $this->token;
//         file_get_contents($url, false,  $options);
//     }

// }


// $bot = new WatsAppBot();
// $bot->sendMessage('37493316461', 'Our products: "https://www.youtube.com/watch?v=VYW_zJfnvN0"');

