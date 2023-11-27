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

if (!array_key_exists('PATH_INFO', $_SERVER) || empty($_SERVER['PATH_INFO']) || $_SERVER['PATH_INFO'] === '/') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = new DataController($firebase_Model);
        $data->store();
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $data = new DataController($firebase_Model);
        $data->index();
    }
} elseif ($_SERVER['PATH_INFO'] == '/Executivo') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recupere o ID do usuário do PATH
        $pathParts = explode('/', $_SERVER['PATH_INFO']);
        $user = end($pathParts);

        // Variável para chamar o Controller do Executivo
        $data_executivo = new ExecutivoController($firebase_Model);
        $data_executivo->store($user,$data);
    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $data_executivo = new ExecutivoController($firebase_Model);
        $data_executivo->index();
    }
} elseif ($_SERVER['PATH_INFO'] === '/Mercado') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $mercado = new Mercado_Controller($firebase_Model);
        $mercado->store();
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $mercado = new Mercado_Controller($firebase_Model);
        $mercado->index();
    }
}  elseif ($_SERVER['PATH_INFO'] === '/Login') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = new LoginController($firebase_Model);
        $login->login();
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $login = new LoginController($firebase_Model);
        $login->index();
    }
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
