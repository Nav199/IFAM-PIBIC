<?php

// index.php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/database/firebase.php';

use FastRoute\RouteCollector;
use FastRoute\Dispatcher;
use App\Models\FirebaseModel;

// Configuração das rotas
$dispatcher = FastRoute\simpleDispatcher(require_once __DIR__.'/routes/routes.php');

$firebase_url = $firebaseURL;
$firebase_token = $firebaseToken;
// Manipulação da requisição
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Roteamento usando FastRoute
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        // Tratamento para rota não encontrada
        echo '404 Not Found';
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        // Tratamento para método não permitido
        echo '405 Method Not Allowed';
        break;
    case Dispatcher::FOUND:
        // A rota foi encontrada
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        //  manipulador com os parâmetros
        [$controllerClass, $method] = $handler;
        $controller = new $controllerClass(new FirebaseModel($firebaseURL, $firebaseToken));
        $controller->$method($vars);
        break;
}
