<?php
require_once __DIR__."/../Database.php";

class Mao extends Database
{
    private $funcao;
    private $empre;
    private $salario;
    private $encargo;
    private $total;

    public function __construct($funcao, $empre, $salario, $encargo, $total)
    {
        parent::__construct();
        $this->funcao = $funcao;
        $this->empre = $empre;
        $this->salario = $salario;
        $this->encargo = $encargo;
        $this->total = $total;
    }

    public function create_Mao()
    {
        $stm = $this->connection->prepare("INSERT INTO obra (funcao, empre, encargo, total, salario) VALUES (:funcao, :empre, :encargo, :total,:salario)");
        $stm->bindValue(":funcao",$this->funcao);
        $stm->bindValue(":empre",$this->empre);
        $stm->bindValue("encargo",$this->encargo);
        $stm->bindValue(":total",$this->total);
        $stm->bindValue(":salario",$this->salario);
        $stm->execute();
    }
}
