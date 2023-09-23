<!DOCTYPE html>
<html>

<head>
    <title>Criar Plano de Negócios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: #123456;
        }
        
        .login-form label {
            color: white; /* Defina a cor do label */
        }
        
        .login-form .form-control {
            background-color: transparent; 
            border-color: white; /* Defina a cor da borda */
            color: white; /* Defina a cor do texto */
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
                <!-- Formulário de login -->
                <form class="login-form" action="/index.php" method="POST">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" id="login" name="login" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="senha" name="senha">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    <hr>
                    <button type="button" class="btn btn-danger btn-block">Entrar com Google</button>
                    <button type="button" class="btn btn-primary btn-block">Entrar com Facebook</button>
                </form>
                <p>Esqueceu sua senha? <a href="#">Recuperar senha</a></p>
        <p>Ainda não tem uma conta? <a href="/view/cadastro.php">Criar uma conta</a></p>
            </div>
        </div>
    </div>
</body>
</html>
