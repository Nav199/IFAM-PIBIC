<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <!-- Inclua o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/view/css/home.css">
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="/view/img/Login.png" alt="">
        </div>
    </div>

    <header>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <!-- Barra de Pesquisa -->
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pesquisar">
                        <button class="btn btn-primary" type="button">Buscar</button>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <a href="/view/perfil.php" class="perfil-icon">
                        <img src="/view/img/perfil.png" alt="">
                        Perfil
                    </a>
                    <a href="ferramenta.html" class="ferramenta-icon">
                        <img src="/view/img/ferramenta.png" alt="">
                        Ferramenta
                    </a>
                </div>
            </div>
        </div>
    </header>

    <button class="btn btn-criar-plano" >
    <a href="/view/plano_executivo.php" style="text-decoration: none; color: inherit;">
        Criar um novo plano
    </a>
    </button>

    <div class="container mt-4">
        <h3 style="color: aliceblue;">Recentes</h3>
        <!-- Conteúdo da página aqui -->

        <!-- Estrutura de planos de negócio com expansão/retratação -->
        <div class="accordion" id="planosNegocio">
            <!-- Plano de negócio 1 -->
            <div class="card plano-negocio">
                <div class="card-header" id="plano1">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            Plano de Negócio 1
                        </button>
                    </h2>
                </div>

                <div id="collapse1" class="collapse" aria-labelledby="plano1" data-parent="#planosNegocio">
                    <div class="card-body">
                        Conteúdo do Plano de Negócio 1.
                    </div>
                </div>
            </div>

            <!-- Plano de negócio 2 -->
            <div class="card plano-negocio">
                <div class="card-header" id="plano2">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                            Plano de Negócio 2
                        </button>
                    </h2>
                </div>

                <div id="collapse2" class="collapse" aria-labelledby="plano2" data-parent="#planosNegocio">
                    <div class="card-body">
                        Conteúdo do Plano de Negócio 2.
                    </div>
                </div>  
                </div>
        </div>
    </div>

    

    <!-- Inclua o JavaScript do Bootstrap (opcional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYlT" crossorigin="anonymous"></script>
</body>
</html>
