<?php

require_once __DIR__.'/../model/mercado/clients_Model.php';

    class ClientController
    {
        public function cadastrar_client()
        {
            $publico = $_POST['publicoAlvo'];
            $comportamento = $_POST['comportamentoClientes'];
            $area = $_POST['areaAbrangencia'];
            $id_empre = $_POST['idEmpre'];
            $id_usuario = $_POST['idUsuario'];


            //criação do objeto
            $client = new Clients($publico,$comportamento,$area,$id_empre,$id_usuario);

            $client->create_client();

                // Redireciona para a página socio.php com o ID do usuário como parâmetro na URL
    //echo "<script language='javascript'>window.location='mercado.php?idUsuario=" . $id_usuario . "&idEmpre=" . $id_empre . "';</script>";
    //exit; // Adicionado para interromper a execução após o redirecionamento
        }
    }