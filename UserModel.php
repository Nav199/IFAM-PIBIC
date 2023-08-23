<?php

require_once __DIR__.'/Database.php';
class User extends Database
{
    private $nome;
    private $email;
    private $cpf;
    private $senha;

    public function __construct($nome, $email, $cpf, $senha) {
        parent::__construct();
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->senha = $senha;
    }
    //Criação de usuário
    public function createUSER()
    {
        try {
            // O nome da tabela no banco de dados é usuarios(no plural), mas aqui no código estava no singular
            $stm = $this->connection->prepare("INSERT INTO usuario (Nome, Email, CPF, Senha) VALUES (:nome, :email, :cpf, :senha)");
            $stm->bindValue(":nome", $this->nome);
            $stm->bindValue(":email", $this->email);
            $stm->bindValue(":cpf", $this->cpf);
            $stm->bindValue(":senha", password_hash($this->senha, PASSWORD_BCRYPT));
            $stm->execute();

              // Recupera o último ID inserido
              $lastInsertedId = $this->connection->lastInsertId();

              return $lastInsertedId;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getLastInsertedId() {
         // A função createUSER() já retorna o último ID inserido, então podemos chamá-la aqui
         return $this->createUSER();
    }
}

?>
