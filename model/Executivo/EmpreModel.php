<?php
require_once __DIR__.'/../Database.php';
class Empreendimento extends Database {
    private $name;          // nome da empresa
    private $mission;       // missão da empresa
    private $vision;        // visão da empresa
    private $values;        // valores da empresa
    private $sector;        // setor
    private $source;        // fonte de recursos
    private $id_socio;
    private $id_usuario;

    public function __construct($name, $mission, $vision, $values, $sector,$source ,$id_socio,$id_usuario) {
        parent::__construct();
        $this->name = $name;
        $this->mission = $mission;
        $this->vision = $vision;
        $this->values = $values;
        $this->sector = $sector;
        $this->source = $source;
        $this->id_socio = $id_socio;
        $this->id_usuario = $id_usuario;
    }
  
    public function create_empre(){
        try {
            $stm = $this->connection->prepare("INSERT INTO empreendimento(nome, setor, missao, visao, valores, fonteRecursos,id_usuario,id_socio) VALUES (:nome, :setor, :missao, :visao, :valores, :fonteRecursos,:id_usuario,:id_socio)");

            // Vincular os parâmetros com os valores dos atributos
            $stm->bindValue(":nome", $this->name);
            $stm->bindValue(":setor", $this->sector);
            $stm->bindValue(":missao", $this->mission);
            $stm->bindValue(":visao", $this->vision);
            $stm->bindValue(":valores", $this->values);
            $stm->bindValue(":fonteRecursos", $this->source);
            $stm->bindValue(":id_usuario", $this->id_usuario);
            $stm->bindValue(":id_socio", $this->id_socio);
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
