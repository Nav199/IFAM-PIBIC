/*Código de adicionar Maquina e Equipamentos*/
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

function deletarLinha(botao) {
    var linha = botao.parentNode.parentNode;
    linha.parentNode.removeChild(linha);

    calcularSubtotal();
}

function calcularTotal(linha) {
    var quantidade = parseFloat(document.getElementById("quantidade_" + linha).value);
    var valorUnitario = parseFloat(document.getElementById("valor_unitario_" + linha).value);

    var total = quantidade * valorUnitario;

    document.getElementById("total_" + linha).value = total.toFixed(2);

    calcularSubtotal();
}

function calcularSubtotal() {
    var subTotal = 0;
    var table = document.getElementById("Tabela_01");
    var tbody = table.getElementsByTagName('tbody')[0];
    var totalFields = tbody.getElementsByTagName('input');

    for (var i = 0; i < totalFields.length; i++) {
        if (totalFields[i].name === "total[]") {
            subTotal += parseFloat(totalFields[i].value);
        }
    }

    document.getElementById("subtotal").value = subTotal.toFixed(2);
}

/* Móveis e utensílios*/
function adicionarLinha_2() {
    var tabela = document.getElementById("Tabela_02").getElementsByTagName('tbody')[0];
    var novaLinha = tabela.insertRow(tabela.rows.length - 1); // Insere antes da última linha de subtotal

    var colunaBotao = novaLinha.insertCell(0);
    var colunaDescricao = novaLinha.insertCell(1);
    var colunaQuantidade = novaLinha.insertCell(2);
    var colunaValorUnitario = novaLinha.insertCell(3);
    var colunaTotal = novaLinha.insertCell(4);

    colunaBotao.innerHTML = '<button type="button" class="btn btn-danger" onclick="deletarLinha_2(this)">Deletar</button>';
    colunaDescricao.innerHTML = '<input type="text" name="descricao_2[]" id="descricao_2_' + linhaAtual + '">';
    colunaQuantidade.innerHTML = '<input type="number" name="quantidade_2[]" id="quantidade_2_' + linhaAtual + '" oninput="calcularTotal_2(' + linhaAtual + ')">';
    colunaValorUnitario.innerHTML = '<input type="number" name="valor_unitario_2[]" id="valor_unitario_2_' + linhaAtual + '" oninput="calcularTotal_2(' + linhaAtual + ')">';
    colunaTotal.innerHTML = '<input type="number" name="total_2[]" id="total_2_' + linhaAtual + '" readonly>';

    linhaAtual++;
}

// Função para deletar uma linha na segunda tabela
function deletarLinha_2(botao) {
    var linha = botao.parentNode.parentNode;
    linha.parentNode.removeChild(linha);

    calcularSubtotal_2();
}

// Função para calcular o total de cada linha na segunda tabela
function calcularTotal_2(linha) {
    var quantidade = parseFloat(document.getElementById("quantidade_2_" + linha).value);
    var valorUnitario = parseFloat(document.getElementById("valor_unitario_2_" + linha).value);

    var total = quantidade * valorUnitario;

    document.getElementById("total_2_" + linha).value = total.toFixed(2);

    calcularSubtotal_2();
}

// Função para calcular o subtotal da segunda tabela
function calcularSubtotal_2() {
    var subTotal = 0;
    var table = document.getElementById("Tabela_02");
    var tbody = table.getElementsByTagName('tbody')[0];
    var totalFields = tbody.getElementsByTagName('input');

    for (var i = 0; i < totalFields.length; i++) {
        if (totalFields[i].name === "total_2[]") {
            subTotal += parseFloat(totalFields[i].value);
        }
    }

    document.getElementById("subtotal_2").value = subTotal.toFixed(2);
}

