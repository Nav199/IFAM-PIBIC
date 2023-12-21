<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="/view/plano_executivo/plano.js"></script>
    <title>Formulário Empresarial</title>
</head>
<style>
    .white-label {
        color: rgba(255, 255, 255, 1);
    }
    .custom-input {
            background-color: rgba(28, 36, 56, 1);
            color: rgba(255, 255, 255, 1);
        }

        /* Estilo para os placeholders */
        .custom-placeholder::placeholder {
            color: rgba(123, 123, 123, 1);
        }
</style>
<body  style="background-color: rgba(21, 25, 41, 1);">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Perfil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Configurações</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

    <div class="container mt-5">
        <form method="POST" action="/index.php">
            <h3 class="text-center mb-4 white-label">Formulário Empresarial</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="nomeEmpresa" class="white-label">Nome da Empresa</label>
                        <input type="text" class="form-control custom-input" id="nomeEmpresa" name="nomeEmpresa" placeholder="Nome da Empresa"  style="color: rgba(123, 123, 123, 1);">
                    </div>
                    <div class="form-group mb-3">
                        <label for="cnpjCpf" class="white-label">CNPJ/CPF</label>
                        <input type="number" class="form-control custom-input" id="cnpjCpf" name="cnpjCpf" placeholder="CNPJ/CPF">
                    </div>
                    <div class="form-group mb-3">
                    <label for="setorAtividade" class="white-label">Setor de Atividade</label>
                    <select class="form-control custom-input" id="setorAtividade" name="setorAtividade">
                        <option value="agropecuaria">Agropecuária</option>
                        <option value="industria">Indústria</option>
                        <option value="comercio">Comércio</option>
                        <option value="servicos">Prestação de Serviços</option>
                        <option value="software">Software</option>
                        <option value="manutencao">Manutenção</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                <label for="FormaJuridica" class="white-label">Forma Jurídica</label>
                <select class="form-select" id="FormaJuridica" name="FormaJuridica" aria-label="Default select example">
                    <option selected>Forma Jurídica</option>
                    <option value="EI">Empresário Individual (EI)</option>
                    <option value="MEI">Microempreendedor Individual (MEI)</option>
                    <option value="EIRELI">Empresário Individual de Responsabilidade Limitada (EIRELI)</option>
                    <option value="Ltda">Sociedade Limitada (Ltda)</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="enquadramento" class="white-label">Enquadramento Tributário</label>
                <select class="form-select" id="enquadramento" name="enquadramento" aria-label="Default select example">
                    <option selected>Optante pelo Simples</option>
                    <option value="Não">Não</option>
                    <option value="Sim">Sim</option>
                </select>
            </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="cep" class="white-label">CEP</label>
                        <input type="text" class="form-control custom-input" id="cep" name="cep" placeholder="CEP">
                    </div>
                    <div class="form-group mb-3">
                        <label for="localidade" class="white-label">Localidade/UF</label>
                        <input type="text" class="form-control custom-input" id="localidade" name="localidade" placeholder="Localidade/UF">
                    </div>
                    <div class="form-group mb-3">
                        <label for="bairroDistrito" class="white-label">Bairro/Distrito</label>
                        <input type="text" class="form-control custom-input" id="bairroDistrito" name="bairroDistrito" placeholder="Bairro/Distrito">
                    </div>
                    <div class="form-group mb-3">
                        <label for="logradouro" class="white-label">Logradouro</label>
                        <input type="text" class="form-control custom-input" id="logradouro" name="logradouro" placeholder="Logradouro">
                    </div>
                    <div class="form-group mb-3">
                        <label for="numero" class="white-label">Número</label>
                        <input type="text" class="form-control custom-input" id="numero" name="numero" placeholder="Número">
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="missaoEmpresa" class="white-label">Missão da Empresa</label>
                <textarea class="form-control custom-input" id="missaoEmpresa" name="missaoEmpresa" placeholder="Missão da Empresa"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="valoresEmpresa" class="white-label">Valores da Empresa</label>
                <textarea class="form-control custom-input" id="valoresEmpresa" name="valoresEmpresa" placeholder="Valores da Empresa"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="visaoEmpresa" class="white-label">Visão da Empresa</label>
                <textarea class="form-control custom-input" id="visaoEmpresa" name="visaoEmpresa" placeholder="Visão da Empresa"></textarea>
            </div>
            <div class="form-group">
                <label for="fonteRecursos" class="white-label">Fonte dos Recursos da Empresa</label>
                <textarea class="form-control custom-input" id="fonteRecursos" name="fonteRecursos" placeholder="Fonte dos Recursos da Empresa"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mb-3">Enviar</button>
            </div>
        </form>
    </div>

</body>
</html>
