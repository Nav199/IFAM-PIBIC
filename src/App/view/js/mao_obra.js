function adicionarLinha(index) {
    var tbody = document.querySelector("#Tabela_01 tbody");
    var newRow = document.createElement("tr");
    newRow.className = "table-data";
    newRow.innerHTML = `
      <td><button type="button" class="btn btn-danger" onclick="deletarLinha(this)">Remover</button></td>
      <td><input type="text" name="funcao[]" class="form-control form-control-sm"></td>
      <td><input type="number" name="N_empre[]" class="form-control form-control-sm" oninput="calcularSubtotal(this)"></td>
      <td><input type="number" name="salario_1[]" class="form-control form-control-sm" oninput="calcularSubtotal(this)"></td>
      <td><input type="number" name="subtotal[]" class="form-control form-control-sm" readonly></td>
      <td><input type="number" name="encar_socio_[]" class="form-control form-control-sm" oninput="calcularSubtotal(this)"></td>
      <td><input type="number" name="calcu_encarg[]" class="form-control form-control-sm" readonly></td>
      <td><input type="number" name="total[]" class="form-control form-control-sm" readonly></td>
    `;
    var subtotalRow = document.querySelector(".table-subtotal");
    tbody.insertBefore(newRow, subtotalRow);
  }

  function deletarLinha(botao) {
    var linha = botao.parentNode.parentNode;
    linha.parentNode.removeChild(linha);
    calcularSubtotal();
    calcular_TOTAL();
  }

  function calcularSubtotal(input) {
    var linha = input.parentNode.parentNode;
    var empregados = parseInt(linha.querySelector('input[name="N_empre[]"]').value);
    var salario = parseFloat(linha.querySelector('input[name="salario_1[]"]').value);
    var encargos = parseFloat(linha.querySelector('input[name="encar_socio_[]"]').value);

    var subtotal = salario * empregados;
    var calc_encargo = encargos * subtotal;
    var total = subtotal + calc_encargo;

    linha.querySelector('input[name="subtotal[]"]').value = subtotal.toFixed(2);
    linha.querySelector('input[name="calcu_encarg[]"]').value = calc_encargo.toFixed(2);
    linha.querySelector('input[name="total[]"]').value = total.toFixed(2);

    calcular_TOTAL();
  }

  function calcular_TOTAL() {
    var totalEmpregados = 0;
    var totalSubtotal = 0;
    var totalEncargosSociais = 0;

    var linhas = document.querySelectorAll(".table-data");

    linhas.forEach(function (linha, index) {
      var empregados = parseInt(linha.querySelector('input[name="N_empre[]"]').value);
      var subtotal = parseFloat(linha.querySelector('input[name="subtotal[]"]').value);
      var encargos = parseFloat(linha.querySelector('input[name="calcu_encarg[]"]').value);

      totalEmpregados += empregados;
      totalSubtotal += subtotal;
      totalEncargosSociais += encargos;
    });

    document.getElementById("total_empre").value = totalEmpregados;
    document.getElementById("Sub_total").value = totalSubtotal.toFixed(2);
    document.getElementById("total_encargos").value = totalEncargosSociais.toFixed(2);
    document.getElementById("subtotal").value = (totalSubtotal + totalEncargosSociais).toFixed(2);
  }