<?php
require_once __DIR__.'/../Database.php';

class Fornecedor extends Database{

    private $description; // Descrição
    private $name; // Nome
    private $price; // Preço
    private $payment; // Pagamento
    private $deliveryTime; // Prazo de Entrega
    private $location; // Localização
    private $id_empre; // id do empreendimento
    private $id_usuario; // id do usuario

    // constructor

    public function __construct($description, $name, $price, $payment, $deliveryTime, $location, $id_empre, $id_usuario)
    {
        parent::__construct();
        $this->description = $description;
        $this->name = $name;
        $this->price = $price;
        $this->payment = $payment;
        $this->deliveryTime = $deliveryTime;
        $this->location = $location;
        $this->id_empre = $id_empre;
        $this->id_usuario = $id_usuario;
    }


    public function Create_for()
    {
        try {
            $stm = $this->connection->prepare("INSERT INTO fornecedor (descricao, preco, pagamento, prazo, localizacao, id_empre, id_usuario,nome) VALUES (:descricao, :preco, :pagamento, :prazo, :localizacao, :id_empre, :id_usuario,:nome)");
            $stm->bindParam(':descricao', $this->description);
            $stm->bindParam(':preco', $this->price);
            $stm->bindParam(':pagamento', $this->payment);
            $stm->bindParam(':prazo', $this->deliveryTime);
            $stm->bindParam(':localizacao', $this->location);
            $stm->bindParam(':id_empre', $this->id_empre);
            $stm->bindParam(':id_usuario', $this->id_usuario);
            $stm->bindParam(':nome', $this->name);
            $stm->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
