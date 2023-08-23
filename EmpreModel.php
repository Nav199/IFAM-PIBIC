<?php
require_once __DIR__.'/../Database.php';
class Empreendimento extends Database {
    private $name;          // nome da empresa
    private $mission;       // missão da empresa
    private $vision;        // visão da empresa
    private $values;        // valores da empresa
    private $sector;        // setor
    private $source;        // fonte de recursos
    private $id_usuario;

    public function __construct($name, $mission, $vision, $values, $sector,$source ,$id_usuario) {
        parent::__construct();
        $this->name = $name;
        $this->mission = $mission;
        $this->vision = $vision;
        $this->values = $values;
        $this->sector = $sector;
        $this->source = $source;
        $this->id_usuario = $id_usuario;
    }
  
    public function create_empre(){
        try {
            $stm = $this->connection->prepare("INSERT INTO empreendimento(Nome, Setor, Missao, Visao, Valores, FonteRecursos,id_usuario) VALUES (:nome, :setor, :missao, :visao, :valores, :fonteRecursos,:id_usuario)");

            // Vincular os parâmetros com os valores dos atributos
            $stm->bindValue(":nome", $this->name);
            $stm->bindValue(":setor", $this->sector);
            $stm->bindValue(":missao", $this->mission);
            $stm->bindValue(":visao", $this->vision);
            $stm->bindValue(":valores", $this->values);
            $stm->bindValue(":fonteRecursos", $this->source);
            $stm->bindValue(":id_usuario", $this->id_usuario);
            $stm->execute();

            //id do Empreendimento
            $lastInsertId_empre = $this->connection->lastInsertId();
            
            return $lastInsertId_empre;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getlastInsertId_empre()
    {
        return $this->create_empre();
    }
}
