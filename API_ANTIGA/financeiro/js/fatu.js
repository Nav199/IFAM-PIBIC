var linhaAtual = 1; // Contador para identificar as linhas
var dados = []; // Array para armazenar os dados

function adicionarLinha() {
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

    // Criar um objeto para armazenar os dados da linha atual
    var linhaObj = {
        quantidade: 0,
        valor_unitario: 0,
        total: 0
    };

    // Adicionar o objeto ao array de dados
    dados.push(linhaObj);

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

function calcularTotal(linha) {
    var quantidade = parseFloat(document.getElementById("quantidade_" + linha).value);
    var preco_unitario = parseFloat(document.getElementById("valor_unitario_" + linha).value);
    var total = quantidade * preco_unitario;
    document.getElementById("total_" + linha).value = total.toFixed(2);

    // Atualizar os valores do objeto no array de dados
    dados[linha - 1].quantidade = quantidade;
    dados[linha - 1].valor_unitario = preco_unitario;
    dados[linha - 1].total = total;

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
        if(totalFields[i].name === "valor_unitario[]")
        {
            preco += parseFloat(totalFields[i].value)
        }
        if(totalFields[i].name === "quantidade[]")
        {
            qtd += parseInt(totalFields[i].value)
        }
    }

    document.getElementById("subtotal").value = Total.toFixed(2);
    document.getElementById("subtotal_preco").value = preco.toFixed(2)
    document.getElementById("subtotal_quantidade").value = qtd.toFixed(0)
}

// Função para transformar os dados em JSON
function converterParaJSON() {
    var jsonData = JSON.stringify(dados);
    console.log(jsonData)
    enviarDados(jsonData)
    return jsonData;
}

function enviarDados(jsonData) {
    let url = "http://localhost/api/telas/index_dados";
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
