<?php

// routes.php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->addRoute('GET', '/', ['App\Controller\DataController', 'index']);
    $r->addRoute('POST', '/', ['App\Controller\DataController', 'store']);

    $r->addRoute('GET', '/executivo', ['App\Controller\ExecutivoController', 'index']);
    $r->addRoute('POST', '/executivo', ['App\Controller\ExecutivoController', 'store']);

    $r->addRoute('GET', '/login', ['App\Controller\LoginController', 'index']);
    $r->addRoute('POST', '/login', ['', 'login']);
};
