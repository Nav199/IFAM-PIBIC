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
require_once __DIR__.'/../telas/mercado/mercado.php';
require_once __DIR__.'/../controller/concorrentController.php';
require_once __DIR__.'/../controller/forneceController.php';
require_once __DIR__.'/../controller/clientController.php';
require_once __DIR__.'/../controller/inves_Fixo_Maquinar.php';
require_once __DIR__.'/../controller/inves_Fixo_Movel.php';
require_once __DIR__.'/../controller/inves_Fixo_Veicu.php';
require_once __DIR__.'/../controller/mao_obraController.php';
//index de cadastro
if (isset($_POST['cadastrar'])) {
    $user = new CadastroController();
    $user->cadastrarUsuario();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lê os dados JSON do corpo da solicitação
    $json_data = file_get_contents('php://input');

    // Decodifica os dados JSON em um array PHP
    $dados = json_decode($json_data, true);
    $socio = new SocioController;

    if ($dados === null || !is_array($dados)) {
        // JSON decoding failed or not an array
        http_response_code(400); // Bad Request
        echo json_encode(array('error' => 'Dados JSON inválidos ou não é uma matriz'));
    } else {
        // JSON decoding succeeded
        // Itera sobre a matriz de objetos JSON e chama adicionarSocio para cada um
        foreach ($dados as $socio) {
            $socio->adicionarSocio(
                $socio['nome'],
                $socio['telefone'],
                $socio['endereco'],
                $socio['cidade'],
                $socio['estado'],
                $socio['capital'],
                $socio['curriculo'],
                $socio['id_usuario']
            );
        }

        // Responda com uma mensagem de sucesso
        echo json_encode(array('message' => 'Sócios adicionados com sucesso'));
    }
} else {
    // Responda a solicitações não-POST com um erro
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('error' => 'Método não permitido'));
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