<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');
include 'menuS.php';


$sql = "SELECT * FROM tb_produto";
$result = $conexao->query($sql);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="../public/css/main.css">
  
  <title>SooF</title>
</head>

<body >
  
  <div class="container-fluid mt-3">
    <div id="meuCarrossel" class="carousel slide w-100" data-ride="carousel">
     
        <ul class="carousel-indicators">
            <li data-target="#meuCarrossel" data-slide-to="0" class="active"></li>
            <li data-target="#meuCarrossel" data-slide-to="1"></li>
            <li data-target="#meuCarrossel" data-slide-to="2"></li>
            <li data-target="#meuCarrossel" data-slide-to="3"></li>
        </ul>
        <div class="carousel-inner" >
            <div class="carousel-item active">
                <img src="../public/images/logoSoof.jpg" alt="Slide 1">
            </div>

            <div class="carousel-item">
                <img src="../public/images/um.jpg" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="../public/images/dois.jpg" alt="Slide 3">
            </div>
            <div class="carousel-item">
                <img src="../public/images/tres.jpg" alt="Slide 4">
            </div>
        </div>
        <a class="carousel-control-prev" href="#meuCarrossel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#meuCarrossel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>

<div class="container mt-5">
  <div class="row justify-content-center">
    <?php while ($dados = $result->fetch_assoc()) { ?>
      <div class="col-md-3 mb-3">
        <div class="card">
          <img class="card-img-top" src="../public/images/bolsa.svg" alt="Imagem de capa do card">
          <div class="card-body">
            <h5 class="card-title"><?php echo $dados['produto'] ?></h5>
            <p class="card-text"><?php echo $dados['especificacao'] ?></p>
            <a href="../views/espProduto.php?produto=<?php echo $dados['id_produto'] ?>" class="btn btn-info">R$ <?php echo $dados['valor'] ?></a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-g8HSlz0n2d2NXSkAyjSuCYT6RHp0y2v3zr7XnxDG0V8z3m40F2tIk4lO4yBw2lE0"
    crossorigin="anonymous"></script>

</body>

</html>