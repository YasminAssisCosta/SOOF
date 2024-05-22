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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/carrinho.css">
    <style>
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="px-4 px-lg-0">
 

 <div class="pb-5">
   <div class="container">
     <div class="row">
       <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

        
         <div class="table-responsive">
           <table class="table">
             <thead>
               <tr>
                 <th scope="col" class="border-0 bg-light">
                   <div class="p-2 px-3 text-uppercase">Produto</div>
                 </th>
                 <th scope="col" class="border-0 bg-light text-center">
                   <div class="py-2 text-uppercase">Valor</div>
                 </th>
                 <th scope="col" class="border-0 bg-light text-center">
                   <div class="py-2 text-uppercase">Quantidade</div>
                 </th>
                 
                 <th scope="col" class="border-0 bg-light text-center">
                   <div class="py-2 text-uppercase">Excluir</div>
                 </th>
                 <th scope="col" class="border-0 bg-light text-center">
                   <div class="py-2 text-uppercase">Editar</div>
                 </th>
               </tr>
             </thead>
             <tbody>
             <?php
            if ($result->num_rows > 0) {
                while ($dados = $result->fetch_assoc()) { ?>
               <tr>
                 <th scope="row" class="border-0">
                   <div class="p-2">
                     <img src="../public/images/ecobagDois.jpg" alt="" width="150" class="img-fluid rounded shadow-sm">
                     <div class="ml-5 d-inline-block align-middle" id="nomeP">
                       <h5 class=" mb-0"><a href="" class="text-dark d-inline-block align-middle"><?php echo $dados['produto']; ?></a></h5><span class="text-muted font-weight-normal font-italic d-block"><?php echo $dados['especificacao']; ?></span>
                      
                       <label class="text-muted font-weight-normal font-italic d-inline-block" style="font-size:16px; vertical-align: middle; margin-right: 5px;">Selecionar</label>
                       <input type="checkbox" class="item-selecionado d-inline-block" style="vertical-align: middle; margin-top: 5px; height:15px; width: 20px;" data-quantidade="<?php echo $dados['quantidade']; ?>" data-valor="<?php echo $dados['valor']; ?>">

  </div>
                   </div>
                 </th>
                 <td class="border-0 align-middle text-center"><strong><?php echo number_format($dados['valor'], 2, ',', '.'); ?></strong></td>
                 <td class="border-0 align-middle text-center"><strong><?php echo $dados['quantidade']; ?></strong></td>
                 
                 <td class="border-0 align-middle text-center"><a href="../controller/excItemCarrinho.php?id_usuario=<?php echo $id ?>&id_produto=<?php echo $dados['id_produto']; ?>" class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
</svg></a></td>
                 <td class="border-0 align-middle text-center"><a href="../controller/editarItem.php?id_usuario=<?php echo $id ?>&id_produto=<?php echo $dados['id_produto']; ?>" class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
</svg></a></td>
               </tr>
             
               <?php }
            } else {
                echo "<p>Você não possui produtos no carrinho.</p>";
            }
            ?>
             </tbody>
           </table>
         </div>
         <!-- End -->
       </div>
     </div>

     

   </div>
 </div>
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