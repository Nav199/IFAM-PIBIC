<?php
namespace App\Controller;
use App\Models\FirebaseModel;

class ExecutivoController
{
    private $firebase;
    private $id_usuario;
    public function __construct(FirebaseModel $firebase)
    {
        $this->firebase = $firebase;
    }

    public function index(){
        require_once __DIR__.'/../view/executivo.php';
    }

    public function store($user){
        $Nome = $_POST['Nome'] ?? '';
        $missao = $_POST['missao'] ?? '';
        $visao = $_POST['visao'] ?? '';
        $valores = $_POST['Recursos'];
        $id_usuario = $this->firebase->getElements($user);
        if(isset($_POST['setor'])){
            foreach ($_POST['setor'] as $setor){
                if(!empty($Nome) && !empty($missao) &&!empty($email) && !empty($visao) && !empty($valores) && !empty($setor)){

                    $data = [
                        'nome'=>$Nome,
                        'missao' =>$missao,
                        'visao'=>$visao,
                        'valores'=>$valores,
                        'setor'=>$setor,
                        'id_usuario'=>$id_usuario
                    ];
                    $response = $this->firebase->sendData($data);

                    if (isset($response['name'])) {
                        // Sucesso
                        echo json_encode(['success' => true, 'message' => 'Dados enviados com sucesso.']);
                        
                    } else {
                        // Erro
                        echo json_encode(['success' => false, 'message' => 'Erro ao enviar dados para o Firebase.']);
                    }
                }
            }
        }
    }
}