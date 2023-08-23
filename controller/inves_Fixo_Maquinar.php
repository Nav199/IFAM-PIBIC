<?php
require_once __DIR__.'/../model/financeiro/invest_fixo_Maquina.php';

class Investimento_Fixo_Maquina
{
    function Adicionar_Inves($descricao, $qtd, $valor, $total)
    {
        $investimento = new  Maquina($descricao, $qtd, $valor, $total);
        $investimento->CreateInves_Fixo();

    }
}