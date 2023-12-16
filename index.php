<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/database/firebase.php';
require_once __DIR__.'/Models/firebaseModel.php';
require_once __DIR__.'/Controller/DataController.php';
require_once __DIR__.'/Controller/ExecutivoController.php';
require_once __DIR__.'/Controller/MercadoController.php';
use App\Controller\DataController;
use App\Controller\ExecutivoController;
use App\Controller\Mercado_Controller;
use App\Models\FirebaseModel;
use App\Controller\LoginController;

$firebase_url = $firebaseURL;
$firebase_token = $firebaseToken;

$firebase_Model = new FirebaseModel($firebase_url, $firebase_token);

//sessão
session_start();

// Verifica a existência e conteúdo do PATH_INFO
if (!array_key_exists('PATH_INFO', $_SERVER) || empty($_SERVER['PATH_INFO']) || $_SERVER['PATH_INFO'] === '/') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dataController = new DataController($firebase_Model);
        $dataController->store();
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $dataController = new DataController($firebase_Model);
        $dataController->index();
    }
    elseif ($_SERVER['PATH_INFO'] === '/home') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lógica para o método POST em '/home'
        } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once __DIR__.'/view/home.php';
        }
    } elseif ($_SERVER['PATH_INFO'] === '/perfil') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lógica para o método POST em '/perfil'
        } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once __DIR__.'/view/perfil.php';
        }
    } elseif ($_SERVER['PATH_INFO'] === '/user') {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once __DIR__.'/view/name.php';
        }
    }
} 
    //POST DE EXECUTIVO
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $executivoController = new ExecutivoController($firebase_Model);
        $executivoController->store();

    }

    //POST DE ANALISE DE MERCADO
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $mercadoController = new Mercado_Controller($firebase_Model);
        $mercadoController->store();
    } 



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginController = new LoginController($firebase_Model);
    $loginController->login();
}

