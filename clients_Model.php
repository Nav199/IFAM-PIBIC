<?php
require_once __DIR__.'/../Database.php';
class Clients extends Database{
    
    private $public; //publico alco
    private $behavior; //comportamento do cliente
    private $area; //area de abrangencia
    private $id_empre; // id do empreendimento
    private $id_usuario;
   public function __construct($public,$behavior,$area,$id_empre,$id_usuario)
    {
             parent::__construct();
            $this->public = $public;
            $this->behavior = $behavior;
            $this->area = $area;
            $this->id_empre = $id_empre;
            $this->id_usuario = $id_usuario;
    }    

    public function create_client(){
        try {
            $stm = $this->connection->prepare("INSERT INTO client (publico, comportamento, area, id_empre, id_usuario) VALUES (:publico, :comportamento, :area, :id_empre, :id_usuario)");

            $stm->bindValue(":publico", $this->public);
            $stm->bindValue(":comportamento", $this->behavior);
            $stm->bindValue(":area", $this->area);
            $stm->bindValue(":id_empre", $this->id_empre);
            $stm->bindValue(":id_usuario", $this->id_usuario);
            $stm->execute();

            //id do cliente
            $LastInsertedId_cliente = $this->connection->lastInsertId();
            return $LastInsertedId_cliente;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getLastInsertedId()
    {
        return $this->create_client();
    }
}