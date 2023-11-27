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

    public function sendData($data){ //envio para a tabela usuário
        $response = $this->httpClient->post("$this->firebaseURL/Usuário.json",[
            'json'=>$data,
            'query'=>['auth'=>$this->firebaseSecret],
        ]);
        return json_decode($response->getBody(),true);
    }

    public function getUserId($user)
    {
        $response = $this->httpClient->get("$this->firebaseURL/Usuário.json", [
            'query' => ['auth' => $this->firebaseSecret],
        ]);

        $dadosUsuarios = json_decode($response->getBody(), true);

        foreach ($dadosUsuarios as $usuarioId => $usuario) {
            if (isset($usuario['email']) && $usuario['email'] === $user) {
                return $usuarioId;
            }

            if (isset($usuario['CPF']) && $usuario['CPF'] === $user) {
                return $usuarioId;
            }
        }

        return null; // Usuário não encontrado
    }
    public function getdados() {
        $response = $this->httpClient->get("$this->firebaseURL/.json", [
            'query' => ['auth' => $this->firebaseSecret],
        ]);
    
        $dadosUsuarios = json_decode($response->getBody(), true);


        return $dadosUsuarios;
    }

    //envio de plano executivo
    public function sendData_Executivo($data){ 
        $response = $this->httpClient->post("$this->firebaseURL/Executivo.json",[
            'json'=>$data,
            'query'=>['auth'=>$this->firebaseSecret],
        ]);
        return json_decode($response->getBody(),true);
    }

    //envio do analise de mercado
    public function sendData_Mercado($data){ 
        $response = $this->httpClient->post("$this->firebaseURL/Análise_Mercado.json",[
            'json'=>$data,
            'query'=>['auth'=>$this->firebaseSecret],
        ]);
        return json_decode($response->getBody(),true);
    }
}
