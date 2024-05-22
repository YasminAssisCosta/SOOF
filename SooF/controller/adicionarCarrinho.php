<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');
session_start();

if (!isset($_SESSION['usuario'])) {
    $_SESSION['erroAI'] = "Você precisa realizar o login para adicionar itens ao carrinho.";
    header("Location:../views/login.php"); 
    exit();
}

$id_produto = $_POST['id_produto'];
$quantidade = $_POST['quantidade'];
$id = $_SESSION['usuario'];

$sql_check = "SELECT * FROM tb_carrinho WHERE id_usuario = '$id' AND id_produto = '$id_produto'";
$result_check = $conexao->query($sql_check);

if ($result_check->num_rows > 0) {
    $_SESSION['erroAI'] = "Este item já está no carrinho.";
    header("Location:../views/espProduto.php?produto=$id_produto");
    exit();
} else {
    $sql_insert = "INSERT INTO tb_carrinho (id_usuario, id_produto, quantidade) VALUES ('$id', '$id_produto', '$quantidade')";
    if (mysqli_query($conexao, $sql_insert)) {
        $_SESSION['sucessoAI'] = "Produto adicionado ao carrinho com sucesso.";
        header("Location:../views/espProduto.php?produto=$id_produto");
        exit(); 
    } else {
        $_SESSION['erroAI'] = "Erro ao adicionar produto ao carrinho. Por favor, tente novamente mais tarde.";
        header("Location:../views/erro.php");
        exit(); 
    }
}
?>
