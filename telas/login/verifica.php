<?php

require_once __DIR__."/../model/Database.php";

class Verifica extends Database
{   
 

    public function veri_dados($email, $senha)
    {
        $conn = $this->getConnection();
        // sql
        $sql = "SELECT * FROM usuario WHERE Email = :Email AND Senha = :Senha";

        $stm = $conn->prepare($sql);
        $stm->bindParam(':Email',$email);
        $stm->bindParam(':Senha',$senha);
        $stm->execute();

        if($stm->rowCount() > 0)
        {
            echo "Login feito com sucesso";
        }
    }
}
