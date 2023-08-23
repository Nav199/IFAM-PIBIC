<?php

define('Host','localhost');
define('DATABASENAME','plano_teste');
define('USER','root');
define('PASSOWORD','');
class Database {
    public $connection = null;
    
    public function __construct()
    {
        try{
            $this->connection = new PDO('mysql:host='.Host.';dbname='.DATABASENAME,USER,PASSOWORD);
        }catch (PDOException $e){
            echo "ERROR!".$e->getMessage();
            die();
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public function getLastInsertedId() {
        return $this->connection->lastInsertId();
    }
}