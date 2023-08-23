<?php

require_once __DIR__.'/../model/mercado/Concorrente_Model.php';


    class ConcorrentController
    {
        public function cadastrar_Concorrente()
        {
           $contador = 0;

           if(isset($_POST["nomeConcorrente$contador"]) && $contador >=0)
           {
                $nome = $_POST["nomeConcorrente$contador"];
                $qualidade = $_POST["qualidadeConcorrente$contador"];
                $preco = $_POST["precoConcorrente$contador"];
                $pagamento = $_POST["pagamentoConcorrente$contador"];
                $servico = $_POST["servicoConcorrente$contador"];
                $garantias = $_POST["garantiasConcorrente$contador"];
                $localicao = $_POST["localizacaoConcorrente$contador"];
                $id_empre = 1;
                $id_usuario = 98;

                $concorrente = new Concorrente($qualidade,$preco,$pagamento,$localicao,$servico,$garantias,$id_empre,$id_usuario);
                $concorrente->Create_Con();
                $contador++;
           }
        }
        
    }
