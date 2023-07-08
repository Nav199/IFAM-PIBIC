<?php
require_once __DIR__.'/../Database.php';
// classe capital do sócio

class Capital extends Database{
    private $idSocio; 
    private $valor;
    private $total;
    private $cont = 0;
    private $porcentagem;
  
    public function __construct($idSocio,$valor,$cont) {
        parent:: __construct();
        $this->idSocio = $idSocio;
        $this->valor = $valor;
        $this->cont = $cont;
    }
    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getid_socio(){
        return $this->idSocio;
    }

    public function setID($idSocio){
        $this->idSocio = $idSocio;
    }
    public function settoal( $total){
        $this-> $total =  $total;
    }
  
    public function porcentagem() {
        if ($this->cont > 1) {
            $this->total = $this->valor * $this->cont;
            $this->porcentagem = ($this->valor / $this->total) * 100;
        } else if ($this->cont == 0) {
            $this->total = $this->valor;
            $this->porcentagem = 100;
        }
        return $this->porcentagem;
    }
    
    public function create_capital()
    {
        try {
            // Insere o valor do capital no banco de dados
            $stm = $this->connection->prepare("INSERT INTO capital ( Valor,Participacao,ID_socios) VALUES (:valor,:Participacao,:idSocio)");
            $stm->bindValue(":valor", $this->valor);
            $stm->bindValue(":Participacao",$this->porcentagem());
            $stm->bindValue(":idSocio", $this->idSocio);
            $stm->execute();
    
            //id do capital social
           $lastInsertId_capital = $this->connection->lastInsertId();
           return $lastInsertId_capital;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getlastInsertId_capital()
    {
        return $this->create_capital();
    }
}
