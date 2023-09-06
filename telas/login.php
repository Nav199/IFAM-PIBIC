<!DOCTYPE html>
<html lang="PT - BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de Login</title>
  <!-- Inclua os links para os arquivos CSS do Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2>Login</h2>
        <form id="loginForm" method="POST" action="index.login.php">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email">
          </div>
          <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="senha" placeholder="Digite sua senha">
          </div>
          <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
        <hr>
        <p>Esqueceu sua senha? <a href="#">Recuperar senha</a></p>
        <p>Ainda não tem uma conta? <a href="../telas/cadastro.php">Criar uma conta</a></p>
      </div>
    </div>
  </div>
  <!-- Inclua os scripts do Bootstrap no final do corpo do documento -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
</body>
</html>
