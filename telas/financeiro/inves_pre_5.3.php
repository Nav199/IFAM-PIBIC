<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimentos Pré-Operacionais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-pzjw8f+ua8v7U0r+vV8z5TIxudTVD3YKV5nK+3zph5HC0flQ5h5c7fVCp0dZjHqI" crossorigin="anonymous">
    <script src="../financeiro/js/inves_pre.js"></script>
</head>
<body>
    <div class="container">
        <table class="table table-bordered" id="table01">
            <thead>
                <tr>
                    <th><input type="button" value="Adicionar" onclick="AdicionarLinha('table01')" class="btn btn-primary"></th>
                    <th>Investimentos Pré-Operacionais</th>
                    <th>R$</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="descricao" id="descricao" class="form-control"></td>
                    <td><input type="number" name="custo" id="custo" class="form-control"></td>
                    <td></td>
                    <td id="Total"></td>
                </tr>
            </tbody>
        </table>
        <button onclick="exportToJson()">Enviar</button>
    </div>

</body>
</html>
