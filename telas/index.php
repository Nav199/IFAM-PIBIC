<?php
/*require_once __DIR__.'/../telas/cadastro.php';
require_once __DIR__.'/../model/UserModel.php';
require_once __DIR__.'/../model/Executivo/partnerModel.php';
require_once __DIR__.'/../model/Executivo/EmpreModel.php';
require_once __DIR__.'/../model/Executivo/formModel.php';
require_once __DIR__.'/../model/Executivo/capital_socio.php';
require_once __DIR__.'/../telas/socio.php';
require_once __DIR__.'/../telas/executivo.php';
require_once __DIR__.'/../model/Database.php';
require_once __DIR__.'/../model/Executivo/enquaModel.php';
require_once __DIR__.'/../telas/mercado.php';
// Cadastro de usuário
if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    // Validar o formato do email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script language='javascript'>window.alert('Formato de email inválido!');</script>";
        echo "<script language='javascript'>window.location='cadastro.php';</script>";
        exit; // Parar a execução caso o email seja inválido
    }

    // Validar o formato do CPF
    $cpf = preg_replace('/[^0-9]/', '', $cpf); // Remover caracteres não numéricos do CPF

    if (strlen($cpf) !== 11) {
        echo "<script language='javascript'>window.alert('CPF inválido! O CPF deve ter 11 caracteres.');</script>";
        echo "<script language='javascript'>window.location='cadastro.php';</script>";
        exit; // Parar a execução caso o CPF seja inválido
    }

    // Resto do seu código...
    $user = new User($nome, $email, $cpf, $senha);
    $user->createUSER();
    $lastInsertedId = $user->getLastInsertedId();
    echo "<script language='javascript'>window.alert('Sucesso ao cadastrar');</script>";
    echo "<script language='javascript'>window.location='socio.php?id=" . $lastInsertedId . "';</script>";

}



if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['idUsuario'])) {
    // Dados do sócio principal
    $nomeSocio = $_POST["nomeSocio"];
    $telefoneSocio = $_POST["telefoneSocio"];
    $ruaSocio = $_POST["ruaSocio"];
    $cidadeSocio = $_POST["cidadeSocio"];
    $estadoSocio = $_POST["estadoSocio"];
    $capitalSocio = $_POST["capitalSocio"];
    $curriculoSocio = $_POST["curriculoSocio"];
    $id_usuario = $_POST['idUsuario'];

    // Criação do sócio principal
    $socioPrincipal = new Partner($nomeSocio, $ruaSocio, $cidadeSocio, $estadoSocio, $telefoneSocio, $curriculoSocio, $id_usuario);
    $socioPrincipal->createpatel();
    $lastInsertedId_socio = $socioPrincipal->getLastInsertedId();   // ID do Sócio

    // Criação da capital do sócio principal
    $capitalPrincipal = new Capital($lastInsertedId_socio, $capitalSocio);
    $capitalPrincipal->create_capital();

    // Contador de sócios
    $contadorSocios = 2;

    while (isset($_POST["nomeSocio$contadorSocios"])) {
        $nomeSocio = $_POST["nomeSocio$contadorSocios"];
        $telefoneSocio = $_POST["telefoneSocio$contadorSocios"];
        $ruaSocio = $_POST["ruaSocio$contadorSocios"];
        $cidadeSocio = $_POST["cidadeSocio$contadorSocios"];
        $estadoSocio = $_POST["estadoSocio$contadorSocios"];
        $capitalSocio = $_POST["capitalSocio$contadorSocios"];
        $curriculoSocio = $_POST["curriculoSocio$contadorSocios"];

        // Criação do sócio adicional
        $socio = new Partner($nomeSocio, $ruaSocio, $cidadeSocio, $estadoSocio, $telefoneSocio, $curriculoSocio, $id_usuario);
        $socio->createpatel();
        $lastInsertedId_socio = $socio->getLastInsertedId();

        // Criação da capital do sócio adicional
        $capital = new Capital($lastInsertedId_socio, $capitalSocio);
        $capital->create_capital();

        $contadorSocios++;
    }

    echo "<script language='javascript'>window.alert('Sucesso ao cadastrar');</script>";
    echo "<script language='javascript'>window.location='executivo.php?idUsuario=" . $id_usuario . "&idSocio=" . $lastInsertedId_socio . "';</script>";
    exit; // Adicionado para interromper a execução após o redirecionamento
}

    

if (isset($_POST['Enviar'])) {
    // Dados do empreendimento
    $nome_empresa = isset($_POST['Nome']) ? $_POST['Nome'] : '';
    $missao = isset($_POST['missao']) ? $_POST['missao'] : '';
    $visao = isset($_POST['visao']) ? $_POST['visao'] : '';
    $valores = isset($_POST['valores']) ? $_POST['valores'] : '';
    $resu = isset($_POST['Recursos']) ? $_POST['Recursos'] : '';
    $forma = isset($_POST['formaJuridica']) ? $_POST['formaJuridica'] : '';
    $enqua = isset($_POST['enquadramento']) ? $_POST['enquadramento'] : '';
    $id_socio = $_POST['idSocio'];
    $id_usuario = $_POST['idUsuario'];

    if (isset($_POST['setor'])) {
        foreach ($_POST['setor'] as $setor) {
            $empre = new Empreendimento($nome_empresa, $missao, $visao, $valores, $setor, $resu, $id_socio, $id_usuario);
            $empre->create_empre();
        }
    }

    if (isset($empre)) {
        $lastInsertedId_empre = $empre->getLastInsertedId();

        // Cria o objeto forma_juri com o ID correto
        $forma_juri = new juridico($lastInsertedId_empre, $forma);
        $forma_juri->create_form();
        $lastInsertedId_form = $forma_juri->getLastInsertedId();

        $enquadramento = new Enquadramento($enqua, $lastInsertedId_form);
        $enquadramento->createEnq();

        if ($lastInsertedId_empre && $lastInsertedId_form) {
            echo "<script language='javascript'>window.alert('Sucesso ao cadastrar.');</script>";


            echo "<script language='javascript'>window.location.href='mercado.php?id=" . $lastInsertedId_empre . "';</script>";
            exit; // Adicionado para interromper a execução após o redirecionamento
        } else {
            echo "<script language='javascript'>window.alert('Erro ao cadastrar empreendimento.');</script>";
        }
    }
}

    //Analise de Mercado

    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $cont_concorrente = 0;
        // Processa os dados dos concorrentes
        while(true){
            $qualidadeConcorrentes = $_POST["qualidadeConcorrente$cont_concorrente"];
            $precoConcorrentes = $_POST["precoConcorrente"];
            $condicoesPagamentoConcorrentes = $_POST["condicoesPagamentoConcorrente$cont_concorrente"];
            $localizacaoConcorrentes = $_POST["localizacaoConcorrente$cont_concorrente"];
            $atendimentoConcorrentes = $_POST["atendimentoConcorrente$cont_concorrente"];
            $servicoClientesConcorrentes = $_POST["servicoClientesConcorrente$cont_concorrente"];
            $garantiasConcorrentes = $_POST["garantiasConcorrente$cont_concorrente"];




            $cont_concorrente++;
        }
        
    }
    */

    require_once __DIR__.'/../telas/cadastro.php';
    require_once __DIR__.'/../controller/UserController.php';
    require_once __DIR__.'/../telas/socio.php';
    require_once __DIR__.'/../telas/executivo.php';
    require_once __DIR__.'/../controller/partnerController.php';
    require_once __DIR__.'/../controller/empreController.php';
    

    if(isset($_POST['cadastrar']))
    {
        $user = new CadastroController();
        $user->cadastrarUsuario();
    }

    if (isset($_POST['Enviar']) && isset($_POST['idUsuario'])) {
        // Dados do sócio principal
        $partner = new SocioController();
        $partner->adicionarSocio();
    } 
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['idUsuario']) && isset($_POST['idSocio'])) {
        $empre = new EmpreendimentoController();
        $empre->cadastrarEmpreendimento();
    }
    