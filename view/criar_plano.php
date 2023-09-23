<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/view/css/criar.css">
    <!-- Inclua o arquivo CSS separado -->
    <link rel="stylesheet" href="styles.css">
    <style>
        .header {
            background: rgba(28, 36, 56, 1);
            color: #fff;
            padding: 10px 0;
            margin-left: 60px;
        }

        .perfil-icon img,
        .ferramenta-icon img {
            width: 20px;
            height: 20px;
            margin-right: 5px;
        }

        .quadrado {
            width: 289px;
            height: 203px;
            position: absolute;
            top: 122px;
            left: 347px;
            background: rgba(255, 255, 255, 1);
        }

        .nome-empresa {
            width: 220px;
            height: 32px;
            position: absolute;
            top: 124px;
            left: 681px;
            font-family: Inter;
            font-size: 16px;
            font-weight: 400;
            line-height: 19px;
            letter-spacing: 0em;
            text-align: left;
            background: rgba(255, 255, 255, 1);
        }

        .setor-atividade {
            width: 289px;
            height: 33px;
            position: absolute;
            top: 270px;
            left: 681px;
        }

        /* Estilo para a tag CNPJ/CPF */
        .cnpj-cpf {
            width: 220px;
            height: 32px;
            position: absolute;
            top: 121px;
            left: 1031px;
            font-family: Inter;
            font-size: 16px;
            font-weight: 400;
            line-height: 19px;
            letter-spacing: 0em;
            text-align: left;
        }

        /* Estilo para o input do CNPJ/CPF */
        .cnpj-cpf-input {
            width: 289px;
            height: 33px;
            position: absolute;
            top: 157px;
            left: 1031px;
        }

        /* Estilo para "Tipo de plano" */
        .tipo-plano {
            width: 172px;
            height: 32px;
            position: absolute;
            top: 231px;
            left: 1031px;
            font-family: Inter;
            font-size: 16px;
            font-weight: 400;
            line-height: 19px;
            letter-spacing: 0em;
            text-align: left;
            background: rgba(255, 255, 255, 1);
        }

        /* Estilo para "Enquadramento tributário" */
        .enquadramento-tributario {
            width: 203px;
            height: 32px;
            position: absolute;
            top: 359px;
            left: 683px;
            font-family: Inter;
            font-size: 16px;
            font-weight: 400;
            line-height: 19px;
            letter-spacing: 0em;
            text-align: left;
            background: rgba(255, 255, 255, 1);
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="container-fluid">
            <div class="col-md-6 text-end">
                <a href="/API_ANTIGA/perfil.html" class="perfil-icon">
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
    <div class="sidebar">
        <div class="logo">
            <!-- Your logo content goes here -->
            <div class="elipse">
                <img src="/view/img/perfil.png" alt="Logo">
            </div>
            <div class="usuario">
                <p style="text-align: center;">Usuário</p>
            </div>
            <div class="geral">
                <p>Geral</p>
                <p>Plano Executivo</p>
                <p>Análise de Mercado</p>
                <p>Avaliação estratégica</p>
                <p>Plano de Marketing</p>
                <p>Plano operacional</p>
                <p>Plano financeiro</p>
            </div>
        </div>
    </div>

    <!-- Adicione a tag CNPJ/CPF e o input aqui -->
    <div class="container mt-5">
        <form action="#" method="POST">
            <div class="quadrado">
                <input type="file" id="imagem" name="imagem">
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control nome-empresa" id="nomeEmpresa" name="nomeEmpresa" placeholder="Nome da empresa">
            </div>
            
            <div class="form-group">
                <select class="form-select setor-atividade" id="formaJuridica" name="formaJuridica">
                    <option selected>Selecione a forma jurídica</option>
                    <option value="Sociedade Anônima (S/A)">Sociedade Anônima (S/A)</option>
                    <option value="Sociedade Limitada (Ltda.)">Sociedade Limitada (Ltda.)</option>
                    <option value="Empresário Individual (EI)">Empresário Individual (EI)</option>
                    <option value="Empresa Individual de Responsabilidade Limitada (EIRELI)">Empresa Individual de Responsabilidade Limitada (EIRELI)</option>
                    <option value="mei">Microempreendedor individual (MEI)</option>
                </select>
            </div>

            <!-- Tag CNPJ/CPF e input -->
            <div class="form-group">
                <input type="text" class="form-control cnpj-cpf" id="cnpjCpf" name="cnpjCpf" placeholder="CNPJ/CPF">
            </div>
            <div class="form-group">
                <input type="text" class="form-control cnpj-cpf-input" id="cnpjCpfInput" name="cnpjCpfInput" placeholder="CNPJ/CPF">
            </div>
            
            <!-- Tag "Tipo de plano" e "Enquadramento tributário" -->
            <div class="form-group">
                <input type="text" class="form-control tipo-plano" id="tipoPlano" name="tipoPlano" placeholder="Tipo de plano">
            </div>
            <div class="form-group">
                <select class="form-select enquadramento-tributario" id="enquadramento" name="enquadramento">
                    <option selected>Optante pelo Simples</option>
                    <option value="sim">Sim</option>
                    <option value="não">Não</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

</body>
</html>
