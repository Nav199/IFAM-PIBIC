<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once __DIR__.'/../telas/cadastro.php';
require_once __DIR__.'/../controller/UserController.php';
require_once __DIR__.'/../telas/socio.php';
require_once __DIR__.'/../telas/executivo.php';
require_once __DIR__.'/../controller/partnerController.php';
require_once __DIR__.'/../controller/empreController.php';
require_once __DIR__.'/../telas/mercado.php';
require_once __DIR__.'/../controller/concorrentController.php';
require_once __DIR__.'/../controller/forneceController.php';
require_once __DIR__.'/../controller/clientController.php';
require_once __DIR__.'/../telas/financeiro/invesfixo.php';
require_once __DIR__.'/../controller/inves_Fixo_Maquinar.php';
require_once __DIR__.'/../controller/inves_Fixo_Movel.php';
require_once __DIR__.'/../controller/inves_Fixo_Veicu.php';

if (isset($_POST['cadastrar'])) {
    $user = new CadastroController();
    $user->cadastrarUsuario();
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['idUsuario'])) {

    //Json
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    // Dados do sócio principal
    if ($data === null) {
        echo json_encode(array("success" => false, "message" => "Erro de decodificação JSON: " . json_last_error_msg()));
        exit;
    }
    if($data !== null)
    {
        $socios = $data["Socios"];

        foreach($socios as $item)
        {
            $socio = new SocioController();
            $socio->adicionarSocio($item["nomeSocio"],$item["telefoneSocio"],$item["ruaSocio"],$item["cidadeSocio"],$item["estadoSocio"],$item["capitalSocio"],$item["curriculoSocio"],$item["idUsuario"]);
        }
    }
} 

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['idUsuario']) && isset($_POST['idSocio'])) {
    $empre = new EmpreendimentoController();
    $empre->cadastrarEmpreendimento();
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $client = new ClientController();
    $client->cadastrar_client();
    $concorrent = new ConcorrentController();
    $concorrent->cadastrar_Concorrente();
    $forne = new FornecedorController();
    $forne->cadastrarFornecedor();
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    if ($data !== null) {
        $maquinas_e_equipamentos = $data["maquinas_e_equipamentos"];
        $moveis_e_utensilios = $data["moveis_e_utensilios"];
        $veiculos = $data["veiculos"];

        foreach ($maquinas_e_equipamentos as $item) {
            $investimento = new Investimento_Fixo_Maquina();
            $investimento->Adicionar_Inves($item["descricao"], $item["quantidade"], $item["valor_unitario"], $item["total"]);
        }

        foreach ($moveis_e_utensilios as $item) {
            $investimento = new Fixo_Movel_Controller();
            $investimento->Adicinar_Movel($item["descricao"], $item["quantidade"], $item["valor_unitario"], $item["total"]);
        }
        
        foreach ($veiculos as $item) {
            $investimento = new Fixo_Veicu_Controller();
            $investimento->Adicionar_Veiculo($item["descricao"], $item["quantidade"], $item["valor_unitario"], $item["total"]);
        }

        $response = array("success" => true, "message" => "Dados recebidos com sucesso!");
        var_dump($jsonData);
        echo json_encode($response);
    } else {
        // O JSON não foi decodificado corretamente, há um problema nos dados recebidos
        $response = array("success" => false, "message" => "Erro ao decodificar dados JSON!");
        echo json_encode($response);
    }
}
exit();