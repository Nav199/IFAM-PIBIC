<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apuração</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Apuração de Custos</h2>
        <table class="table table-bordered" id="Tabela_01">
            <thead>
                <tr>
                    <th><button type="button" class="btn btn-dark" onclick="adicionarLinha()">Adicionar</button></th>
                    <th>Produto/Serviço</th>
                    <th>Estimativa de Vendas (em unidades)</th>
                    <th>Custo Unitário de Materiais/Aquisição (R$)</th>
                    <th>CMD/CMV (R$)</th>
                </tr>
            </thead>
            <tbody class="table-data">
                <tr>
                    <td><button type="button" class="btn btn-danger" onclick="deletarLinha(this)">Deletar</button></td>
                    <td><input type="text" name="descricao[]" class="form-control"></td>
                    <td><input type="number" name="estimativa_vendas[]" class="form-control"></td>
                    <td><input type="number" name="custo_unitario[]" class="form-control"></td>
                    <td><input type="number" name="cmd_cmv[]" class="form-control"></td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary btn-submit" onclick="converterParaJSON()">Enviar</button>
        </div>
    </div>

    <script>
        var linha = 1
        function Calcular_CMD(linha) {
        var quantidade = parseFloat(document.getElementById("estimativa_vendas_" + linha).value);
        var custoUnitario = parseFloat(document.getElementById("custo_unitario_" + linha).value);

        var cmd_cmv = quantidade * custoUnitario;

        document.getElementById("cmd_cmv_" + linha).value = cmd_cmv.toFixed(2);
    }

    function adicionarLinha() {
    var tabela = document.getElementById("Tabela_01").getElementsByTagName('tbody')[0];
    var novaLinha = tabela.insertRow(tabela.rows.length - 1); // Insere antes da última linha de subtotal

    var colunaBotao = novaLinha.insertCell(0);
    var colunaDescricao = novaLinha.insertCell(1);
    var colunaEstimativa = novaLinha.insertCell(2);
    var colunaCustoUnitario = novaLinha.insertCell(3);
    var colunaCMD = novaLinha.insertCell(4);

    colunaBotao.innerHTML = '<button type="button" class="btn btn-danger" onclick="deletarLinha(this)">Deletar</button>';
    colunaDescricao.innerHTML = '<input type="text" name="descricao[]" class="form-control">';
    colunaEstimativa.innerHTML = '<input type="number" name="estimativa_vendas[]" class="form-control" id="estimativa_vendas_' + linha + '" onchange="Calcular_CMD(' + linha + ')">';
    colunaCustoUnitario.innerHTML = '<input type="number" name="custo_unitario[]" class="form-control" id="custo_unitario_' + linha + '" onchange="Calcular_CMD(' + linha + ')">';
    colunaCMD.innerHTML = '<input type="number" name="cmd_cmv[]" class="form-control" id="cmd_cmv_' + linha + '" readonly>';

    linha++; // Incrementa o número da linha
}
        function deletarLinha(botao) {
            var linha = botao.parentNode.parentNode;
            linha.parentNode.removeChild(linha);
        }

        function obterDadosDaTabela(tabela) {
            var data = [];
            var linhas = tabela.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

            for (var i = 0; i < linhas.length; i++) {
                var celulas = linhas[i].getElementsByTagName("td");
                var dadosLinha = {
                    "descricao": celulas[1].getElementsByTagName("input")[0].value,
                    "estimativa_vendas": parseFloat(celulas[2].getElementsByTagName("input")[0].value),
                    "custo_unitario": parseFloat(celulas[3].getElementsByTagName("input")[0].value),
                    "cmd_cmv": parseFloat(celulas[4].getElementsByTagName("input")[0].value)
                };
                data.push(dadosLinha);
            }

            return data;
        }

        function enviarDados(jsonData) {
            // Coloque aqui o código para enviar os dados para o servidor
            console.log(jsonData); // Exibe os dados JSON no console (você pode utilizá-lo como necessário)
        }

        function converterParaJSON() {
            var data = obterDadosDaTabela(document.getElementById("Tabela_01"));

            var jsonData = JSON.stringify(data);
            enviarDados(jsonData);
        }
    </script>
</body>

</html>
