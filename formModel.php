<?php
require_once __DIR__.'/../Database.php';

class juridico extends Database{

    private $escolha;
    private $id_empre;

    public function __construct($escolha,$id_empre)
    {    parent::__construct();
        $this->escolha = $escolha;
        $this->id_empre = $id_empre;
    }

    public function create_form(){
        try {
            $stm = $this->connection->prepare("INSERT INTO forma(Forma,ID_empreendimento) VALUES (:escolha,:id_empre)");
            $stm->bindValue(":escolha", $this->escolha);
            $stm->bindValue(":id_empre", $this->id_empre);
            $stm->execute();

            // id da forma
            $lastInsertID_form = $this->connection->lastInsertId();
            return $lastInsertID_form;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getLastInsertedId_form()
    {
        return $this->create_form();
    }
}