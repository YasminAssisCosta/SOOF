<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$id_produto = $_POST['id_produto'];
$produto = $_POST['produto'];
$valor = $_POST['valor'];
$especificacao = $_POST['especificacao'];
$altura = $_POST['altura'];
$largura = $_POST['largura'];
$modelo = $_POST['modelo'];
$estoque = $_POST['estoque'];

$sql = "UPDATE tb_produto SET produto = '$produto', valor = '$valor', especificacao = '$especificacao', altura ='$altura', largura = '$largura',  modelo = '$modelo', estoque = '$estoque' WHERE id_produto = '$id_produto'";

if (mysqli_query($conexao, $sql)) {
    $_SESSION['sucesso_EP'] = "Produto atualizado com sucesso";
    header("Location: ../views/inicioAdmin.php");
} else {
    $_SESSION['erro_EP'] = "Erro ao atualizar produto";
    header("Location: ../views/editarProduto.php?produto=$id_produto");
}

?>
