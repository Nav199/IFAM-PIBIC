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
        require_once __DIR__.'/../view/plano_executivo.php';
    }

    public function store()
    {
        //pegando o id do usuário

        $ultimoIdUsuario = $this->firebase->getUltimoIdUsuario(); 

        // Os dados que devem ser armazenados no Firebase
        $nome_empresa = $_POST["nomeEmpresa"] ?? '';
        $CPF = $_POST["cnpjCpf"] ?? '';
        $setores = isset($_POST["setorAtividade"]) ? $_POST["setorAtividade"] : '';
        $cep = $_POST["cep"] ?? '';
        $localidade = $_POST["localidade"] ?? '';
        $bairro = $_POST["bairroDistrito"] ?? '';
        $logradouro = $_POST["logradouro"] ?? '';
        $numero = $_POST["numero"] ?? '';
        $missao = $_POST["missaoEmpresa"] ?? '';
        $valores = $_POST["valoresEmpresa"] ?? '';
        $visao = $_POST["visaoEmpresa"] ?? '';
        $fonte = $_POST["fonteRecursos"] ?? '';
    
        $Data = [
            'nome_empresa' => $nome_empresa,
            'CPF' => $CPF,
            'setores' =>  $setores,
            'cep' => $cep,
            'localidade' => $localidade,
            'bairro' => $bairro,
            'logradouro' => $logradouro,
            'numero' => $numero,
            'missao' => $missao,
            'valores' => $valores,
            'visao' => $visao,
            'fonte' => $fonte,
            'id_user'=>$ultimoIdUsuario
        ];
    
        $response = $this->firebase->sendData_Executivo($Data);
    
        
        if (isset($response['name'])) {
            // Sucesso
            header('Location: /../view/mercado.php');
            exit;
        } else {
            // Erro
            echo '<script>console.log("Erro ao enviar dados para o Firebase.");</script>';
        }
    }
    
}

