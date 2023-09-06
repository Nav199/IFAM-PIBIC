<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


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
require_once __DIR__.'/../telas/esti_custo_obra.php';
require_once __DIR__.'/../controller/mao_obraController.php';
//index de cadastro
if (isset($_POST['cadastrar'])) {
    $user = new CadastroController();
    $user->cadastrarUsuario();
}



if ($_SERVER['REQUEST_METHOD'] === "POST"  && isset($_POST["idUsuario"])) {
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);
    $socio = new SocioController();
    if ($data !== null && isset($data["Socios"]) && isset($_POST["idUsuario"])) {
        $idUsuario = $_POST["idUsuario"];
        $socios = $data["Socios"];

        foreach ($socios as $item) {
            $nome = $item["nome"];
            $telefone = $item["telefone"];
            $curriculo = $item["curriculo"];
            $endereco = $item["endereco"];
            $estado = $item["estado"];
            $cidade = $item["cidade"];
            $capital = $item["capital"];
            
            $socio->adicionarSocio($nome,$telefone,$endereco,$cidade,$estado,$capital,$curriculo,$idUsuario);
        }
        
        // Responda com uma mensagem de sucesso
        echo json_encode(array("success" => true, "message" => "Dados recebidos e processados com sucesso."));
    } else {
        // Responda com uma mensagem de erro
        echo json_encode(array("success" => false, "message" => "Erro ao processar os dados recebidos."));
    }
} else {
    // Responda com uma mensagem de erro se o método da solicitação não for POST
    echo json_encode(array("success" => false, "message" => "Método inválido."));
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['idUsuario'])) {
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

if($_SERVER['REQUEST_METHOD'] === "POST")
{
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    if($data !=null)
    {
        foreach ($data as $row) {
            $mao = new mao_obraController();
            $mao->cadastrar_mao( $row['funcao'], $row['empregados'], $row['salario'], $row['subtotal'], $row['encargos'], $row['calcuEncarg'], $row['total']);
        }
        $response = array("success" => true, "message" => "Dados recebidos com sucesso!");
        var_dump($jsonData);
        echo json_encode($response);
    }
       // O JSON não foi decodificado corretamente, há um problema nos dados recebidos
       $response = array("success" => false, "message" => "Erro ao decodificar dados JSON!");
       echo json_encode($response);
}