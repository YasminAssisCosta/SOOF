<?php
require_once ('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');
include 'menuS.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['usuario'];

$sql = "SELECT p.*, c.quantidade FROM tb_produto p
        INNER JOIN tb_carrinho c ON p.id_produto = c.id_produto
        WHERE c.id_usuario = $id";
$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/main.css">
</head>
<body>
    <div class="container mb-auto">
        <h1 class="text-center">Meus Produtos</h1>
        <form id="checkout-form">
            <?php
            if ($result->num_rows > 0) {
                while ($dados = $result->fetch_assoc()) { ?>
                    <div class="card mb-4" style="height: 200px;">
                        <div class="row">
                            <div class="col-sm-3">
                                <img class="card-img-top" src="../public/images/ecobagDois.jpg" alt="Imagem de capa do card" style="height: 200px;">
                            </div>
                            <div class="col-md-5">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $dados['produto']; ?></h5>
                                    <p class="card-text">Valor: R$ <?php echo number_format($dados['valor'], 2, ',', '.'); ?></p>
                                    <p class="card-text">Especificação: <?php echo $dados['especificacao']; ?></p>
                                    <p class="card-text">Quantidade: <?php echo $dados['quantidade']; ?></p>
                                  
                                    <input type="checkbox" class="item-selecionado ml-1" data-quantidade="<?php echo $dados['quantidade']; ?>" data-valor="<?php echo $dados['valor']; ?>"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-body text-right">
                                    <a class="btn btn-danger btn-sm mb-1" href="../controller/excItemCarrinho.php?id_usuario=<?php echo $id ?>&id_produto=<?php echo $dados['id_produto']; ?>" role="button">
                                        Remover item
                                    </a>
                                    <a class="btn btn-primary btn-sm mb-1" href="../controller/editarItem.php?id_usuario=<?php echo $id ?>&id_produto=<?php echo $dados['id_produto']; ?>" role="button">
                                        Editar item
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } else {
                echo "<p>Você não possui produtos no carrinho.</p>";
            }
            ?>
        </form>
    </div>

    <nav id="bottom-menu" class="">
        <div class="container d-flex justify-content-around align-items-center">
            <p id="total-compra" class="ml-auto mt-1">Total das compras: R$ 0.00</p>
            <a class="btn btn-primary float-right" href="#" id="bt_comprar" role="button"> Comprar </a>
        </div>
    </nav>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Adicione o JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.item-selecionado').change(function() {
                var total = 0;
                $('.item-selecionado:checked').each(function() {
                    var quantidade = $(this).data('quantidade');
                    var valor = $(this).data('valor');
                    total += parseFloat(quantidade) * parseFloat(valor);
                });
                $('#total-compra').text('Total das compras: R$ ' + total.toFixed(2));
            });
        });
    </script>
   
</body>
</html>
