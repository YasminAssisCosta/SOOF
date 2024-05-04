<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');
include 'menuS.php';

$id_produto = $_GET['produto'];

$sql = "SELECT * FROM tb_produto WHERE id_produto = $id_produto";
$result = $conexao->query($sql);



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/css/main.css">
  
  <title>SooF</title>
</head>

<body>  
 
    <div class="row">
    <?php
    while ($dados = $result->fetch_assoc()) { 
       ?>
      <div class="col-6 mt-5 ml-4">
        <img class="card-img" id="imgProdutoE" src="../public/images/dois.jpg" alt="Imagem de capa do card">
      </div>

      <div class="col-5 mt-5">
        <h1><?php echo $dados['produto'] ?></h1>

        <h4 class="mt-5" >Detalhes: <?php echo $dados['especificacao'] ?> </h4>
        <h3><?php echo $dados['valor'] ?></h3>

        <a href="../views/espProduto.php?produto=<?php echo $dados['id_produto'] ?>" class="btn btn-info mt-auto">R$ <?php echo $dados['valor'] ?></a>
      </div>
    </div>

    <?php } ?>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-g8HSlz0n2d2NXSkAyjSuCYT6RHp0y2v3zr7XnxDG0V8z3m40F2tIk4lO4yBw2lE0"
    crossorigin="anonymous"></script>

</body>

</html>