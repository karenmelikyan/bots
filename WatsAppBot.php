<?php

//https://chat-api.com/ru/whatsapp-bot-php.html

class WatsAppBot
{
    private $apiUrl = 'https://eu14.chat-api.com/instance136795/';
    private $token  = '9objuj6dql35e2u6';
    private $apiKey = 'Q2QBCsEQu4SL4Ff6CGncwrR0bky2';
    
    public function sendMessage($chatId, $text)
    {
        $data = [
            'phone' => $chatId, 
            'body' => $text,
        ];

        $this->sendRequest('message', $data);
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
    
        $response = file_get_contents($url, false, $options);
    }

}

