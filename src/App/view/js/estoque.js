function calcularSubtotal(input) {
    const tr = input.parentElement.parentElement;
    const quantidade = tr.querySelector('input[name="quantidade[]"]').value;
    const valor = tr.querySelector('input[name="valor[]"]').value;
    const subtotal = quantidade * valor;
    tr.querySelector('input[name="subtotal[]"]').value = subtotal.toFixed(2);

    calcularTotal();
}

function calcularTotal() {
    const subtotais = document.getElementsByName('subtotal[]');
    let total = 0;
    for (const subtotal of subtotais) {
        total += parseFloat(subtotal.value);
    }
    document.getElementById('total').textContent = total.toFixed(2);
}

function adicionarLinha() {
    const tabela = document.getElementById('tabela-compras').getElementsByTagName('tbody')[0];
    const novaLinha = tabela.insertRow(tabela.rows.length);

    const colunaAcoes = novaLinha.insertCell(0);
    const colunaDescricao = novaLinha.insertCell(1);
    const colunaQuantidade = novaLinha.insertCell(2);
    const colunaValor = novaLinha.insertCell(3);
    const colunaSubtotal = novaLinha.insertCell(4);

    colunaAcoes.innerHTML = '<button class="btn btn-danger" onclick="deletarLinha(this)">Remover</button>';
    colunaDescricao.innerHTML = '<input type="text" class="form-control" name="descricao[]">';
    colunaQuantidade.innerHTML = '<input type="number" class="form-control" name="quantidade[]" oninput="calcularSubtotal(this)">';
    colunaValor.innerHTML = '<input type="number" class="form-control" name="valor[]" oninput="calcularSubtotal(this)">';
    colunaSubtotal.innerHTML = '<input type="text" class="form-control" name="subtotal[]" readonly>';
}

function deletarLinha(botao) {
    const indexLinha = botao.parentNode.parentNode.rowIndex;
    document.getElementById('tabela-compras').deleteRow(indexLinha);
    calcularTotal();
}
