<?php
namespace App\Controller;
use App\Models\FirebaseModel;

class Marketing_Controller
{
    private $firebase;

    public function __construct(FirebaseModel $firebase)
    {
        $this->firebase = $firebase;
    }

    public function index()
    {
        require_once __DIR__ . '/../view/marketing.php';
    }

    // para enviar para o banco de dados
    public function store()
    {
        
        $produtos = $_POST["produtos"] ?? '';
        $preco = $_POST["preco"] ?? '';
        $estrategia = $_POST["estrategia"] ?? '';
        $comercio = $_POST["comercializacao"] ?? '';
        $localizacao = $_POST["localizacao"] ?? '';

      
  
        // pegar o id do usuário

        // Montar os dados para envio
        $data = [
            'produtos' => $produtos,
            'preco' => $preco,
            'estrategia' => $estrategia,
            'comercializacao' => $comercio,
            'localizacao' => $localizacao
        ];

        // Enviar os dados para o Firebase
        $response = $this->firebase->send_Marketing($data);

        // Verificar a resposta do Firebase
        if (isset($response['name'])) {
            // Sucesso
            echo json_encode(['success' => true, 'message' => 'Dados enviados com sucesso.']);
            header('Location: /Operacional');
            exit;
        } else {
            // Erro
            echo json_encode(['success' => false, 'message' => 'Erro ao enviar dados para o Firebase.']);
        }
    }
}
