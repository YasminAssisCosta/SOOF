<?php
require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');
session_start();

if(isset($_GET['id_produto']) && isset($_GET['id_usuario'])) {
    $id_produto = $_GET['id_produto'];
    $id_usuario = $_GET['id_usuario'];

    $sql = "DELETE FROM tb_carrinho WHERE id_usuario = $id_usuario AND id_produto = $id_produto";
    if ($conexao->query($sql) === TRUE) {
        
        header("Location:../views/espProduto.php?produto=$id_produto");
    } else {
        echo "Erro ao remover item do carrinho: " . $conexao->error;
    }

    $conexao->close();
} else {
    echo "ID do produto ou do usuário não especificado.";
}

?>
