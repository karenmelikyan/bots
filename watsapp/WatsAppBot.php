<?php

//https://chat-api.com/ru/whatsapp-bot-php.html

class WatsAppBot
{
    private $apiUrl = 'https://eu138.chat-api.com/instance138198/';
    private $token  = '5813il19yamr00d9';
    private $apiKey = 'Q2QBCsEQu4SL4Ff6CGncwrR0bky2';
    
    public function sendMessage($phone, $text)
    {
        $data = [
            'phone' => $phone . '@c.us ',
            'body' => $text,
        ];

        $this->sendRequest('sendMessage', $data);
    }
    
    //__________________________________________________________________
    public function sendRequest($method, $data)
    {
        $url = $this->apiUrl . $method . '?token=' . $this->token;
        if(is_array($data)){
             $data = json_encode($data);
            }
    
            $options = stream_context_create(['http' => [
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $data
            ]]);
    
        echo $response = file_get_contents($url, false, $options);
    }

}


