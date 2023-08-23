<?php
require_once __DIR__.'/../model/mercado/fornecedo_Model.php';

class FornecedorController
{
    public function cadastrarFornecedor()
    {
       $contador = 0;

       if(isset($_POST["descricaoFornecedor$contador"]) && $contador>=0)
        {
            $descricao = $_POST["descricaoFornecedor$contador"];
            $nome = $_POST["nomeFornecedor$contador"];
            $preco = $_POST["precoFornecedor$contador"];
            $pagamento = $_POST["pagamentoFornecedor$contador"];
            $prazo = $_POST["prazoEntregaFornecedor$contador"];
            $localizacao = $_POST["localizacaoFornecedor$contador"];
            $id_empre = 1;
            $id_usuario = 98;

            $forne = new Fornecedor($descricao,$nome,$preco,$pagamento,$prazo,$localizacao,$id_empre,$id_usuario);
            $forne->Create_for();

            $contador++;
        }
    }
}
