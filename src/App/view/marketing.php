<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário de Negócios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Formulário de Negócios</h2>
    <form method="POST" action="/marketing">
        <div class="mb-3">
            <label for="produtoServico" class="form-label">Principais Produtos e Serviços</label>
            <input type="text" class="form-control" id="produtoServico" placeholder="Digite os produtos e serviços" name="produtos">
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" class="form-control" id="preco" name="preco" placeholder="Digite o preço">
        </div>
        <div class="mb-3">
            <label for="estrategiasPromocionais" class="form-label">Estratégias Promocionais</label>
            <input type="text" class="form-control" id="estrategiasPromocionais" name="estrategia" placeholder="Digite as estratégias promocionais">
        </div>
        <div class="mb-3">
            <label for="estruturaComercializacao" class="form-label">Estrutura de Comercialização</label>
            <input type="text" class="form-control" id="estruturaComercializacao" name="comercializacao" placeholder="Digite a estrutura de comercialização">
        </div>
        <div class="mb-3">
            <label for="localizacaoNegocio" class="form-label">Localização do Negócio</label>
            <input type="text" class="form-control" id="localizacaoNegocio" name="localizacao" placeholder="Digite a localização do negócio">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

</body>
</html>
