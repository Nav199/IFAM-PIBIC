<?php
namespace App\Controller;
use App\Models\FirebaseModel;

class Mercado_Controller {
    private $firebase;

    public function __construct(FirebaseModel $firebase)
    {
        $this->firebase = $firebase;
    }

    public function index(){
       require_once __DIR__.'/../view/mercado.php';
    }

    public function store() {
        // Público Alvo
        $data['publico'] = $_POST['publico'] ?? '';
        $data['comportamento'] = $_POST['comportamento'] ?? '';
        $data['area'] = $_POST['area'] ?? '';

        // Fornecedores
        $data['fornecedores'] = array();
        $contadorFornecedores = $_POST['contadorFornecedores'] ?? 0;

        for ($i = 0; $i < $contadorFornecedores; $i++) {
            $descricao = $_POST['descricaoFornecedor' . $i] ?? '';
            $nome = $_POST['nomeFornecedor' . $i] ?? '';
            $preco = $_POST['precoFornecedor' . $i] ?? '';
            $pagamento = $_POST['pagamentoFornecedor' . $i] ?? '';
            $prazoEntrega = $_POST['prazoEntregaFornecedor' . $i] ?? '';
            $localizacao = $_POST['localizacaoFornecedor' . $i] ?? '';

            // Cria um array com os dados de cada fornecedor
            $fornecedor = array(
                'descricao' => $descricao,
                'nome' => $nome,
                'preco' => $preco,
                'pagamento' => $pagamento,
                'prazoEntrega' => $prazoEntrega,
                'localizacao' => $localizacao
            );

            // Adiciona os dados do fornecedor ao array
            $data['fornecedores'][] = $fornecedor;
        }

        // Concorrentes
        $data['concorrentes'] = array();
        $contadorConcorrentes = $_POST['contadorConcorrentes'] ?? 0;

        for ($i = 0; $i < $contadorConcorrentes; $i++) {
            $qualidade = $_POST['qualidadeConcorrente' . $i] ?? '';
            $nomeConcorrente = $_POST['nomeConcorrente' . $i] ?? '';
            $precoConcorrente = $_POST['precoConcorrente' . $i] ?? '';
            $pagamentoConcorrente = $_POST['pagamentoConcorrente' . $i] ?? '';
            $servicoConcorrente = $_POST['servicoConcorrente' . $i] ?? '';
            $garantiasConcorrente = $_POST['garantiasConcorrente' . $i] ?? '';
            $localizacaoConcorrente = $_POST['localizacaoConcorrente' . $i] ?? '';

            // Cria um array com os dados de cada concorrente
            $concorrente = array(
                'qualidade' => $qualidade,
                'nome' => $nomeConcorrente,
                'preco' => $precoConcorrente,
                'pagamento' => $pagamentoConcorrente,
                'servicoCliente' => $servicoConcorrente,
                'garantias' => $garantiasConcorrente,
                'localizacao' => $localizacaoConcorrente
            );

            // Adiciona os dados do concorrente ao array
            $data['concorrentes'][] = $concorrente;
        }

        $response = $this->firebase->sendData_Mercado($data);
        
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
