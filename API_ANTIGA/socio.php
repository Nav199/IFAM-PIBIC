<!DOCTYPE html>
<html lang="PT-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulários</title>

  <!-- Add Bootstrap CSS link here -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">

  <style>
    body {
      background-color: #f8f9fa;
      /* Cor de fundo */
    }

    .container {
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
      background-color: #007bff;
      /* Cor do botão "Adicionar" */
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      /* Cor quando hover sobre o botão "Adicionar" */
    }

    .btn-success {
      background-color: #28a745;
      /* Cor do botão "Enviar" */
      border-color: #28a745;
    }

    .btn-success:hover {
      background-color: #1e7e34;
      /* Cor quando hover sobre o botão "Enviar" */
    }

    form {
      margin-bottom: 20px;
    }

    .mb-3 {
      margin-bottom: 15px;
    }
  </style>
</head>

<body>
  <div class="container mt-4">
    <form id="mainForm">

      <button type="button" class="btn btn-primary" onclick="AdicionarFormulario()">Adicionar</button>
      <br>
    <button type="button" class="btn btn-success" onclick="Enviar()">Enviar</button>
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
      </div>
      <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="number" class="form-control" name="telefone" placeholder="Digite seu telefone">
      </div>
      <div class="mb-3">
        <label for="curriculo" class="form-label">Currículo</label>
        <input type="text" class="form-control" name="curriculo" placeholder="Digite seu currículo">
      </div>
      <div class="mb-3">
        <label for="endereço" class="form-label">Endereço</label>
        <input type="text" class="form-control" name="endereco" placeholder="Digite seu endereço">
      </div>
      <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" class="form-control" name="estado" placeholder="Digite seu estado">
      </div>
      <div class="mb-3">
        <label for="cidade" class="form-label">Cidade</label>
        <input type="text" class="form-control" name="cidade" placeholder="Digite sua cidade">
      </div>
      <div class="mb-3">
        <label for="capital" class="form-label">Capital</label>
        <input type="number" class="form-control" name="capital" placeholder="Digite o capital">
      </div>
  </form>
  </div>
  <!-- Add Bootstrap JS and Popper.js links here -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../telas/socio.js"></script>
</body>

</html>