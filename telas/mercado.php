<!DOCTYPE html>
<html>
<head>
  <title>Análise de Mercado</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    body {
      background-color: #f8f9fa;
    }
    
    .container {
      background-color: #ffffff;
      margin-top: 50px;
      padding: 30px;
      border-radius: 5px;
      box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.3);
    }
    
    h1 {
      color: #007bff;
      text-align: center;
    }
    
    h2 {
      color: #343a40;
      margin-top: 30px;
    }
    
    table {
      margin-top: 20px;
    }
    
    th {
      background-color: #343a40;
      color: #ffffff;
    }
    
    .remove-field {
      color: #dc3545;
      cursor: pointer;
    }
    
    #enviar {
      margin-top: 30px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Análise de Mercado</h1>
    
    <form>
      <h2>Estudo de clientes</h2>
      <div class="form-group">
        <label for="publicoAlvo">Público alvo:</label>
        <textarea class="form-control" id="publicoAlvo" rows="3" name="publicoAlvo" placeholder="Digite o público-alvo"></textarea>
      </div>

      <div class="form-group">
        <label for="comportamentoClientes">Comportamento dos clientes:</label>
        <textarea class="form-control" id="comportamentoClientes" rows="3" name="comportamentoClientes" placeholder="Digite o comportamento dos clientes"></textarea>
      </div>

      <div class="form-group">
        <label for="areaAbrangencia">Área de abrangência:</label>
        <textarea class="form-control" id="areaAbrangencia" rows="3" name="areaAbrangencia" placeholder="Digite a área de abrangência"></textarea>
      </div>
      
      <h2>Estudo de Concorrentes</h2>
      <button id="addConcorrente" class="btn btn-primary">Adicionar Concorrente</button>
      
      <table id="concorrentesTable" class="table">
        <thead>
          <tr>
            <th>Qualidade</th>
            <th>Preço</th>
            <th>Condições de pagamento</th>
            <th>Localização</th>
            <th>Atendimento</th>
            <th>Serviço aos clientes</th>
            <th>Garantias oferecidas</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="text" class="form-control" name="qualidade[]" /></td>
            <td><input type="text" class="form-control" name="preco[]" /></td>
            <td><input type="text" class="form-control" name="condicoesPagamento[]" /></td>
            <td><input type="text" class="form-control" name="localizacao[]" /></td>
            <td><input type="text" class="form-control" name="atendimento[]" /></td>
            <td><input type="text" class="form-control" name="servicoClientes[]" /></td>
            <td><input type="text" class="form-control" name="garantiasOferecidas[]" /></td>
            <td><span class="remove-field" onclick="removeTableRow(this)">Remover</span></td>
          </tr>
        </tbody>
      </table>
      
      <h2>Estudo dos fornecedores</h2>
      <button id="addFornecedor" class="btn btn-primary">Adicionar Fornecedor</button>
      
      <table id="fornecedoresTable" class="table">
        <thead>
          <tr>
            <th>Descrição dos produtos</th>
            <th>Nome do Fornecedor</th>
            <th>Preço</th>
            <th>Condições de pagamento</th>
            <th>Prazo de entrega</th>
            <th>Localização</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="text" class="form-control" name="descricaoProdutos[]" /></td>
            <td><input type="text" class="form-control" name="nomeFornecedor[]" /></td>
            <td><input type="text" class="form-control" name="precoFornecedor[]" /></td>
            <td><input type="text" class="form-control" name="condicoesPagamentoFornecedor[]" /></td>
            <td><input type="text" class="form-control" name="prazoEntrega[]" /></td>
            <td><input type="text" class="form-control" name="localizacaoFornecedor[]" /></td>
            <td><span class="remove-field" onclick="removeTableRow(this)">Remover</span></td>
          </tr>
        </tbody>
      </table>
      
      <button id="enviar" class="btn btn-primary" name="Enviar_Mercado">Enviar</button>
    </form>
  </div>

  <script>
    // Função para adicionar nova linha na tabela de concorrentes
    $("#addConcorrente").click(function() {
      var newRow = '<tr>' +
        '<td><input type="text" class="form-control" name="qualidade[]" /></td>' +
        '<td><input type="text" class="form-control" name="preco[]" /></td>' +
        '<td><input type="text" class="form-control" name="condicoesPagamento[]" /></td>' +
        '<td><input type="text" class="form-control" name="localizacao[]" /></td>' +
        '<td><input type="text" class="form-control" name="atendimento[]" /></td>' +
        '<td><input type="text" class="form-control" name="servicoClientes[]" /></td>' +
        '<td><input type="text" class="form-control" name="garantiasOferecidas[]" /></td>' +
        '<td><span class="remove-field" onclick="removeTableRow(this)">Remover</span></td>' +
        '</tr>';

      $("#concorrentesTable tbody").append(newRow);
    });

    // Função para adicionar nova linha na tabela de fornecedores
    $("#addFornecedor").click(function() {
      var newRow = '<tr>' +
        '<td><input type="text" class="form-control" name="descricaoProdutos[]" /></td>' +
        '<td><input type="text" class="form-control" name="nomeFornecedor[]" /></td>' +
        '<td><input type="text" class="form-control" name="precoFornecedor[]" /></td>' +
        '<td><input type="text" class="form-control" name="condicoesPagamentoFornecedor[]" /></td>' +
        '<td><input type="text" class="form-control" name="prazoEntrega[]" /></td>' +
        '<td><input type="text" class="form-control" name="localizacaoFornecedor[]" /></td>' +
        '<td><span class="remove-field" onclick="removeTableRow(this)">Remover</span></td>' +
        '</tr>';

      $("#fornecedoresTable tbody").append(newRow);
    });

    // Função para remover uma linha da tabela
    function removeTableRow(element) {
      $(element).closest("tr").remove();
    }
  </script>
</body>
</html>
