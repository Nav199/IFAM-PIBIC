<?php
require_once __DIR__.'/../Database.php';

class Partner extends Database {
    private $Nome;
    private $rua;
    private $cidade;
    private $estado;
    private $telefone;
    private $Curriculo;
    private $id_usuario;

   public function __construct($nomeSocio, $ruaSocio, $cidadeSocio, $estadoSocio, $telefoneSocio, $curriculoSocio, $id_usuario) {
    parent::__construct();

    $this->Nome = $nomeSocio;
    $this->rua = $ruaSocio;
    $this->cidade = $cidadeSocio;
    $this->estado = $estadoSocio;
    $this->telefone = $telefoneSocio;
    $this->Curriculo = $curriculoSocio;
    $this->id_usuario = $id_usuario;
}

    public function getNome() {
        return $this->Nome;
    }
    
    public function setNome($Nome) {
        $this->Nome = $Nome;
    }
    
    public function getRua() {
        return $this->rua;
    }
    
    public function setRua($rua) {
        $this->rua = $rua;
    }
    
    public function getCidade() {
        return $this->cidade;
    }
    
    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }
    
    public function getEstado() {
        return $this->estado;
    }
    
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    
    public function getTelefone() {
        return $this->telefone;
    }
    
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getCurriculo() {
        return $this->Curriculo;
    }
    
    public function setCurriculo($Curriculo) {
        $this->Curriculo = $Curriculo;
    }
    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function createpatel() {
        try {
            $stm = $this->connection->prepare("INSERT INTO socios(Nome, curriculo, rua, cidade, estado, telefone, id_usuario) VALUES (:nome, :curriculo, :rua, :cidade, :estado, :telefone, :id_usuario)");
            $stm->bindValue(":nome", $this->Nome);
            $stm->bindValue(":curriculo", $this->Curriculo);
            $stm->bindValue(":rua", $this->rua);
            $stm->bindValue(":cidade", $this->cidade);
            $stm->bindValue(":estado", $this->estado);
            $stm->bindValue(":telefone", $this->telefone);
            $stm->bindValue(":id_usuario", $this->id_usuario);
            $stm->execute();
           
            //id do socio
            $lastInsertedId_socio = $this->connection->lastInsertId();
            return $lastInsertedId_socio;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    public function getLastInsertedId_socio()
    {
            return $this->createpatel();
    }
}

    

