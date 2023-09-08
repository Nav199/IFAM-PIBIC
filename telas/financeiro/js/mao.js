var tabelaId = 'Tabela_01'; // ID of the table
var linhaAtual = 1; // Counter to identify rows

function adicionarLinha() {
    var tabela = document.getElementById(tabelaId).getElementsByTagName('tbody')[0];
    var novaLinha = tabela.insertRow(tabela.rows.length - 1);

    var colunaBotao = novaLinha.insertCell(0);
    var colunaFuncao = novaLinha.insertCell(1);
    var colunaEmpregados = novaLinha.insertCell(2);
    var colunaSalario = novaLinha.insertCell(3);
    var colunaSubtotal = novaLinha.insertCell(4);
    var colunaEncargos = novaLinha.insertCell(5);
    var colunaCalcuEncarg = novaLinha.insertCell(6);
    var colunaTotal = novaLinha.insertCell(7);

    colunaBotao.innerHTML = '<button type="button" class="btn btn-danger" onclick="deletarLinha(this)">Deletar</button>';
    colunaFuncao.innerHTML = '<input type="text" name="funcao[]" id="funcao_' + linhaAtual + '">';
    colunaEmpregados.innerHTML = '<input type="number" name="N_empre[]" id="N_empre_' + linhaAtual + '" oninput="calcular_subtotal(' + linhaAtual + ')">';
    colunaSalario.innerHTML = '<input type="number" name="salario[]" id="salario_' + linhaAtual + '" oninput="calcular_subtotal(' + linhaAtual + ')">';
    colunaSubtotal.innerHTML = '<input type="number" name="subtotal[]" id="subtotal_' + linhaAtual + '" readonly>';
    colunaEncargos.innerHTML = '<input type="number" name="encar_socio_[]" id="encar_socio_' + linhaAtual + '" readonly>';
    colunaCalcuEncarg.innerHTML = '<input type="number" name="calcu_encarg[]" id="calcu_encarg_' + linhaAtual + '" readonly>';
    colunaTotal.innerHTML = '<input type="number" name="total[]" id="total_' + linhaAtual + '" readonly>';

    linhaAtual++;
}

function calcular_subtotal(linha)
{
    let empregados = parseInt( document.getElementById("N_empre_" + linha).value)
    let salario = parseFloat(document.getElementById("salario_" + linha).value)
    
    var subTotal = salario * empregados

    var encargo = 0.6
    let porcen_encar = document.getElementById("encar_socio_"+linha).value = encargo.toFixed(2)


    var cal_encargo = porcen_encar * subTotal
    document.getElementById("subtotal_" + linha).value = subTotal.toFixed(2)
    document.getElementById("calcu_encarg_" + linha).value = cal_encargo.toFixed(2)

    
    var total = subTotal + cal_encargo;
    document.getElementById("total_" + linha).value = total.toFixed(2);

    calcular_TOTAL()
    atualizarTotais()
}

function deletarLinha(botao) {
    var linha = botao.parentNode.parentNode;
    linha.parentNode.removeChild(linha);
    calcular_TOTAL()
}

function calcular_TOTAL() {
    totalGeral = 0;

    var table = document.getElementById("Tabela_01");
    var tbody = table.getElementsByTagName('tbody')[0];
    var totalFields = tbody.getElementsByTagName('input');

    for (var i = 0; i < totalFields.length; i++) {
        if (totalFields[i].name === "total[]") {
            totalGeral += parseFloat(totalFields[i].value);
        }
    }

    document.getElementById("subtotal").value = totalGeral.toFixed(2);
}
function atualizarTotais() {
    var totalEmpregados = 0;
    var totalSubtotal = 0;
    var totalEncargosSociais = 0;
    var table = document.getElementById(tabelaId);
    var tbody = table.getElementsByTagName('tbody')[0];
    var rows = tbody.getElementsByTagName('tr');

    for (var i = 0; i < rows.length; i++) {
        var empregadosField = rows[i].querySelector('input[name="N_empre[]"]');
        var subtotalField = rows[i].querySelector('input[name="subtotal[]"]');
        var encargosSociaisField = rows[i].querySelector('input[name="calcu_encarg[]"]');
        if (empregadosField && subtotalField && encargosSociaisField) {
            totalEmpregados += parseInt(empregadosField.value) || 0;
            totalSubtotal += parseFloat(subtotalField.value) || 0;
            totalEncargosSociais += parseFloat(encargosSociaisField.value) || 0;
        }
    }

    document.getElementById("total_empre").value = totalEmpregados;
    document.getElementById("Sub_total").value = totalSubtotal.toFixed(2);
    document.getElementById("total_encargos").value = totalEncargosSociais.toFixed(2);
}

function DataJson() {
    var jsonArray = [];
    let data;
    var table = document.getElementById(tabelaId);
    var tbody = table.getElementsByTagName('tbody')[0];
    var rows = tbody.getElementsByTagName('tr');

    for (var i = 0; i < rows.length; i++) {
        var rowData = {};

        var funcaoField = rows[i].querySelector('input[name="funcao[]"]');
        var empregadosField = rows[i].querySelector('input[name="N_empre[]"]');
        var salarioField = rows[i].querySelector('input[name="salario[]"]');
        var subtotalField = rows[i].querySelector('input[name="subtotal[]"]');
        var encargosField = rows[i].querySelector('input[name="encar_socio_[]"]');
        var calcuEncargField = rows[i].querySelector('input[name="calcu_encarg[]"]');
        var totalField = rows[i].querySelector('input[name="total[]"]');

        if (funcaoField && empregadosField && salarioField && subtotalField && encargosField && calcuEncargField && totalField) {
            rowData.funcao = funcaoField.value;
            rowData.empregados = parseInt(empregadosField.value) || 0;
            rowData.salario = parseFloat(salarioField.value) || 0;
            rowData.subtotal = parseFloat(subtotalField.value) || 0;
            rowData.encargos = parseFloat(encargosField.value) || 0;
            rowData.calcuEncarg = parseFloat(calcuEncargField.value) || 0;
            rowData.total = parseFloat(totalField.value) || 0;

            jsonArray.push(rowData);
        }
    }

    data = JSON.stringify(jsonArray)
    console.log(data);
    enviarDados(data)
    return data;
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
