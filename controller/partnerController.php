<?php
require_once __DIR__.'/../model/Executivo/partnerModel.php';
require_once __DIR__.'/../model/Executivo/capital_socio.php';


class SocioController {
    public function adicionarSocio() {
    

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
            $lastInsertedId_socio = $socioPrincipal->getLastInsertedId_socio();  // ID do Sócio
        
            // Criação da capital do sócio principal
            $capitalPrincipal = new Capital($lastInsertedId_socio, $capitalSocio,0);
            $capitalPrincipal->create_capital();
        
            // Contador de sócios
            $contadorSocios = 0;
        
            while (isset($_POST["nomeSocio$contadorSocios"]) && $contadorSocios>= 0) {
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
                $lastInsertedId_socio = $socio->getLastInsertedId_socio();
        
                // Criação da capital do sócio adicional
                $capital = new Capital($lastInsertedId_socio, $capitalSocio,$contadorSocios);
                $capital->create_capital();
        
                $contadorSocios++;
            }
            
           
            echo "<script language='javascript'>window.alert('Sucesso ao cadastrar');</script>";
            echo "<script language='javascript'>window.location='executivo.php?idUsuario=" . $id_usuario . "&idSocio=" . $lastInsertedId_socio . "';</script>";
            exit; // Adicionado para interromper a execução após o redirecionamento
        }
    }

