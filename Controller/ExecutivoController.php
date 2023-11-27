<?php
namespace App\Controller;
use App\Models\FirebaseModel;

class ExecutivoController
{
    private $firebase;
    
    public function __construct(FirebaseModel $firebase)
    {
        $this->firebase = $firebase;
    }

    public function index()
    {
        require_once __DIR__.'/../view/plano_executivo/plano_executivo.php';
    }

    public function store($user)
    {
        if (empty($user)) {
            // Lidar com o caso em que o ID do usuário não está presente
            echo json_encode(['success' => false, 'message' => 'ID do usuário ausente.']);
            exit;
        }

        $Nome = $_POST['nomeEmpresa'] ?? '';
        $CPF_CNPJ = $_POST['cnpjCpf'] ?? '';
        $missao = $_POST['missaoEmpresa'] ?? '';
        $visao = $_POST['visaoEmpresa'] ?? '';
        $valores = $_POST['valoresEmpresa'] ?? '';
        $setor = $_POST['setorAtividade'] ?? '';
        $cep = $_POST['cep'] ?? '';
        $localidade = $_POST['localidade'] ?? '';
        $bairro = $_POST['bairroDistrito'] ?? '';
        $logra = $_POST['logradouro'] ?? '';
        $numero = $_POST['numero'] ?? '';
        $fonteRecursos = $_POST['fonteRecursos'] ?? '';
       
        // Obtenha o ID do usuário
        $id_usuario = $this->firebase->getUserId($user);

        if (!$id_usuario) {
            // Lidar com o caso em que o usuário não foi encontrado
            echo json_encode(['success' => false, 'message' => 'Usuário não encontrado.']);
            exit;
        }

        $data = [
            'nome' => $Nome,
            'CNPJ/CPF' => $CPF_CNPJ,
            'missao' => $missao,
            'visao' => $visao,
            'valores' => $valores,
            'setor' => $setor,
            'cep' => $cep,
            'localidade' => $localidade,
            'bairro' => $bairro,
            'logradouro' => $logra,
            'numero' => $numero,
            'fonteRecursos' => $fonteRecursos,
            'id_usuario' => $id_usuario
        ];

        $response = $this->firebase->sendData_Executivo($data);

        if (isset($response['name'])) {
            // Sucesso
            echo json_encode(['success' => true, 'message' => 'Dados enviados com sucesso.']);
        } else {
            // Erro
            echo json_encode(['success' => false, 'message' => 'Erro ao enviar dados para o Firebase.']);
        }
        
        // Move a lógica de redirecionamento para o final do script
        require_once __DIR__.'/../view/mercado.php';
        exit;
        
    }
}
?>
