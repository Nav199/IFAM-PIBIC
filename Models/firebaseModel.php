<?php

namespace App\Models;
use GuzzleHttp\Client;

class FirebaseModel
{
    private $firebaseURL; // url do firebase
    private $firebaseSecret; // api
    private $httpClient; //cliente

    public function __construct($firebaseURL,$firebaseSecret)
    {
        $this->firebaseURL = $firebaseURL;
        $this->firebaseSecret = $firebaseSecret;
        $this->httpClient = new Client();
    }

    public function sendData($data){
        $response = $this->httpClient->post("$this->firebaseURL/usuario.json",[
            'json'=>$data,
            'query'=>['auth'=>$this->firebaseSecret],
        ]);
        return json_decode($response->getBody(),true);
    }

    public function getElements($user) {
        $response = $this->httpClient->get("$this->firebaseURL/usuario.json", [
            'query' => ['auth' => $this->firebaseSecret],
        ]);
    
        $dadosUsuarios = json_decode($response->getBody(), true);
    
        foreach ($dadosUsuarios as $usuario) {
            if (isset($usuario['email']) && $usuario['email'] === $user) {
                print_r($dadosUsuarios);
                return $usuario;
            }
        }
        
        foreach ($dadosUsuarios as $usuario) {
            if (isset($usuario['CPF']) && $usuario['CPF'] === $user) {
                print_r($dadosUsuarios);
                return $usuario;
            }
        }
        

        return null; // Usuário não encontrado
    }
    public function getdados() {
        $response = $this->httpClient->get("$this->firebaseURL/usuario.json", [
            'query' => ['auth' => $this->firebaseSecret],
        ]);
    
        $dadosUsuarios = json_decode($response->getBody(), true);
        return $dadosUsuarios;
    }

}
