<?php
require_once __DIR__.'/../model/financeiro/invest_fixo_Vei.php';

class Fixo_Veicu_Controller
{
    public function Adicionar_Veiculo($Descricao, $Qtad, $valor,$total)
    {
        $inves_fixo =  new Veicu($Descricao, $Qtad, $valor,$total);
        $inves_fixo->CreateInves_Veicu();
    }
}