<?php

declare(strict_types=1);

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/database/firebase.php';
require_once __DIR__.'/Models/firebaseModel.php';
require_once __DIR__.'/Controller/DataController.php';
require_once __DIR__.'/Controller/Login_Controller.php';
use App\Controller\DataController;
use App\Controller\LoginController;
use App\Models\FirebaseModel;

$firebase_url = $firebaseURL;
$firebase_token = $firebaseToken;

$firebase_Model = new FirebaseModel($firebase_url, $firebase_token);

if (!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/') {
    require_once __DIR__.'/view/cadastro.php';
    $data = new DataController($firebase_Model);
    $data->store();

} elseif ($_SERVER['PATH_INFO'] === '/login') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $veri_login = new LoginController($firebase_Model);
        $veri_login->login();
    }elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
        require_once __DIR__.'/view/login.php';
    }
} elseif ($_SERVER['PATH_INFO'] === '/home') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
    }elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
        require_once __DIR__.'/view/home.php';
    }
    elseif ($_SERVER['PATH_INFO'] === '/perfil') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
        }elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
            require_once __DIR__.'/view/perfil.php';
        }
    } 
    elseif ($_SERVER['PATH_INFO'] === '/user') {
            require_once __DIR__.'/view/name.php';
    } 
}
