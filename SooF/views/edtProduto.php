
<?php
require_once ('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');
include 'menuAdmin.php';


$id_produto = $_GET["produto"] ?? null;

$sql = "SELECT * FROM tb_produto WHERE id_produto = $id_produto";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    
    $produto = $result->fetch_assoc();
    $nome_produto = $produto['produto'];
    $valor = $produto['valor'];
    $especificacao = $produto['especificacao'];
    $altura = $produto['altura'];
    $largura = $produto['largura'];
    $modelo = $produto['modelo'];
    $estoque = $produto['estoque'];
} else {
    
    echo "Produto não encontrado.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Produto</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container ">
    <div class="card my-auto mx-auto">
<h1 class="text-center mt-5">Edição de produtos de Produto</h1>
    <form action="../controller/edtProduto.php" method="POST" enctype="multipart/form-data">
        
        <input type="hidden" name="id_produto" value="<?php echo $id_produto ?>">
        <div class="form-group form-group ml-3 mt-2 mr-3">
            <label for="produto">Produto:</label>
            <input type="text" class="form-control" id="produto" name="produto" value="<?php echo $nome_produto ?>" required>
        </div>
        <div class="form-group form-group ml-3 mt-2 mr-3">
            <label for="valor">Valor:</label>
            <input type="number" step="0.01" class="form-control" id="valor" name="valor" value="<?php echo $valor ?>" required>
        </div>
        <div class="form-group form-group ml-3 mt-2 mr-3">
            <label for="especificacao">Especificação:</label>
            <input type="text" class="form-control" id="especificacao" name="especificacao" value="<?php echo $especificacao ?>" required>
        </div>
        <div class="form-group ml-3 mt-2 mr-3">
                <label for="altura">Altura:</label>
                <input type="text" class="form-control" id="altura" name="altura" value="<?php echo $altura ?>" required>
            </div>
            <div class="form-group ml-3 mt-2 mr-3">
                <label for="largura">Largura:</label>
                <input type="text" class="form-control" id="largura" name="largura" value="<?php echo $largura ?>" required>
            </div>
        <div class="form-group form-group ml-3 mt-2 mr-3">
            <label for="modelo">Modelo:</label>
            <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $modelo ?>">
        </div>
        <div class="form-group form-group ml-3 mt-2 mr-3">
            <label for="estoque">Estoque:</label>
            <input type="number" class="form-control" id="estoque" name="estoque" value="<?php echo $estoque ?>">
        </div>
        <div class="text-center mb-3">
            <button type="submit" class="btn btn-primary" id="bt_edt">Editar</button>
        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
