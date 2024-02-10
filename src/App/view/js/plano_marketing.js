function adicionar() {
    var tabela = document.getElementById("tabelaNecessidadePessoal");
    var novoCargo = document.getElementById("novoProduto").value;

    if (novoCargo !== "") {
        var newRow = tabela.insertRow(tabela.rows.length - 1);
        var cell1 = newRow.insertCell(0);
        var cell3 = newRow.insertCell(1);

        cell1.innerHTML = novoCargo;
        cell3.innerHTML = '<button type="button" class="btn btn-danger" onclick="removerLinha(this)">Remover</button>';

        // Limpar campos de entrada
        document.getElementById("novoProduto").value = "";
    } else {
        alert("Por favor, preencha ambos os campos.");
    }
}

function removerLinha(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}