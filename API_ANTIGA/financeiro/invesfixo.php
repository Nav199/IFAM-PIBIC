<!--tela 01 do plano financeiro, falta o do capital de giro e do investimento total-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimento Fixo</title>

    <!-- Inclusão do Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h2 style="text-align: center;">Investimento Fixo</h2>
    <div class="container mt-5">
        <h4>Máquina e Equipamentos</h4>
        <table class="table table-bordered" id="Tabela_01">
            <thead>
                <tr>
                    <th><button type="button" class="btn btn-dark" style="text-align: center;" onclick="adicionarLinha()">+</button></th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Valor Unitário</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-data">
                    <td><button type="button" class="btn btn-danger" onclick="deletarLinha(this)">Deleta</button></td>
                    <td><input type="text" name="descricao[]" id="descricao_1"></td>
                    <td><input type="number" name="quantidade[]" id="quantidade_1" oninput="calcularTotal(1)"></td>
                    <td><input type="number" name="valor_unitario[]" id="valor_unitario_1" oninput="calcularTotal(1)"></td>
                    <td><input type="number" name="total[]" id="total_1" readonly></td>
                </tr>
                <!-- Adicione mais linhas aqui, se necessário -->
            </tbody>
            <tr class="table-subtotal">
                <th>Subtotal(A)</th>
                <td class="d-none"></td>
                <td class="d-none"></td>
                <td class="d-none"></td>
                <td ><input type="number" name="subtotal" id="subtotal" readonly></td>
            </tr>
        </table>

    </br>
    <h4>Móveis e utensílios</h4>
    <table class="table table-bordered" id="Tabela_02">
        <thead>
            <tr>
                <th><button type="button" class="btn btn-dark" style="text-align: center;" onclick="adicionarLinha_2()">+</button></th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Valor Unitário</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-data">
                <td><button type="button" class="btn btn-danger" onclick="deletarLinha_2(this)">Deletar</button></td>
                <td><input type="text" name="descricao_2[]" id="descricao_2_1"></td>
                <td><input type="number" name="quantidade_2[]" id="quantidade_2_1" oninput="calcularTotal_2(1)"></td>
                <td><input type="number" name="valor_unitario_2[]" id="valor_unitario_2_1" oninput="calcularTotal_2(1)"></td>
                <td><input type="number" name="total_2[]" id="total_2_1" readonly></td>
            </tr>
            <!-- Adicione mais linhas aqui, se necessário -->
        </tbody>
        <tr class="table-subtotal">
            <th>Subtotal(B)</th>
            <td class="d-none"></td>
            <td class="d-none"></td>
            <td class="d-none"></td>
            <td><input type="number" name="subtotal_2" id="subtotal_2" readonly></td>
        </tr>
    </table>

    </br>
<h4> Veículos</h4>
<table class="table table-bordered" id="Tabela_03">
    <thead>
        <tr>
            <th><button type="button" class="btn btn-dark" style="text-align: center;" onclick="adicionarLinha_3()">+</button></th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Valor Unitário</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr class="table-data">
            <td><button type="button" class="btn btn-danger" onclick="deletarLinha_3(this)">Deletar</button></td>
            <td><input type="text" name="descricao_3[]" id="descricao_3"></td>
            <td><input type="number" name="quantidade_3[]" id="quantidade_3" oninput="calcularTotal_3(1)"></td>
            <td><input type="number" name="valor_unitario_3[]" id="valor_unitario_3" oninput="calcularTotal_3(1)"></td>
            <td><input type="number" name="total_3[]" id="total_3" readonly></td>
        </tr>
        <!-- Adicione mais linhas aqui, se necessário -->
    </tbody>
    <tr class="table-subtotal">
        <th>Subtotal(C)</th>
        <td class="d-none"></td>
        <td class="d-none"></td>
        <td class="d-none"></td>
        <td><input type="number" name="subtotal_3" id="subtotal_3" readonly></td>
    </tr>
</table>
    </div>
    <button type="button" class="btn btn-primary" onclick="converterParaJSON()">Enviar</button>

    <script src="../financeiro/js/inve.js"></script>
</body>
</html>
