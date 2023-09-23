<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Faturamento</title>
</head>
<body>
    <h2 style="text-align: center;">Faturamento</h2>
    <div class="container mt-5">
        <table class="table table-bordered" id="Tabela_01">
            <thead>
                <tr>
                    <th><button type="button" class="btn btn-dark" style="text-align: center;" onclick="adicionarLinha()">+</button></th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Faturamento Total</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-data">
                    <td><button type="button" class="btn btn-danger" onclick="deletarLinha(this)">Deleta</button></td>
                    <td><input type="number" name="quantidade[]" id="quantidade_1" oninput="calcularTotal(1)"></td>
                    <td><input type="number" name="valor_unitario[]" id="valor_unitario_1" oninput="calcularTotal(1)"></td>
                    <td><input type="number" name="total[]" id="total_1" readonly></td>
                </tr>
                <!-- Adicione mais linhas aqui, se necessário -->
            </tbody>
            <tr class="table-subtotal">
                <th>Total</th>
                <td><input type="number" name="total_quantidade" id="subtotal_quantidade" readonly></td>
                <td><input type="number" name="total_preco" id="subtotal_preco" readonly></td>
                <td><input type="number" name="subtotal" id="subtotal" readonly></td>
            </tr>
        </table>
        <button onclick="converterParaJSON() ">Enviar</button>
    </div>
    <script src="../financeiro/js/fatu.js"></script>
</body>
</html>
