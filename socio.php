<!DOCTYPE html>
<html>
<head>
  <title>Cadastro de sócio</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Cadastro de sócio</h2>
    <form action="index.php" method="POST" onsubmit="calcularCapitalSocial()">

      <div class="form-row">
        <div class="col-md-4 mb-3">
          <label for="idUsuario">ID do Usuário</label>
          <input type="text" class="form-control" id="idUsuario" name="idUsuario" value=<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?> readonly>
        </div>
        <div class="col-md-4 mb-3">
          <label for="nomeSocio">Nome</label>
          <input type="text" class="form-control" id="nomeSocio" name="nomeSocio[]" required>
        </div>
        <div class="col-md-4 mb-3">
          <label for="telefoneSocio">Telefone</label>
          <input type="text" class="form-control" id="telefoneSocio" name="telefoneSocio[]" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="ruaSocio">Rua</label>
          <input type="text" class="form-control" id="ruaSocio" name="ruaSocio[]" required>
        </div>
        <div class="col-md-3 mb-3">
          <label for="cidadeSocio">Cidade</label>
          <input type="text" class="form-control" id="cidadeSocio" name="cidadeSocio[]" required>
        </div>
        <div class="col-md-3 mb-3">
          <label for="estadoSocio">Estado</label>
          <input type="text" class="form-control" id="estadoSocio" name="estadoSocio[]" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="capitalSocio">Capital do Sócio ($)</label>
          <input type="number" class="form-control" id="capitalSocio" name="capitalSocio" step="0.01" min="0" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="curriculoSocio">Currículo</label>
          <input type="text" class="form-control" id="curriculoSocio" name="curriculoSocio" required>
        </div>
      </div>
      <div id="sociosContainer"></div>
      <button type="button" class="btn btn-primary mb-3" onclick="adicionarSocio()">Adicionar sócio</button>
      <button type="submit" class="btn btn-primary" name="Enviar" onclick="Enviar()">Enviar</button>
      <div class="porcen">
        <input type="hidden" id="porcentagemSocios" name="porcentagemSocios">
      </div>
    </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="../telas/js/socio.js"></script>
</body>
</html>
