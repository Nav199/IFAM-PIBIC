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
        // Pegando o id do usuário
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
    
        // Verifica se todos os dados estão presentes antes de prosseguir
        if (
            $nome_empresa &&
            $CPF &&
            $setores &&
            $cep &&
            $localidade &&
            $bairro &&
            $logradouro &&
            $numero &&
            $missao &&
            $valores &&
            $visao &&
            $fonte &&
            $ultimoIdUsuario
        ) {
            $Data = [
                'nome_empresa' => $nome_empresa,
                'CPF' => $CPF,
                'setores' => $setores,
                'cep' => $cep,
                'localidade' => $localidade,
                'bairro' => $bairro,
                'logradouro' => $logradouro,
                'numero' => $numero,
                'missao' => $missao,
                'valores' => $valores,
                'visao' => $visao,
                'fonte' => $fonte,
                'id_user' => $ultimoIdUsuario,
            ];
    
            // Adicionando um log para verificar os dados antes de enviá-los para o Firebase
            echo '<script>console.log("Dados a serem enviados para o Firebase:", ' . json_encode($Data) . ');</script>';
    
            $response = $this->firebase->sendData_Executivo($Data);
    
            if (isset($response['name'])) {
                // Sucesso
                header('Location: /../view/mercado.php');
                exit;
            } else {
                // Erro
                echo '<script>console.log("Erro ao enviar dados para o Firebase.");</script>';
            }
        } else {
            // Se algum dado estiver faltando, exiba uma mensagem de erro ou faça o tratamento adequado
            echo 'Erro: Algum dado está faltando para salvar no Firebase.';
        }
    }
    
}

