// Código JavaScript para o faturamento

var linhaAtual = 1; // Contador para identificar as linhas

function adicionarLinha() { // Adicionar linha na tabela
    var tabela = document.getElementById("Tabela_01").getElementsByTagName('tbody')[0];
    var novaLinha = tabela.insertRow(tabela.rows.length - 1);

    var colunaBotao = novaLinha.insertCell(0);
    var colunaQuantidade = novaLinha.insertCell(1);
    var colunaValorUnitario = novaLinha.insertCell(2);
    var colunaTotal = novaLinha.insertCell(3);

    colunaBotao.innerHTML = '<button type="button" class="btn btn-danger" onclick="deletarLinha(this)" data-index="' + (linhaAtual - 1) + '">Deletar</button>';
    colunaQuantidade.innerHTML = '<input type="number" name="quantidade[]" id="quantidade_' + linhaAtual + '" oninput="calcularTotal(' + linhaAtual + ')">';
    colunaValorUnitario.innerHTML = '<input type="number" name="valor_unitario[]" id="valor_unitario_' + linhaAtual + '" oninput="calcularTotal(' + linhaAtual + ')">';
    colunaTotal.innerHTML = '<input type="number" name="total[]" id="total_' + linhaAtual + '" readonly>';

    calcularTotal(linhaAtual); // Calcula total para a linha adicionada
    linhaAtual++;
}

function deletarLinha(botao) {
    var linha = botao.parentNode.parentNode;
    linha.parentNode.removeChild(linha);

    // Remover o objeto correspondente do array de dados
    var index = botao.getAttribute("data-index");
    dados.splice(index, 1);

    calcularSubtotal();
}

function calcularTotal(linha) { // Calcula o total da tabela
    var quantidade = parseFloat(document.getElementById("quantidade_" + linha).value);
    var preco_unitario = parseFloat(document.getElementById("valor_unitario_" + linha).value);
    var total = quantidade * preco_unitario;
    document.getElementById("total_" + linha).value = total.toFixed(2);

    calcularSubtotal();
}

function calcularSubtotal() {
    var Total = 0;
    var preco = 0;
    var qtd = 0;
    var table = document.getElementById("Tabela_01");
    var tbody = table.getElementsByTagName('tbody')[0];
    var totalFields = tbody.getElementsByTagName('input');

    for (var i = 0; i < totalFields.length; i++) {
        if (totalFields[i].name === "total[]") {
            Total += parseFloat(totalFields[i].value);
        }
        if (totalFields[i].name === "valor_unitario[]") {
            preco += parseFloat(totalFields[i].value)
        }
        if (totalFields[i].name === "quantidade[]") {
            qtd += parseInt(totalFields[i].value)
        }
    }

    document.getElementById("subtotal").value = Total.toFixed(2);
    document.getElementById("subtotal_preco").value = preco.toFixed(2)
    document.getElementById("subtotal_quantidade").value = qtd.toFixed(0)
}

// Adicionar um evento de escuta para o campo de entrada de porcentagem
document.getElementById('porcentagem').addEventListener('input', function() {
    calcularProjecaoCrescimento();
});

function calcularProjecaoCrescimento() {
    var porcentagem = parseFloat(document.getElementById('porcentagem').value);
    var subtotal = parseFloat(document.getElementById('subtotal').value);

    var tabela = document.getElementById('Id_projecao').getElementsByTagName('tbody')[0];
    tabela.innerHTML = ''; // Limpa a tabela

    var faturamento = subtotal;
    var periodo = 1;

    while (periodo <= 12) {
        var novaLinha = tabela.insertRow();
        var celulaPeriodo = novaLinha.insertCell(0);
        var celulaFaturamento = novaLinha.insertCell(1);
        var celulaPorcentagem = novaLinha.insertCell(2);

        celulaPeriodo.textContent = "Mês " + periodo;
        celulaFaturamento.textContent = 'R$ ' + faturamento.toFixed(2);
        celulaPorcentagem.textContent = porcentagem.toFixed(2) + '%';

        // Calcula faturamento para o próximo mês
        faturamento *= (1 + (porcentagem / 100));

        periodo++;
    }

    // Adiciona as projeções para os próximos anos
    for (var i = 1; i <= 5; i++) {
        var novaLinha = tabela.insertRow();
        var celulaPeriodo = novaLinha.insertCell(0);
        var celulaFaturamento = novaLinha.insertCell(1);
        var celulaPorcentagem = novaLinha.insertCell(2);

        celulaPeriodo.textContent = "Ano " + i;
        celulaFaturamento.textContent = 'R$ ' + faturamento.toFixed(2);
        celulaPorcentagem.textContent = porcentagem.toFixed(2) + '%';

        // Calcula faturamento para o próximo ano
        faturamento *= (1 + (porcentagem / 100));
    }

    // Chama a função para criar o gráfico de barras
    criarGraficoBarras(faturamento, porcentagem);
}

function criarGraficoBarras(faturamento, porcentagem) {
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Período');
        data.addColumn('number', 'Faturamento');

        var chartData = [];
        for (var i = 1; i <= 12; i++) {
            chartData.push(["Mês " + i, parseFloat(faturamento.toFixed(2))]);
            faturamento *= (1 + (porcentagem / 100));
        }
        for (var j = 1; j <= 5; j++) {
            chartData.push(["Ano " + j, parseFloat(faturamento.toFixed(2))]);
            faturamento *= (1 + (porcentagem / 100));
        }

        data.addRows(chartData);

        var options = {
            chart: {
                title: 'Projeção de Faturamento',
                subtitle: 'Por períodos',
            },
            bars: 'vertical', // Define as barras na vertical
            width: 500, // Definindo a largura do gráfico
            height: 300 // Definindo a altura do gráfico
        };

        var chart = new google.charts.Bar(document.getElementById('grafico_barras'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
}
