<?php

define('TELEGRAM_TOKEN', '1111167370:AAHPMrivyguJn_eFmWCQ6YHRJzjYtGAzLrg');
define('TELEGRAM_CHATID', '911933093');

function extractDataFromTelegrammResponce($json, $dataType): ?array
{
    $dataArr = [];
    $responces = json_decode($json, JSON_OBJECT_AS_ARRAY);

    foreach($responces['result'] as $responce){
        $dataArr[] =  $responce['message']['chat'][$dataType];
    }

    if(count($dataArr) > 0){
         return $dataArr;
    }

    return null;
}

//_______________________________________________________________
function sendMenu()
{
    $keyboard = [
        'inline_keyboard' => [
            [
                ['text' => 'menu 1', 'callback_data' => 'some command for bot'],
                ['text' => 'menu 2', 'callback_data' => 'some command for bot'],
                ['text' => 'menu 3', 'callback_data' => 'some comand for bot'],
            ]
        ]
    ];

    $encodedKeyboard = json_encode($keyboard);
    $parameters = [
            'chat_id' => TELEGRAM_CHATID, 
            'text' => 'Inga Melikyan', 
            'reply_markup' => $encodedKeyboard
        ];
    
        sendRequest('sendMessage', $parameters); 
}


//__________________________________________________________
function sendRequest($method, $data)
{
    $url = 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/' . $method;

    if (!$curld = curl_init()) {
        exit;
    }
    curl_setopt($curld, CURLOPT_POST, true);
    curl_setopt($curld, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curld, CURLOPT_URL, $url);
    curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($curld);
    curl_close($curld);
    return $output;
}


//____________________________________________________
function sendMessage($data)
{
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        [
            CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => [
                'chat_id' => TELEGRAM_CHATID,
                'text' => $data,
           ],
        ]
    );

    curl_exec($ch);
    curl_close($ch);
}


//___________________________________________________________
function setWebHook($hookUrl)
{ 
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        [
            CURLOPT_URL =>'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/setWebhook?url=' . $hookUrl,
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => [
                'chat_id' => TELEGRAM_CHATID,
                'text' => 'it`s my webhook setting',
           ],
        ]
    );

    echo curl_exec($ch);
    curl_close($ch);
}