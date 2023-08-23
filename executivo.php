<?php
// Obtém os valores dos IDs do sócio e do usuário da URL
$idSocio = isset($_GET['idSocio']) ? $_GET['idSocio'] : '';
$idUsuario = isset($_GET['idUsuario']) ? $_GET['idUsuario'] : '';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <title>Dados do Empreendimento</title>
  <style>
    .container {
      margin-top: 50px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Dados do Empreendimento</h1>
    <form action="index.php" method="POST">
    <div class="mb-3">
          <label for="idUsuario">ID do Usuário</label>
          <input type="text" class="form-control" id="idUsuario" name="idUsuario" value="<?php echo $idUsuario?>" readonly>
        </div>
        <div class="mb-3">
          <label for="idSocio">ID do Socio</label>
          <input type="text" class="form-control" id="idSocio" name="idSocio" value="<?php echo $idSocio?>" readonly>
          <?php
           $idSocio = isset($_GET['idSocio']) ? $_GET['idSocio'] : $idSocio;

          ?>
      <div class="mb-3">
        <label for="nomeEmpresa" class="form-label">Nome da Empresa</label>
        <input type="text" class="form-control" id="nomeEmpresa" name="Nome" placeholder="Digite o nome da empresa">
      </div>
      <div class="mb-3">
        <label for="missao" class="form-label">Missão</label>
        <textarea class="form-control" id="missao" rows="3" name="missao" placeholder="Digite a missão da empresa"></textarea>
      </div>
      <div class="mb-3">
        <label for="visao" class="form-label">Visão</label>
        <textarea class="form-control" id="visao" rows="3" name="visao" placeholder="Digite a visão da empresa"></textarea>
      </div>
      <div class="mb-3">
        <label for="valores" class="form-label">Valores</label>
        <textarea class="form-control" id="valores" rows="3" name="valores" placeholder="Digite os valores da empresa"></textarea>
      </div>
      <div class="mb-3">
        <label for="recursos" class="form-label">Fonte de Recursos</label>
        <textarea class="form-control" id="recursos" rows="3" name="Recursos" placeholder="Digite a fonte de recursos da empresa"></textarea>
      </div>
      <div class="mb-3">
        <label for="setorAtividade" class="form-label">Setor de Atividade</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="agricultura" id="setorAgricultura" name="setor[]">
          <label class="form-check-label" for="setorAgricultura">
            Agricultura
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="industria" id="setorIndustria" name="setor[]">
          <label class="form-check-label" for="setorIndustria">
            Indústria
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="comercio" id="setorComercio" name="setor[]">
          <label class="form-check-label" for="setorComercio">
            Comércio
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="servicos" id="setorServicos" name="setor[]">
          <label class="form-check-label" for="setorServicos">
            Serviços
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="outros" id="setorOutros" name="setor[]">
          <label class="form-check-label" for="setorOutros">
            Outros
          </label>
        </div>
      </div>

      <div class="mb-3">
        <label for="formaJuridica" class="form-label">Forma Jurídica</label>
        <select class="form-select" id="formaJuridica" name="formaJuridica">
          <option selected>Selecione a forma jurídica</option>
          <option value="Sociedade Anônima (S/A)">Sociedade Anônima (S/A)</option>
          <option value="Sociedade Limitada (Ltda.)">Sociedade Limitada (Ltda.)</option>
          <option value="Empresário Individual (EI)">Empresário Individual (EI)</option>
          <option value="Empresa Individual de Responsabilidade Limitada (EIRELI)">Empresa Individual de Responsabilidade Limitada (EIRELI)</option>
          <option value="mei">Microempreendedor individual (MEI)</option>
        </select>
        <div class="mb-3">
        <label for="Enquadramento" class="form-label">Enquadramento</label>
        <select class="form-select" id="enquadramento" name="enquadramento">
          <option selected>Optante pelo Simples</option>
          <option value="sim">Sim</option>
          <option value="não">Não</option>
        </select>
    
      <button type="submit" class="btn btn-primary" name="Enviar empreendimento">Enviar</button>
    </form>
  </div>

 
  
</body>

</html>
