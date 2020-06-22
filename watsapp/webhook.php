<?php

session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);  


require_once 'CommandsHandler.php';

$apiUrl = 'https://eu77.chat-api.com/instance141030/';
$token  = '15rk80ozte9orh81';

/** Waiting for clients command */
$json = file_get_contents('php://input');

/** Turn on commands handling */
(new CommandsHandler($apiUrl, $token))->run($json);


















//Ashot 37477424845
//Ani 37498989610

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

// $apiUrl = 'https://eu77.chat-api.com/instance141030/';
// $token  = '15rk80ozte9orh81';

// $sender = new Sender($apiUrl, $token);
// $json = $sender->getLastMessages('37498989610@c.us', 4);
// $decoded = json_decode($json, true);

// echo file_get_contents('https://eu77.chat-api.com/instance141030/messages?token=15rk80ozte9orh81&chatId=37498989610@c.us&lastMessageNumber=1');
