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
1068018710786-ookdaq2jjnjbs46doafms2n6mksot3cs.apps.googleusercontent.com

Client Secret
8vAPAWh191fQ74u9ofBdfkqm
-->

<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// require_once 'watsapp/WatsAppBot.php';
// $bot = new WatsAppBot();
// $bot->sendMessage('37477424845', 'Hi Ashot It`s my script working');

require_once 'watsapp/WatsAppBot.php';

$apiUrl = 'https://eu139.chat-api.com/instance139041/';
$token  = 'r577wsao1ga6ouw8';

$bot = new WatsAppBot($apiUrl, $token);
$bot->welcome('37477424845' . '@c.us', false);















