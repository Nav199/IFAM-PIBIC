<?php
require_once __DIR__."/verifica.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Crie uma instância da classe Verifica
    $verifica = new Verifica();

    // Chame o método verificaDados para verificar as credenciais
    $verifica->veri_dados($email, $senha);


    echo "<script language='javascript'>window.alert(Login feito com sucesso); </script>";
    header('Location:../telas/executibo.php');
} else {
    // Lide com outros métodos de solicitação HTTP ou mostre uma mensagem de erro
    echo "Método de solicitação inválido.";
}
