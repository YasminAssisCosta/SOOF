<?php
require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');
include 'menuAdmin.php';
?>

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
    <div class="card my-auto mx-auto">
        <h1 class="text-center mt-5">Cadastro de Produto</h1>
        <form action="../controller/adicionar_produto.php" id="form-add-item" method="POST" enctype="multipart/form-data">
            <div class="form-group ml-3 mr-3 mt-2">
                <label for="produto">Produto:</label>
                <input type="text" class="form-control" id="produto" name="produto" required>
            </div>
            <div class="form-group ml-3 mt-2 mr-3">
                <label for="valor">Valor:</label>
                <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
            </div>
            <div class="form-group ml-3 mt-2 mr-3">
                <label for="especificacao">Especificação:</label>
                <input type="text" class="form-control" id="especificacao" name="especificacao" required>
            </div>
            <div class="form-group ml-3 mt-2 mr-3">
                <label for="altura">Altura:</label>
                <input type="text" class="form-control" id="altura" name="altura" required>
            </div>
            <div class="form-group ml-3 mt-2 mr-3">
                <label for="largura">Largura:</label>
                <input type="text" class="form-control" id="largura" name="largura" required>
            </div>
            <div class="form-group ml-3 mt-2 mr-3">
                <label for="fotoCapa">Foto da Capa:</label>
                <input type="file" class="form-control-file" id="fotoCapa" name="fotoCapa">
            </div>
            <div class="form-group ml-3 mt-2 mr-3">
                <label for="modelo">Modelo:</label>
                <input type="text" class="form-control" id="modelo" name="modelo">
            </div>
            <div class="form-group ml-3 mt-2 mr-3">
                <label for="estoque">Estoque:</label>
                <input type="number" class="form-control" id="estoque" name="estoque">
            </div>
            <div class="form-group ml-3 mt-2 mr-3">
                <label for="fotoUm">Foto 1:</label>
                <input type="file" class="form-control-file" id="fotoUm" name="fotoUm">
            </div>
            <div class="form-group ml-3 mt-2 mr-3">
                <label for="fotoDois">Foto 2:</label>
                <input type="file" class="form-control-file" id="fotoDois" name="fotoDois">
            </div>
            <div class="text-center mb-3">
                <button type="submit" class="btn btn-primary" id="bt_cadI">Cadastrar</button>
            </div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
