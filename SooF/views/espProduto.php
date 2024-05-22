<?php
require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');
include 'menuS.php';

$id_produto = $_GET['produto'];

$sql = "SELECT * FROM tb_produto WHERE id_produto = $id_produto";
$result = $conexao->query($sql);


if (!$result) {
    
    die("Erro: " . $conexao->error);
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../public/css/main.css">
  
  <title>SooF</title>
 
</head>

<body>  
  <div class="row my-0 mx-0">
    <?php
    while ($dados = $result->fetch_assoc()) { 
     
       $capa = $dados['fotoCapa'];
       $fotoUm = $dados['fotoUm'];
       $fotoDois = $dados['fotoDois'];
    ?>
      <div class="col-8 mt-5 ml-4">
       
<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
  <div class="carousel-item active">
      <img src="<?php echo "../controller/upload/$capa" ?>" id="imageC" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo "../controller/upload/$fotoUm" ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo "../controller/upload/$fotoDois" ?>" class="d-block w-100" alt="...">
    </div>
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
      </div>

      <div class="col-3 mt-5">
        <h1 ><?php echo $dados['produto'] ?></h1>
        
        <p class="mt-4">Valor: R$  <?php echo number_format($dados['valor'], 2, ',', '.'); ?> </p>
        <hr style="border-style:dotted; ">
        <p class="" style="font-size:16px; margin-top:40px;"><strong>Tamanho: </strong></p>
        <p style="margin-top:10px; pading:0">Altura: <?php echo $dados['altura'] ?> </p>
        <p >Largura: <?php echo $dados['largura'] ?> </p>
        <p class="mt-1" style="font-size:16px;"><strong>Detalhes: </strong></p>
        <p class="mt-1" > <?php echo $dados['especificacao'] ?> </p>
        <br> <br><br> <br>

        <form method="post" action="../controller/adicionarCarrinho.php" class="d-flex">
          <input type="hidden" name="id_usuario" value="<?php echo "$id"  ?>">
          <input type="hidden" name="id_produto" value="<?php echo $dados['id_produto']; ?>">
          <input type="number" name="quantidade" value="1" min="1" max="<?php echo $dados['estoque']; ?>">
          <button type="submit" class="btn btn-info ms-2 btn-adicionar-carrinho"  style="color:#ffffff;">Adicionar ao Carrinho</button>
        </form>

        <br><br><br>
        <div class="row">
          <?php
          if (isset($_SESSION['erroAI'])) {
              echo "<div class='alert alert-danger mt-2 text-center' style='height: 40px, width:70%;'>
                  $_SESSION[erroAI]
              </div> ";
              unset($_SESSION['erroAI']);
          }
          if (isset($_SESSION['sucessoAI'])) {
              echo "<div class='alert alert-success mt-2 text-center' style='height: 50px;'>
                  $_SESSION[sucessoAI]
              </div> ";
              unset($_SESSION['sucessoAI']);
          }
          ?>
        </div>
      </div>
    <?php } ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-g8HSlz0n2d2NXSkAyjSuCYT6RHp0y2v3zr7XnxDG0V8z3m40F2tIk4lO4yBw2lE0"
    crossorigin="anonymous"></script>

</body>

</html>
