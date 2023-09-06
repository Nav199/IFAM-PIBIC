<?php

require_once __DIR__.'/../model/Executivo/EmpreModel.php';
require_once __DIR__.'/../model/Executivo/formModel.php';
require_once __DIR__.'/../model/Executivo/enquaModel.php';

class EmpreendimentoController {
    public function cadastrarEmpreendimento() {
        $nome_empresa = isset($_POST['Nome']) ? $_POST['Nome'] : '';
        $missao = isset($_POST['missao']) ? $_POST['missao'] : '';
        $visao = isset($_POST['visao']) ? $_POST['visao'] : '';
        $valores = isset($_POST['valores']) ? $_POST['valores'] : '';
        $resu = isset($_POST['Recursos']) ? $_POST['Recursos'] : '';
        $forma = isset($_POST['formaJuridica']) ? $_POST['formaJuridica'] : '';
        $enqua = isset($_POST['enquadramento']) ? $_POST['enquadramento'] : '';
        $id_usuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : '';
        
        $id_empre = null; // Inicialize a variável $id_empre aqui
        
        if (isset($_POST['setor'])) {
            foreach ($_POST['setor'] as $setor) {
                $empre = new Empreendimento($nome_empresa, $missao, $visao, $valores, $setor, $resu, $id_usuario);
                $id_empre = $empre->create_empre(); // Atribua o ID do empreendimento
            }
        }

        // Criação do objeto forma Jurídica
        $form = new juridico($forma, $id_empre);
        $form->create_form();
        
        // id da Forma
        $id_form = $form->getLastInsertedId_form();
        
        // criação do objeto enquadramento
        $enquadramento = new Enquadramento($enqua, $id_form);
        $enquadramento->createEnq();

        echo "<script language='javascript'>window.alert('Sucesso ao cadastrar Empreendimento');</script>";
        // Redireciona para a página mercado.php com o ID do empreendimento como parâmetro na URL
        echo "<script language='javascript'>window.location='mercado.php?idEmpre=" . $id_empre . "';</script>";
        exit; // Adicionado para interromper a execução após o redirecionamento
    }
}
