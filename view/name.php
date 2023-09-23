<?php
require_once __DIR__.'/../database/firebase.php';
use App\Models\FirebaseModel;

$firebase_url = $firebaseURL;
$firebase_token = $firebaseToken;
$firebase_Model = new FirebaseModel($firebase_url, $firebase_token);

$dados = $firebase_Model->getdados(); // Chame a função sem passar um usuário específico



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
                    <!-- Adicione outras colunas conforme necessário -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $id => $usuario) { ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $usuario['nome']; ?></td>
                        <td><?php echo $usuario['email']; ?></td>
                        <!-- Adicione outras colunas conforme necessário -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
    </html>
