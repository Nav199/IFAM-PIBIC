<?php
require_once __DIR__.'/../model/financeiro/mao_obra.php';

class mao_obraController
{
    public function cadastrar_mao($funcao, $empre, $salario, $encargo, $total)
    {
 
        $obra = new Mao($funcao, $empre, $salario, $encargo, $total);


        $obra->create_Mao();
    }
}
?>
