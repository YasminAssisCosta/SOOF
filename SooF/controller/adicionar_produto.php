<?php

require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');
session_start();

$id_produto = $_POST['id_produto'];
$produto = $_POST['produto'];
$valor = $_POST['valor'];
$especificacao = $_POST['especificacao'];
$altura = $_POST['altura'];
$largura = $_POST['largura'];
$modelo = $_POST['modelo'];
$estoque = $_POST['estoque'];

$fotoCapa = '';
if (isset($_FILES['fotoCapa']) && $_FILES['fotoCapa']['size'] > 0) {
    $extensaoCapa = strtolower(substr($_FILES['fotoCapa']['name'], -4));
    $fotoCapa = md5(time()) . '_capa' . $extensaoCapa;
    $diretorio = "Upload/";
    move_uploaded_file($_FILES['fotoCapa']['tmp_name'], $diretorio . $fotoCapa);
}

$fotoUm = '';
if (isset($_FILES['fotoUm']) && $_FILES['fotoUm']['size'] > 0) {
    $extensaoUm = strtolower(substr($_FILES['fotoUm']['name'], -4));
    $fotoUm = md5(time()) . '_1' . $extensaoUm;
    $diretorio = "Upload/";
    move_uploaded_file($_FILES['fotoUm']['tmp_name'], $diretorio . $fotoUm);
}

$fotoDois = '';
if (isset($_FILES['fotoDois']) && $_FILES['fotoDois']['size'] > 0) {
    $extensaoDois = strtolower(substr($_FILES['fotoDois']['name'], -4));
    $fotoDois = md5(time()) . '_2' . $extensaoDois;
    $diretorio = "Upload/";
    move_uploaded_file($_FILES['fotoDois']['tmp_name'], $diretorio . $fotoDois);
}

$sql = "INSERT INTO tb_produto (produto, valor, especificacao, altura, largura, fotoCapa, modelo, estoque, fotoUm, fotoDois) 
VALUES ('$produto', '$valor', '$especificacao', '$altura', '$largura', '$fotoCapa', '$modelo', '$estoque', '$fotoUm', '$fotoDois')";

if (mysqli_query($conexao, $sql)) {
    $_SESSION['sucesso_Cadastro'] = "Produto cadastrado com sucesso";
    header("Location: ../views/inicioAdmin.php");
} else {
    $_SESSION['erro_Cadastro'] = "Erro ao cadastrar produto";
    header("Location: ../views/adicionar_Produto.php");
}

?>
