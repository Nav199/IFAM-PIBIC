<?php
// Controller Investimento Fixo
namespace App\Controller;
use App\Models\FirebaseModel;

class Inves_fixo_Controller
{

    private $firebase;

    public function __construct(FirebaseModel $firebase)
    {
        $this->firebase = $firebase;
    }

    public function index(){
       require_once __DIR__.'/../view/inve_fixo.php';
    }

    public function store()
    {
        $tabelasValidas = array();
        $subtotaisValidos = array();
    
        // Verifica se há dados na tabela 1 e se o subtotal 1 é válido
        if (!empty($_POST['descricao']) && isset($_POST['subtotal']) && is_numeric($_POST['subtotal'])) {
            $tabelasValidas['tabela_1'] = $_POST['descricao'];
            $subtotaisValidos['subtotal'] = $_POST['subtotal'];
        }
    
        // Verifica se há dados na tabela 2 e se o subtotal 2 é válido
        if (!empty($_POST['descricao_2']) && isset($_POST['subtotal_2']) && is_numeric($_POST['subtotal_2'])) {
            $tabelasValidas['tabela_2'] = $_POST['descricao_2'];
            $subtotaisValidos['subtotal_2'] = $_POST['subtotal_2'];
        }
    
        // Verifica se há dados na tabela 3 e se o subtotal 3 é válido
        if (!empty($_POST['descricao_3']) && isset($_POST['subtotal_3']) && is_numeric($_POST['subtotal_3'])) {
            $tabelasValidas['tabela_3'] = $_POST['descricao_3'];
            $subtotaisValidos['subtotal_3'] = $_POST['subtotal_3'];
        }
    
        $Data_Fixo = [
            'Tabela' => $tabelasValidas,
            'sub_total' => $subtotaisValidos
        ];
    
        $response = $this->firebase->send_Investimento_fixo($Data_Fixo);
        if ($response['name']) {
            // Sucesso
            echo json_encode(['success' => true, 'message' => 'Dados enviados com sucesso.']);
            exit;
        } else {
            // Falha no envio
            echo json_encode(['success' => false, 'message' => 'Falha ao enviar dados para o Firebase.']);
            exit;
        }
    }
    
     

}