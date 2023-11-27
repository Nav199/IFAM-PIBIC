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


        if(!empty($nome) && !empty($CPF) &&!empty($email) && !empty($senha)){

            if ($this->firebase->getUserId($email) || $this->firebase->getUserId($CPF)) {
                echo json_encode(['success' => false, 'message' => 'Email e CPF já cadastrados']);
                require_once __DIR__.'/../view/cadastro.php';
                exit;
            }
            
                $data = [
                    'nome' => $nome,
                    'CPF' => $CPF,
                    'email' =>$email,
                    'senha' =>$senha
                ];

                $response = $this->firebase->sendData($data);

                if (isset($response['name'])) {
                    // Sucesso
                    echo json_encode(['success' => true, 'message' => 'Dados enviados com sucesso.']);
                    header('Location: /../view/home.php');
                    exit; 
                } else {
                    // Erro
                    echo json_encode(['success' => false, 'message' => 'Erro ao enviar dados para o Firebase.']);
                }
            }
           
        }
}
