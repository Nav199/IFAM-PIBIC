
function AdicionarLinha(id) {
    var tabela = document.getElementById(id);
    var num_linhas = tabela.rows.length;
    var linha = tabela.insertRow(num_linhas);
    if (num_linhas > 1) {
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);
        var celula3 = linha.insertCell(2);
        celula1.innerHTML = '<input type="text" name="descricao" id="descricao' + num_linhas + '">';
        celula2.innerHTML = '<input type="number" name="custo" id="custo' + num_linhas + '">';
    }

    calcula();
}

function calcula() {
    let soma = 0;

    // Itera por todos os campos de custo e soma seus valores
    var custoInputs = document.querySelectorAll('[name="custo"]');
    for (var i = 0; i < custoInputs.length; i++) {
        soma += parseFloat(custoInputs[i].value) || 0;
    }

    // Define o valor da célula Total
    document.getElementById("Total").innerHTML = soma.toFixed(2);
}

function exportToJson() {
    var data = [];
    var descricaoInputs = document.querySelectorAll('[name="descricao"]');
    var custoInputs = document.querySelectorAll('[name="custo"]');

    for (var i = 0; i < descricaoInputs.length; i++) {
        var descricao = descricaoInputs[i].value;
        var custo = parseFloat(custoInputs[i].value) || 0;
        data.push({ descricao: descricao, custo: custo });
    }

    var jsonData = JSON.stringify(data);
    enviarDados(jsonData)
    console.log(jsonData); 
    window.location.href = "  http://localhost/api/telas/financeiro/faturamento.php";
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