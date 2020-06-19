<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'IState.php';
require_once 'Menu.php';

class Listener implements IState
{
    private IState $menu;
    private string $apiUrl;
    private string $token;
    private string $userCommand;

    public function __construct(IState $menu, string $apiUrl, string $token)
    {
        //properties init
        $this->menu = $menu;
        $this->$apiUrl = $apiUrl;
        $this->token = $token;
        
        //get the JSON body from the instance
        $json = file_get_contents('php://input');
        $decoded = json_decode($json, true);

        //write parsed JSON-body to the file for debugging
        ob_start();
        var_dump($decoded);
        $input = ob_get_contents();
        ob_end_clean();
        file_put_contents('requests.log', $input.PHP_EOL, FILE_APPEND);

        //if we got messages
        if(isset($decoded['messages']))
        {
            //check every new message
            foreach($decoded['messages'] as $message)
            {
                //delete excess spaces and split the message on spaces. The first word in the message is a command, other words are parameters
                $text = explode(' ', trim($message['body']));
                //current message shouldn't be send from your bot, because it calls recursion
                if(!$message['fromMe'])
                {
                    //get command
                    $this->userCommand = mb_strtolower($text[0], 'UTF-8');

                    /**TO DO list
                    1. user identification by phone number
                    2. checking user current state in 'states` table
                    3. invoke appropriate listener method for current menu
                     . 
                     . 
                     . 
                     .....

                    */

                }
            }
        }
    }

    /**********************
     * Listener methods
     **********************/

    //listener of state `main` menu
    public function main(): void
    {
       switch($this->userCommand)
       {
            case '0':  ; 
            break;
            case '1':  ; 
            break;
            case '2':  ; 
            break;
            case '3':  ; 
            break;
            default: ; 
            break;
       }
    }

    //listener of state choosing free day
    public function freeWeekDays(): void  
    {
        switch($this->userCommand)
        {
            case '1':  ; 
            break;
            case '2':  ; 
            break;
            case '3':  ; 
            break;
            case '4':  ; 
            break;
            case '5':  ; 
            break;
            case '6':  ; 
            break;
            case '7':  ; 
            break;
            default: ; 
            break;
        }
    }
    
    //listener of state choosing free hour 
    public function freeHours(): void  
    {
        switch($this->userCommand)
        {
            case '0':  ; 
            break;
            case '1':  ; 
            break;
            case '2':  ; 
            break;
            case '3':  ; 
            break;
            default: ; 
            break;
        }
    }

    //listener of state training cancel via yes/no 
    public function trainingCancelYes_No(): void  
    {
        switch($this->userCommand)
        {
            case '1':  ; 
            break;
            case '2':  ; 
            break;
            default: ; 
            break;
        }
    }

    /**********************
     * Service methods
     **********************/
    private function sendMessage(string $chatId, string $text): void
    {
        $data = [
            'chatId' => $chatId,
            'body' => $text,
        ];

        $this->sendRequest('message', $data);
    }

    /**/
    private function sendRequest(string $method, array $data): void
    {
        $url = $this->apiUrl . $method . '?token=' . $this->token;

        if(is_array($data)){ 
            $data = json_encode($data);
        }

        $options = stream_context_create(['http' => [
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $data ]
            ]);

        $response = file_get_contents($url, false, $options);
        file_put_contents('response.log', $response.PHP_EOL, FILE_APPEND);
    }

    /**/
    private function checkWebhook(string $webhookUrl): void
    {
        $this->sendRequest('webhook', [
            'set' => true,
            'webhookUrl' => $webhookUrl,
        ]);
    }
}

new Listener(new Menu(), '', '');
