<?php

namespace Classes;

class Captcha extends BaseController{ 
    
    protected $client;
    protected $token;
    protected $secretKey;

    public function __construct($token){
        parent::__construct();
        $this->client = new Client;
        $this->token = $token;
        $this->secretKey = $this->config['recaptcha_secret_key'];
    }

    public function check(){
        $this->client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret'    => $this->secretKey,
                'response'  => $this->token
            ]
        ]);
        return $this->client->response()->success;
    }

}