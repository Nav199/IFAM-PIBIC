<?php
require_once __DIR__.'/../Database.php';

class Partner extends Database {
    private $Nome;
    private $telefone;
    private $rua;
    private $cidade;
    private $estado;
    private $Capital; // Novo atributo inserido
    private $Curriculo;
    private $id_usuario;

   public function __construct($nomeSocio, $telefoneSocio, $ruaSocio, $cidadeSocio, $estadoSocio, $capitalSocio, $curriculoSocio, $id_usuario) {
    parent::__construct();

    $this->Nome = $nomeSocio;
    $this->telefone = $telefoneSocio;
    $this->rua = $ruaSocio;
    $this->cidade = $cidadeSocio;
    $this->estado = $estadoSocio;
    $this->Capital = $capitalSocio; // Novo atributo inserido
    $this->Curriculo = $curriculoSocio;
    $this->id_usuario = $id_usuario;
}

    public function getNome() {
        return $this->Nome;
    }
    
    public function setNome($Nome) {
        $this->Nome = $Nome;
    }

    public function getTelefone() {
        return $this->telefone;
    }
    
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
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
    
    public function getCapital() { // Novo atributo inserido
        return $this->Capital;
    }
    
    public function setCapital($Capital) { // Novo atributo inserido
        $this->Capital = $Capital;
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
            $stm = $this->connection->prepare("INSERT INTO socios (Nome, curriculo, rua, cidade, estado, telefone, id_usuario,capital) VALUES (:nome, :curriculo, :rua, :cidade, :estado, :telefone, :id_usuario,:capital)");
            $stm->bindValue(":nome", $this->Nome);
            $stm->bindValue(":curriculo", $this->Curriculo);
            $stm->bindValue(":rua", $this->rua);
            $stm->bindValue(":cidade", $this->cidade);
            $stm->bindValue(":estado", $this->estado);
            $stm->bindValue(":telefone", $this->telefone);
            $stm->bindValue(":capital", $this->Capital); // Novo atributo inserido
            $stm->bindValue(":id_usuario", $this->id_usuario);
    
            $success = $stm->execute();
    
            if ($success) {
                // Obter o ID do sócio inserido
                $lastInsertedId_socio = $this->connection->lastInsertId();
                return $lastInsertedId_socio;
            } else {
                return null;
            }

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return null; // Em caso de exceção
        }
    }

    public function getLastInsertedId_socio()
    {
            return $this->createpatel();
    }
}

    

