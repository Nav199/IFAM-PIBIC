<?php
namespace App\Controller;



class HomeController
{
    public function index(){
        require_once __DIR__.'/../view/home.php';
    }
}