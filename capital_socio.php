<?php
require_once __DIR__.'/../Database.php';
class Capital extends Database {
    private $idSocio; 
    private $valor;
    private $total = 0; // Inicialize o total com 0
    
    public function __construct($idSocio, $valor) {
        parent::__construct();
        $this->idSocio = $idSocio;
        $this->valor = $valor;
    }

    // Outros métodos não apresentam alterações

    public function Total() {
        $this->total += $this->valor;
    }
    
    public function create_capital() {
        try {
            // Insira o cálculo do total antes da inserção do valor do capital no banco de dados
            $this->Total();
            
            // Insere o valor do capital no banco de dados
            $stm = $this->connection->prepare("INSERT INTO capital (Valor, ID_socios, total) VALUES (:valor, :idSocio, :total)");
            $stm->bindValue(":valor", $this->valor);
            $stm->bindValue(":idSocio", $this->idSocio);
            $stm->bindValue(":total", $this->total);
            $stm->execute();

            //id do capital social
            $lastInsertId_capital = $this->connection->lastInsertId();
            return $lastInsertId_capital;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
