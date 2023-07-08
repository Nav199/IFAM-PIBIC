<?php

// Configurações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'plano_teste';
$username = 'usuario';
$password = 'senha';

try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Tabela "usuario"
    $pdo->exec("CREATE TABLE usuarios (
        Id INT AUTO_INCREMENT PRIMARY KEY,
        Nome VARCHAR(255) NOT NULL,
        Email VARCHAR(255) NOT NULL,
        CPF VARCHAR(11) NOT NULL,
        Senha VARCHAR(255) NOT NULL
    )");

    // Tabela "socios"
    $pdo->exec("CREATE TABLE socios (
        Id INT AUTO_INCREMENT PRIMARY KEY,
        Nome VARCHAR(255) NOT NULL,
        Curriculo TEXT,
        Rua VARCHAR(255) NOT NULL,
        Cidade VARCHAR(255) NOT NULL,
        Estado VARCHAR(255) NOT NULL,
        Telefone VARCHAR(20) NOT NULL,
        id_usuario INT,
        FOREIGN KEY (id_usuario) REFERENCES usuarios(Id)
    )");

    // Tabela "forma"
    $pdo->exec("CREATE TABLE forma (
        ID INT AUTO_INCREMENT PRIMARY KEY,
        Forma VARCHAR(255) NOT NULL,
        ID_empreendimento INT,
        FOREIGN KEY (ID_empreendimento) REFERENCES empreendimento(Id)
    )");

    // Tabela "empreendimento"
    $pdo->exec("CREATE TABLE empreendimento (
        Id INT AUTO_INCREMENT PRIMARY KEY,
        Nome VARCHAR(255) NOT NULL,
        Setor VARCHAR(255) NOT NULL,
        Missao TEXT,
        Visao TEXT,
        Valores TEXT,
        FonteRecursos TEXT,
        id_usuario INT,
        id_socio INT,
        FOREIGN KEY (id_usuario) REFERENCES usuarios(Id),
        FOREIGN KEY (id_socio) REFERENCES socios(Id)
    )");

    // Tabela "capital"
    $pdo->exec("CREATE TABLE capital (
        ID INT AUTO_INCREMENT PRIMARY KEY,
        Valor DECIMAL(10, 2) NOT NULL,
        Participacao DECIMAL(10, 2) NOT NULL,
        ID_socios INT,
        FOREIGN KEY (ID_socios) REFERENCES socios(Id)
    )");

    echo "Migrações criadas com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao criar as migrações: " . $e->getMessage();
}
