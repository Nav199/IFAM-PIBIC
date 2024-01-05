<?php
namespace App\Controller;
use App\Models\FirebaseModel;
class DataController
{
    private $firebase;

    public function __construct(FirebaseModel $firebase)
    {
        $this->firebase = $firebase;
    }

    public function index(){
       require_once __DIR__.'/../view/cadastro.php';
    }

    public function store() {
     
        $nome = $_POST['nome'] ?? '';
        $CPF = $_POST['cpf'] ?? '';
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';
    
        if (!empty($nome) && !empty($CPF) && !empty($email) && !empty($senha)) {
            if ($this->firebase->getUserId($email) || $this->firebase->getUserId($CPF)) {
                echo '<script>alert("Email e CPF já cadastrados.");</script>';
                require_once __DIR__.'/../view/cadastro.php';
                exit;
            }
    
            // Use password_hash para armazenar a senha com segurança
            //$hashedSenha = password_hash($senha, PASSWORD_DEFAULT);
    
            $userData = [
                'nome' => $nome,
                'CPF' => $CPF,
                'email' => $email,
                'senha' => $senha, // Armazene a senha com hash
            ];
    
            $response = $this->firebase->sendData($userData);
    
            if ($response['name']) {
                // Sucesso
                echo json_encode(['success' => true, 'message' => 'Dados enviados com sucesso.']);
                header('Location: /Home');
                exit;
            } else {
                // Erro
                echo json_encode(['success' => false, 'message' => 'Erro ao enviar dados para o Firebase.']);
            }
        }
    }
    
}
