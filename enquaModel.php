<?php
require_once __DIR__.'/../Database.php';

class Enquadramento extends Database {
    private $yes;
    private $forma; //id da forma

    public function __construct($yes,$forma) {
        parent::__construct(); // Chama o construtor da classe Database para estabelecer a conexão
        $this->forma = $forma;
        $this->yes = $yes;
    }

    public function getYes() {
        return $this->yes;
    }

    public function setYes($yes) {
        $this->yes = $yes;
    }

    public function setForm(Juridico $forma) {
        $this->forma = $forma;
    }

    public function getForm() {
        return $this->forma;
    }

    public function createEnq() {
        try {
            $stm = $this->connection->prepare("INSERT INTO enquadramento (Enquadramento,ID_forma) VALUES (:yes,:forma)");
            $stm->bindValue(":yes", $this->yes);
            $stm->bindValue(":forma", $this->forma);
            $stm->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
