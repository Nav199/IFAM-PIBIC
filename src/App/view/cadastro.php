<!DOCTYPE html>
<html>

<head>
    <title>Criar Plano de Negócios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="src\App\view\css\cadastro.css">
    <script src="src\App\view\js\cadastro.js"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Imagem aqui -->
                <img src="src\App\view\img\Login.png" alt="Imagem" class="image">
            </div>
            <div class="col-md-6">
                <!-- Formulário de cadastro -->
                <form class="login-form" id="cadastroForm" method="POST" action="/">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                        <div id="nomeHelp" class="form-text"></div>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                        <div id="cpfHelp" class="form-text"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                </form>
            </div>
            <p> <a href="/login">Login</a></p>
        </div>
    </div>
</body>

</html>
