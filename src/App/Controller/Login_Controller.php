<?php

namespace App\Controller;
require_once 'vendor/autoload.php';
use App\Models\FirebaseModel;

class LoginController
{
    private $firebase;

    public function __construct(FirebaseModel $firebase)
    {
        $this->firebase = $firebase;
    }

    public function login()
    {
        $user = $_POST['login'] ?? '';
        $senha = $_POST['senha'] ?? '';
    
        // Verificar login
        $verificar = $this->firebase->verifyUserCredentials($user, $senha);
    
        if ($verificar) {
            // Redirecionar para a página home
            header('Location:  /../view/home.php');
            exit;            
        } else {
            // Se o login falhar, redirecionar de volta para a página de login
            echo 'Redirecionando para login';
            header('Location: /../view/login.php');
            exit(); // Certifique-se de usar exit() após o redirecionamento
        }
        
    }

    public function index()
    {
        require_once __DIR__.'/../view/login.php';
    }
}
