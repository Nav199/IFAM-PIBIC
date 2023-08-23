<?php
require_once __DIR__ . '/../model/UserModel.php';
require_once __DIR__ .'/../model/Database.php';

ob_start();
class CadastroController {
    public function cadastrarUsuario() {
        // Recebe os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $senha = $_POST['senha'];


        // Validar o formato do email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script language='javascript'>window.alert('Formato de email inválido!');</script>";
            echo "<script language='javascript'>window.location='cadastro.php';</script>";
            exit; // Parar a execução caso o email seja inválido
        }

        // Validar o formato do CPF
        $cpf = preg_replace('/[^0-9]/', '', $cpf); // Remover caracteres não numéricos do CPF

        if (strlen($cpf) !== 11) {
            echo "<script language='javascript'>window.alert('CPF inválido! O CPF deve ter 11 caracteres.');</script>";
            echo "<script language='javascript'>window.location='cadastro.php';</script>";
            exit; // Parar a execução caso o CPF seja inválido
        }

        // Criação do usuário
        $userModel = new User($nome, $email, $cpf, $senha);
        // $userModel->createUser(); // Estava gerando duplicidade de registro no banco 
        $lastInsertedId =  $userModel->getLastInsertedId();


        echo "<script language='javascript'>window.alert('Sucesso ao cadastrar Usuario');</script>";
        // Redireciona para a página executivo.php com o ID do usuário como parâmetro na URL
        header("Location: http://localhost/API/telas/socio.php?id=" . $lastInsertedId);
        ob_end_flush();
        exit();

    }
}
