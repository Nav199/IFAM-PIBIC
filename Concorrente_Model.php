<?php
require_once __DIR__.'/../Database.php';

class Concorrente extends Database{
    //Atributos
    private $quality; // qualidade
    private $price; // preço
    private $payment_condition; //condições de pagamento
    private $location; // localização
    private $service; // serviço ao cliente
    private $warranties_offered; // garantias oferecidas
    private $id_empre; //id do empreendimento
    private $id_usuario; // id do usuario

    public function __construct($quality, $price, $payment_condition, $location, $service, $warranties_offered, $id_empre,$id_usuario) {
        parent::__construct();
        $this->quality = $quality;
        $this->price = $price;
        $this->payment_condition = $payment_condition;
        $this->location = $location;
        $this->service = $service;
        $this->warranties_offered = $warranties_offered;
        $this->id_empre = $id_empre;
        $this->id_usuario = $id_usuario;
    }
    
    // instância para o banco de dados
    public function Create_Con()
    {
        try{
            $stm = $this->connection->prepare("INSERT INTO concorrente (qualidade, preco, cond_pagamento, localizacao, servico, garanntia, id_empre, id_usuario) VALUES (:qualidade, :preco, :cond_pagamento, :localizacao, :servico, :garanntia, :id_empre, :id_usuario)");
            $stm->bindParam(':qualidade', $this->quality);
            $stm->bindParam(':preco', $this->price);
            $stm->bindParam(':cond_pagamento', $this->payment_condition);
            $stm->bindParam(':localizacao', $this->location);
            $stm->bindParam(':servico', $this->service);
            $stm->bindParam(':garanntia', $this->warranties_offered);
            $stm->bindParam(':id_empre', $this->id_empre);
            $stm->bindParam(':id_usuario', $this->id_usuario);
            $stm->execute();

        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}