/*Veículos*/
function adicionarLinha_3() {
    var tabela = document.getElementById("Tabela_03").getElementsByTagName('tbody')[0];
    var novaLinha = tabela.insertRow(tabela.rows.length - 1); // Insere antes da última linha de subtotal

    var colunaBotao = novaLinha.insertCell(0);
    var colunaDescricao = novaLinha.insertCell(1);
    var colunaQuantidade = novaLinha.insertCell(2);
    var colunaValorUnitario = novaLinha.insertCell(3);
    var colunaTotal = novaLinha.insertCell(4);

    colunaBotao.innerHTML = '<button type="button" class="btn btn-danger" onclick="deletarLinha_3(this)">Deletar</button>';
    colunaDescricao.innerHTML = '<input type="text" name="descricao_3[]" id="descricao_3_' + linhaAtual + '">';
    colunaQuantidade.innerHTML = '<input type="number" name="quantidade_3[]" id="quantidade_3_' + linhaAtual + '" oninput="calcularTotal_3(' + linhaAtual + ')">';
    colunaValorUnitario.innerHTML = '<input type="number" name="valor_unitario_3[]" id="valor_unitario_3_' + linhaAtual + '" oninput="calcularTotal_3(' + linhaAtual + ')">';
    colunaTotal.innerHTML = '<input type="number" name="total_3[]" id="total_3_' + linhaAtual + '" readonly>';

    linhaAtual++;
}

// Função para deletar uma linha na terceira tabela
function deletarLinha_3(botao) {
    var linha = botao.parentNode.parentNode;
    linha.parentNode.removeChild(linha);

    calcularSubtotal_3();
}

// Função para calcular o total de cada linha na terceira tabela
function calcularTotal_3(linha) {
    var quantidade = parseFloat(document.getElementById("quantidade_3_" + linha).value);
    var valorUnitario = parseFloat(document.getElementById("valor_unitario_3_" + linha).value);

    var total = quantidade * valorUnitario;

    document.getElementById("total_3_" + linha).value = total.toFixed(2);

    calcularSubtotal_3();
}

// Função para calcular o subtotal da terceira tabela
function calcularSubtotal_3() {
    var subTotal = 0;
    var table = document.getElementById("Tabela_03");
    var tbody = table.getElementsByTagName('tbody')[0];
    var totalFields = tbody.getElementsByTagName('input');

    for (var i = 0; i < totalFields.length; i++) {
        if (totalFields[i].name === "total_3[]") {
            subTotal += parseFloat(totalFields[i].value);
        }
    }

    document.getElementById("subtotal_3").value = subTotal.toFixed(2);
}

function obterDadosDaTabela(tabela) {
    var data = [];
    var linhas = tabela.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

    for (var i = 0; i < linhas.length; i++) {
        var celulas = linhas[i].getElementsByTagName("td");
        var dadosLinha = {
            "descricao": celulas[1].getElementsByTagName("input")[0].value,
            "quantidade": parseFloat(celulas[2].getElementsByTagName("input")[0].value),
            "valor_unitario": parseFloat(celulas[3].getElementsByTagName("input")[0].value),
            "total": parseFloat(celulas[4].getElementsByTagName("input")[0].value)
        };
        data.push(dadosLinha);
    }

    return data;
}

function enviarDados(jsonData) {
    let url = "http://localhost/api/telas/iindex_dados";
    fetch(url, {
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

  
function converterParaJSON() {
    var data = {
        "maquinas_e_equipamentos": [],
        "moveis_e_utensilios": [],
        "veiculos": []
    };

    var tabela1 = document.getElementById("Tabela_01");
    var tabela2 = document.getElementById("Tabela_02");
    var tabela3 = document.getElementById("Tabela_03");

    data["maquinas_e_equipamentos"] = obterDadosDaTabela(tabela1);
    data["moveis_e_utensilios"] = obterDadosDaTabela(tabela2);
    data["veiculos"] = obterDadosDaTabela(tabela3);

    var jsonData = JSON.stringify(data);
    console.log(jsonData); // Exibe os dados JSON no console (você pode utilizá-lo como necessário)
    enviarDados(jsonData); // Chama a função para enviar os dados para o servidor
    window.location.href = "http://localhost/api/telas/financeiro/inves_pre_5.3.php";
}