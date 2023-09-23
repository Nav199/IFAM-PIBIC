var tabelaId = 'Tabela_01'; // ID da tabela
var linhaAtual = 1; // Contador para identificar as linhas

function adicionarLinha() {
    var tabela = document.getElementById(tabelaId).getElementsByTagName('tbody')[0];
    var novaLinha = tabela.insertRow(tabela.rows.length - 1);

    var colunaBotao = novaLinha.insertCell(0);
    var colunaDescricao = novaLinha.insertCell(1);
    var colunaCusto = novaLinha.insertCell(2);

    colunaBotao.innerHTML = '<button type="button" class="btn btn-danger" onclick="deletarLinha(this)">Deletar</button>';
    colunaDescricao.innerHTML = '<input type="text" name="descricao[]" id="descricao_' + linhaAtual + '">';
    colunaCusto.innerHTML = '<input type="number" name="custo[]" id="custo_' + linhaAtual + '" oninput="calcularTotal()">';

    linhaAtual++;
}

function deletarLinha(botao) {
    var linha = botao.parentNode.parentNode;
    linha.parentNode.removeChild(linha);
    calcularTotal();
}
function calcularTotal() {
    var totalGeral = parseFloat(document.getElementById("soma_salario").textContent) || 0;
    var table = document.getElementById("Tabela_01");
    var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

    for (var i = 0; i < rows.length - 1; i++) {
        var custoField = rows[i].querySelector('input[name="custo[]"]');
        if (custoField) {
            totalGeral += parseFloat(custoField.value) || 0;
        }
    }

    document.getElementById("Total").textContent = totalGeral.toFixed(2);

    // Converter dados para JSON e enviar para a URL especificada
    enviarDados(rows);
}


function enviarDados(rows) {
    var jsonArray = [];

    for (var i = 0; i < rows.length - 1; i++) {
        var rowData = {};

        var descricaoField = rows[i].querySelector('input[name="descricao[]"]');
        var custoField = rows[i].querySelector('input[name="custo[]"]');

        if (descricaoField && custoField) {
            rowData.descricao = descricaoField.value;
            rowData.custo = parseFloat(custoField.value) || 0;

            jsonArray.push(rowData);
        }
    }

    var jsonData = JSON.stringify(jsonArray);

    console.log(jsonData)

    // Enviar jsonData para a URL especificada usando a API fetch
    fetch("http://localhost/api/telas/index_dados", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: jsonData,
    })
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
    })
    .catch((error) => {
        console.error("Erro:", error);
    });
}
document.getElementById("enviarBtn").addEventListener("click", function () {
    enviarDados();
});