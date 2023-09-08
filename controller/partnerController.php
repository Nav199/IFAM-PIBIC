<?php
require_once __DIR__.'/../model/Executivo/partnerModel.php';
require_once __DIR__.'/../model/Executivo/capital_socio.php';


ini_set('display_errors', 1);

class SocioController {

    public function testar(){
        echo "<script language='javascript'>window.alert('Chamando a função!');</script>";

    }

    public function adicionarSocio($nomeSocio, $telefoneSocio, $ruaSocio, $cidadeSocio, $estadoSocio, $capitalSocio, $curriculoSocio, $id_usuario) {
    
        
        
            // Criação do sócio principal
            $socioPrincipal = new Partner($nomeSocio, $telefoneSocio, $ruaSocio, $cidadeSocio, $estadoSocio, $capitalSocio, $curriculoSocio, $id_usuario);
            $socioPrincipal->createpatel();
            $lastInsertedId_socio = $socioPrincipal->getLastInsertedId_socio();  // ID do Sócio
        
            // Criação da capital do sócio principal
            $capitalPrincipal = new Capital($lastInsertedId_socio, $capitalSocio);
            $capitalPrincipal->create_capital();
        
           
           
            echo "<script language='javascript'>window.alert('Sucesso ao cadastrar');</script>";
            echo "<script language='javascript'>window.location='executivo.php?idUsuario=" . $id_usuario . "';</script>";
            exit; // Adicionado para interromper a execução após o redirecionamento
        }
    }

