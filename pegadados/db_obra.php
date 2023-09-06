<?php

require_once __DIR__.'/../model/Database.php';

class p_obra extends Database
{
    public function dados(){
        $conn = $this->getConnection();
    
        $sql = "SELECT salario, encargo FROM obra";
    
        $stm = $conn->prepare($sql);
        $stm->execute();
    
        $resultados = [];
    
        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $resultados[] = $row;
        }
    
        return $resultados;
    }
    
}