<?php
require_once __DIR__.'/../Database.php';
class Veicu extends Database
{
    private $Descricao;
    private $Qtad;
    private $valor;
    private $total;
    public function __construct($Descricao, $Qtad, $valor,$total) {
        parent::__construct();
        $this->Descricao = $Descricao;
        $this->Qtad = $Qtad;
        $this->valor = $valor;
        $this->total = $total;
    }

    public function CreateInves_Veicu()
    {
        try {
            // O nome da tabela no banco de dados é usuarios(no plural), mas aqui no código estava no singular
            $stm = $this->connection->prepare("INSERT INTO veicu (Descricao,Quantidade,valor,total) VALUES (:Descricao, :Quantidade, :valor, :total)");
            $stm->bindValue(":Descricao", $this->Descricao);
            $stm->bindValue(":Quantidade", $this->Qtad);
            $stm->bindValue(":valor", $this->valor);
            $stm->bindValue(":total",$this->total);
            $stm->execute();

              // Recupera o último ID inserido
              $lastInsertedId = $this->connection->lastInsertId();

              return $lastInsertedId;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    
    }
}