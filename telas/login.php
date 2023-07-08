<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <main id="login-page">
        <!-- Login -->
        <div id="login-register" class="container ">
            <div class="row">
                <div class="col-6">
                    <img class="img-fluid"
                        src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0f/ba/29/5c/img-worlds-of-adventure.jpg?w=1200&h=1200&s=1"
                        alt="">
                </div>
                <div class="col-6 d-flex flex-column justify-content-center gap-3 px-5" id="login-form">
                    <h2 class="fw-bold fs-3 title">Digite seu email e sua senha</h2>
                    <p class="fw-semibold fs-4 mb-0 title">Faça seu login</p>
                    <form action="verificar.php" method="POST">
                        <div class="mb-3">
                            <label for="email-input" class="form-label d-none">Email</label>
                            <input type="email" class="form-control" id="email-input" placeholder="Email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password-input" class="form-label d-none">Senha</label>
                            <input type="password" class="form-control" id="password-input" placeholder="Senha" name="senha">
                        </div>
                        <div class="d-flex justify-content-between align-items-center fs-5 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="continue-connected-check">
                                <label class="form-check-label text-black-50 fw-semibold" for="continue-connected-check">
                                    Mantenha-me conectado
                                </label>
                            </div>
                            <a class="primary-link recover" href="#">Recuperar senha</a>
                        </div>
                        <button class="btn btn-primary form-button d-block w-100 fs-4" type="submit" name="entrar" href="/executivo//socio.php">Entrar</button>
                    </form>

                    <div class="text-center">
                        <p class="text-black-50 fs-5">Ainda não tem uma conta? <a class="link link-color" id="create-new-account" href="/telas/cadastro.php">Clique aqui!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
 
</body>
<script src="js/bootstrap.bundle.min.js"></script>

</html>