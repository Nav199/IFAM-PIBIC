<?php require_once __DIR__.'/../pegadados/db_obra.php';

$data = new p_obra();
$resultados = $data->dados();

// Variável para armazenar a soma de salário e encargo
$somaSalarioEncargo = 0;

// Calcular a soma de salário e encargo
foreach ($resultados as $resultado) {
    $somaSalarioEncargo += $resultado['salario'] + $resultado['encargo'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custo Fixo</title>

    <!-- Inclua o Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="../financeiro/js/custo_fixo.js"></script>
</head>
<body>
    <table class="table table-bordered" id="Tabela_01">
        <thead>
            <tr>
                <th><button id="adicionarLinhaBtn" onclick="adicionarLinha()">Adicionar</button></th>
                <th>Descrição</th>
                <th>Custo Total Mensal (em R$)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td> <!-- Coluna vazia para adicionar linhas -->
                <td>Salário + Encargo</td>
                <td id="soma_salario"><?php echo $somaSalarioEncargo; ?></td>
            </tr>

            <tr id="totalRow">
                <th>TOTAL</th>
                <td id="Total">0</td>
            </tr>
        </tbody>
    </table>

    <button id="enviarBtn" class="btn btn-primary">Enviar</button>
    <!-- Inclua o Bootstrap JavaScript (Opcional, para recursos específicos do Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
