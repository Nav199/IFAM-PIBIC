var linhaAtual = 1; // Contador para identificar as linhas

function adicionarLinha() {
    var tabela = document.getElementById("Tabela_01").getElementsByTagName('tbody')[0];
    var novaLinha = tabela.insertRow(tabela.rows.length - 1); // Insere antes da última linha de subtotal

    var colunaBotao = novaLinha.insertCell(0);
    var colunaDescricao = novaLinha.insertCell(1);
    var colunaQuantidade = novaLinha.insertCell(2);
    var colunaValorUnitario = novaLinha.insertCell(3);
    var colunaTotal = novaLinha.insertCell(4);

    colunaBotao.innerHTML = '<button type="button" class="btn btn-danger" onclick="deletarLinha(this)">Deletar</button>';
    colunaDescricao.innerHTML = '<input type="text" name="descricao[]" id="descricao_' + linhaAtual + '">';
    colunaQuantidade.innerHTML = '<input type="number" name="quantidade[]" id="quantidade_' + linhaAtual + '" oninput="calcularTotal(' + linhaAtual + ')">';
    colunaValorUnitario.innerHTML = '<input type="number" name="valor_unitario[]" id="valor_unitario_' + linhaAtual + '" oninput="calcularTotal(' + linhaAtual + ')">';
    colunaTotal.innerHTML = '<input type="number" name="total[]" id="total_' + linhaAtual + '" readonly>';

    linhaAtual++;
}
