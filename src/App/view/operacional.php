<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plano Operacional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="container mt-5" style="background-color: rgba(21, 25, 41, 1); color: white;">

    <h1 class="text-center">Plano Operacional</h1>

    <!-- Layout Físico -->
    <div class="mb-5">
        <h2 style="color: white;">Layout Físico</h2>
        <img src="caminho/para/sua/imagem.jpg" alt="Layout Físico" class="img-fluid">
    </div>

    <!-- Capacidade Produtiva -->
    <div class="mb-5">
        <h3 class="text-center" style="color: white;">Capacidade Produtiva</h3>
        <form method="POST" action="/Operacional">
            <div class="mb-3">
                <label for="capacidadeMaxima" style="color: white;">Capacidade Máxima:</label>
                <input type="number" class="form-control col-6" id="capacidadeMaxima" name="capacidadeMaxima">
            </div>
            <div class="mb-3">
                <label for="volumeInicial">Volume Inicial:</label>
                <input type="number" class="form-control" id="volumeInicial" name="volumeInicial">
            </div>

            <!-- Necessidade Pessoal -->
            <div class="mb-5">
                <h3 class="text-center p-4" style="color: white;">Necessidade Pessoal</h3>
                <div class="mb-5">
                    <table id="tabelaNecessidadePessoal" name="tabelaNecessidadePessoal" class="table table-dark table-striped-columns text-center">
                        <tr>
                            <td>Cargo</td>
                            <td>Qualificações</td>
                            <td>Ações</td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" id="novoCargo"></td>
                            <td><input type="text" class="form-control" id="novaFuncao"></td>
                            <td><button type="button" class="btn btn-success" onclick="adicionarCargoFuncao()">Adicionar</button></td>
                        </tr>
                    </table>
                    <!-- Campo oculto para armazenar os dados da tabela -->
                    <input type="hidden" name="tabelaNecessidadePessoal" id="tabelaNecessidadePessoalHidden" value="">
                </div>
            </div>
            <button type="submit" class="btn btn-light text-center mt-3">Enviar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofOgP9bxFiKxM/6p8ZYicR5StB9S6Uwe" crossorigin="anonymous"></script>

    <script>
        function adicionarCargoFuncao() {
            var tabela = document.getElementById("tabelaNecessidadePessoal");
            var novoCargo = document.getElementById("novoCargo").value;
            var novaFuncao = document.getElementById("novaFuncao").value;

            if (novoCargo !== "" && novaFuncao !== "") {
                var newRow = tabela.insertRow(tabela.rows.length - 1);
                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                var cell3 = newRow.insertCell(2);

                cell1.innerHTML = novoCargo;
                cell2.innerHTML = novaFuncao;
                cell3.innerHTML = '<button type="button" class="btn btn-danger" onclick="removerLinha(this)">Remover</button>';

                // Atualizar o campo oculto com os dados da tabela
                document.getElementById("tabelaNecessidadePessoalHidden").value = JSON.stringify(obterDadosTabela());
                
                // Limpar campos de entrada
                document.getElementById("novoCargo").value = "";
                document.getElementById("novaFuncao").value = "";
            } else {
                alert("Por favor, preencha ambos os campos.");
            }
        }

        function removerLinha(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);

            // Atualizar o campo oculto com os dados da tabela após remover uma linha
            document.getElementById("tabelaNecessidadePessoalHidden").value = JSON.stringify(obterDadosTabela());
        }

        function obterDadosTabela() {
            var tabela = document.getElementById("tabelaNecessidadePessoal");
            var dadosTabela = [];

            for (var i = 1; i < tabela.rows.length - 1; i++) {
                var cargo = tabela.rows[i].cells[0].innerHTML;
                var qualificacoes = tabela.rows[i].cells[1].innerHTML;

                dadosTabela.push({
                    'cargo': cargo,
                    'qualificacoes': qualificacoes
                });
            }

            return dadosTabela;
        }
    </script>
</body>

</html>
