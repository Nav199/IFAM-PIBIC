<?php

// routes.php
namespace routes\router;
use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    //rota cadastro
    $r->addRoute('GET', '/', ['App\Controller\DataController', 'index']);
    $r->addRoute('POST', '/', ['App\Controller\DataController', 'store']);

    //rota de executivo
    $r->addRoute('GET', '/executivo', ['App\Controller\ExecutivoController', 'index']);
    $r->addRoute('POST', '/executivo', ['App\Controller\ExecutivoController', 'store']);

    //rota de mercado

    $r->addRoute('GET','/mercado',['App\Controller\Mercado_Controller','index']);
    $r->addRoute('POST','/mercado',['App\Controller\Mercado_Controller','store']);

    //rota de marketing

    $r->addRoute('GET','/marketing',['App\Controller\marketing_controller'],'index');

    //rota de investimento fixo

    //rota do login
    $r->addRoute('GET', '/login', ['App\Controller\LoginController', 'index']);
    $r->addRoute('POST', '/login', ['', 'login']);


    // rota de Home

    $r->addRoute('GET','/Home',['App\Controller\HomeController','index']);

    
};
