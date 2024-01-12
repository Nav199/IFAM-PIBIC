<?php
require_once __DIR__.'/../Models/firebaseModel.php';
use App\Models\FirebaseModel;

$firebase_url = 'https://plano-31f6d-default-rtdb.firebaseio.com';
$firebase_token = 'AIzaSyBYbrbCxa4Iz_lnYuxtT2VX6sVXC04_Idwo';
$firebase_Model = new FirebaseModel($firebase_url, $firebase_token);

$dados = $firebase_Model->getdados(); 
$dados_executivo = $firebase_Model->getdados_Executivo();
?>

<!DOCTYPE html>
<html lang="PT_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados as $id => $usuario) { ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo isset($usuario['nome']) ? $usuario['nome'] : 'N/A'; ?></td>
                    <td><?php echo isset($usuario['email']) ? $usuario['email'] : 'N/A'; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php if (!empty($dados_executivo)) { ?>
        <h1>Lista de Usuários com empresas</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Empresa</th>
                    <th>ID Usuário</th>
                    <th>Nome empresa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados_executivo as $id => $usuario) { ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo isset($usuario['id_user']) ? $usuario['id_user'] : 'N/A'; ?></td>
                        <td><?php echo isset($usuario['nome_empresa']) ? $usuario['nome_empresa'] : 'N/A'; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>Não há dados executivos disponíveis para este usuário.</p>
    <?php } ?>
</body>
</html>
