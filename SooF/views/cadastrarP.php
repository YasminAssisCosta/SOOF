<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Cadastro de Produto</h2>
    <form action="cadastro_produto.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="produto">Produto:</label>
            <input type="text" class="form-control" id="produto" name="produto" required>
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
        </div>
        <div class="form-group">
            <label for="especificacao">Especificação:</label>
            <input type="text" class="form-control" id="especificacao" name="especificacao" required>
        </div>
        <div class="form-group">
            <label for="fotoCapa">Foto da Capa:</label>
            <input type="file" class="form-control-file" id="fotoCapa" name="fotoCapa">
        </div>
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" class="form-control" id="modelo" name="modelo">
        </div>
        <div class="form-group">
            <label for="estoque">Estoque:</label>
            <input type="number" class="form-control" id="estoque" name="estoque">
        </div>
        <div class="form-group">
            <label for="fotoUm">Foto 1:</label>
            <input type="file" class="form-control-file" id="fotoUm" name="fotoUm">
        </div>
        <div class="form-group">
            <label for="fotoDois">Foto 2:</label>
            <input type="file" class="form-control-file" id="fotoDois" name="fotoDois">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
