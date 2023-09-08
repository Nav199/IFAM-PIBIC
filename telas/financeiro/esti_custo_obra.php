<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="../financeiro/js/mao.js"></script>
    <title>Estimativa de Mão de Obra</title>
    <style>
        body {
            background-color: #123456; /* Substitua pelo código de cor desejado */
        }
        .container {
            margin-top: 30px;
        }
        h4 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }
        th {
            background-color: #343a40;
            color: white;
        }
        th, td {
            text-align: center;
            vertical-align: middle;
        }
        .btn {
            margin: 2px;
        }
        .table {
            border: 2px solid #dee2e6;
        }
        .table-subtotal th {
            background-color: #343a40;
            color: white;
        }
        .btn-submit {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header style="background-color: rgb(247, 241, 241); padding: 10px;">
        <a href="index.html">Home</a>
    </header>
    <div class="container">
        <h4 style="background-color: rgb(247, 241, 241);">Estimativa de Mão de Obra</h4>
        <table class="table table-bordered" id="Tabela_01">
            <thead>
                <tr>
                    <th><button type="button" class="btn btn-dark" onclick="adicionarLinha()">Adicionar</button></th>
                    <th>Função</th>
                    <th>N° Empregados</th>
                    <th>Salário Mensal</th>
                    <th>Subtotal</th>
                    <th>(%) Encargos Sociais</th>
                    <th>Encargos Sociais</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-data">
                    <td><button type="button" class="btn btn-danger" onclick="deletarLinha(this)">Remover</button></td>
                    <td><input type="text" name="funcao[]" class="form-control"></td>
                    <td><input type="number" name="N_empre[]" class="form-control"></td>
                    <td><input type="number" name="salario_1[]" class="form-control" oninput="calcular_subtotal(1)"></td>
                    <td><input type="number" name="encar_socio_[]" class="form-control"></td>
                    <td><input type="number" name="calcu_encarg[]" class="form-control"></td>
                    <td><input type="number" name="total[]" class="form-control" readonly></td>
                </tr>
                <!-- Adicione mais linhas aqui, se necessário -->
            </tbody>
            <tr class="table-subtotal">
                <th>TOTAL</th>
                <td></td>
                <td><input type="number" id="total_empre" class="form-control"></td>
                <td></td>
                <td><input type="number" id="Sub_total" class="form-control"></td>
                <td></td>
                <td><input type="number" id="total_encargos" class="form-control"></td>
                <td><input type="number" id="subtotal" class="form-control" readonly></td>
            </tr>
        </table>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-submit" onclick="DataJson()">Enviar</button>
        </div>
    </div>
</body>
</html>
