<!DOCTYPE html>
<html>

<head>
    <title>Criar Plano de Negócios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="/view/js/login.js"></script>
    <style>
        body {
            background-color: #123456;
            /* Substitua pelo código de cor desejado */
        }

        .login-form label {
            color: white;
            /* Defina a cor do label */
        }

        .login-form .form-control {
            background-color: transparent;
            /* Defina a cor de fundo transparente */
            border-color: white;
            /* Defina a cor da borda */
            color: white;
            /* Defina a cor do texto */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Imagem aqui -->
                <img src="/view/img/Login.png" alt="Imagem" class="image">
            </div>
            <div class="col-md-6">
                <!-- Formulário de cadastro -->
                <form class="login-form" id="cadastroForm" method="post" action="/index.php">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                </form>
            </div>
            <p> <a href="/view/login.php">Login</a></p>
        </div>
    </div>
</body>

</html>
