<?php
// verifiacr login
namespace App\Controller;
require_once __DIR__.'/ExecutivoController.php';
require_once __DIR__.'/../vendor/autoload.php';
use App\Models\FirebaseModel;


class LoginController
{
    private $firebase;

    public function __construct(FirebaseModel $firebase)
    {
        $this->firebase = $firebase;
    }

    public function login(){
        $user = $_POST['login'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if(!empty($user) && !empty($senha)){
            $dados = $this->firebase->getElements($user);
            if ($dados && isset($dados['senha']) && $dados['senha'] === $senha) {
                // Usuário autenticado
                echo json_encode(['success' => true, 'message' => 'Login bem-sucedido.']);
                header('Location: /../view/criar_plano.php');
                exit; 
                /*$executivo = new ExecutivoController($this->firebase);
                $executivo->store($dados);*/
            }
        }
    }

    public function index(){
        require_once __DIR__.'/../view/login.php';
    }
}
