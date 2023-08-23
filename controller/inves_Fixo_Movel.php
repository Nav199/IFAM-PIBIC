<?php
require_once __DIR__.'/../model/financeiro/invest_fixo_Moveis.php';

class Fixo_Movel_Controller
{
    public function Adicinar_Movel($descricao, $qtd, $valor, $total)
    {
        $invest_Movel = new Movel($descricao, $qtd, $valor, $total);
        $invest_Movel->CreateInves_Movel();
    }

}