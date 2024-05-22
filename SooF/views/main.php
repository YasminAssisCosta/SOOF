<?php
require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');
include 'menuS.php';

$sql = "SELECT * FROM tb_produto";
$where = "";

if (isset($_GET['product_type']) && !empty($_GET['product_type'])) {
    $product_types = implode("','", $_GET['product_type']);
    $where = " WHERE modelo IN ('$product_types') AND estoque > 0";
} else {
    $where = " WHERE estoque > 0"; 
}

$sql .= $where;

$result = $conexao->query($sql);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="../public/css/main.css">
  
  <title>SooF</title>
  <style>
    .carousel-indicators {
      list-style: none; /* Remove default list styling */
      padding-left: 0; /* Remove default padding */
      margin-bottom: 0; /* Remove default margin */
      display: flex; /* Display indicators in a row */
      justify-content: center; /* Center the indicators */
    }
    .carousel-indicators li {
      width: 80px; /* Custom size */
      height: 80px; /* Custom size */
      background-color: #000; /* Custom background color */
       /* Make them round */
      margin: 0 5px; /* Space between indicators */
    }
    .carousel-indicators .active {
      background-color: #fff; /* Active indicator color */
    }
  </style>
</head>

<body>

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  
  <ul class="carousel-indicators">
    <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
    <li data-bs-target="#carouselExample" data-bs-slide-to="3"></li>
</ul>

  <div class="carousel-inner">
    <div class="carousel-item active">
    
    <img src="../public/images/tres.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../public/images/logoSoof.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img src="../public/images/logoM.jpg" id="imageC" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../public/images/ecobagCinco.jpg" class="d-block w-100" alt="...">
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


<div class="container">
    <div class="row ">
        <div class="col-3"  id="filtro">
        <div class="card" id="card-filtro" style="width: 18rem; height:19rem;"> 
        
                <form class="ml-3 mt-4 " action="#" method="GET">
                <i class="bi bi-funnel"><h3 class="text-center">Filtros</h3></i>

                    <div class="form-check mx-1 my-1">
                        <input class="form-check-input" type="checkbox" name="product_type[]" value="ecobag" id="ecobag">
                        <label class="form-check-label checkbox-label" for="ecobag">
                            Ecobag
                        </label>
                    </div>
                    <div class="form-check mx-1 my-1">
                        <input class="form-check-input" type="checkbox" name="product_type[]" value="capa para Tablet" id="capa para Tablet">
                        <label class="form-check-label checkbox-label" for="capa para Tablet">
                            Capa para Tablet
                        </label>
                    </div>
                    <div class="form-check mx-1 my-1">
                        <input class="form-check-input" type="checkbox" name="product_type[]" value="capa para chromebook" id="capa para chromebook">
                        <label class="form-check-label checkbox-label" for="capa para chromebook">
                            Capa para Chromebook
                        </label>
                    </div>
                    <div class="form-check mx-1 my-1">
                        <input class="form-check-input" type="checkbox" name="product_type[]" value="kit com dois produtos" id="kit com dois produtos">
                        <label class="form-check-label checkbox-label" for="kit com dois produtos">
                            Kit com dois produtos
                        </label>
                    </div>
                    <div class="form-check mx-1 my-1">
                        <input class="form-check-input" type="checkbox" name="product_type[]" value="kit com três produtos" id="kit com três produtos">
                        <label class="form-check-label checkbox-label" for="kit com três produtos">
                            Kit com três produtos
                        </label>
                    </div>
                    <button type="submit" class="btn-btn mt-3" id="bt_filtro">Filtrar</button>
                </form>
            </div>
        </div>
    <div class="col-9">
    <div class="container mt-5">

    <h1 id="produtos">Produtos</h1>
  <div class="row justify-content-center">
    <?php while ($dados = $result->fetch_assoc()) { 
      $capa = $dados['fotoCapa'];
      
      ?>
      <div class="col-md-4 mb-3">
        <div class="card">
        <img class="card-img-top"  src="<?php echo "../controller/upload/$capa" ?>" alt="Imagem de capa do card">
               
          <div class="card-body">
            <p class="card-title"><?php echo $dados['produto'] ?></p>
            
            <a href="../views/espProduto.php?produto=<?php echo $dados['id_produto'] ?>" 
            class="btn" id="bt_produto">R$ <?php echo number_format($dados['valor'], 2, ',', '.'); ?></a>
            
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
    </div>
    
  </div>
</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>


