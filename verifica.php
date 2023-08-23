<?php

require_once __DIR__."/../model/Database.php";

class Verifica extends Database
{   
    public function veri_dados($email, $senha)
    {
        $stmt = $this->getConnection()->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) == 1) {
            return true; // Credenciais corretas
        } else {
            return false; // Credenciais incorretas
        }
    }
}

$data = json_decode(file_get_contents("php://input"), true);
$verifica = new Verifica();
$email = $data['email'];
$senha = $data['password'];

if ($verifica->veri_dados($email, $senha)) {
    echo "Login bem-sucedido!";
} else {
    echo "Credenciais inválidas.";
}
