<?php 

namespace Classes;

use GuzzleHttp\Client as Guzzle;

class Client{
    protected $client;
    protected $response;

    public function __construct(){
        $this->client = new Guzzle([ 'exceptions' => false ]);
    }

    public function post($url, $data){
        return $this->fire(
            $this->client->post($url, $data)
        );
    }

    public function response(){
        return $this->response;
    }

    protected function fire($response){
        return $this->response = json_decode($response->getBody());
    }
}