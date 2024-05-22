<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_crip = md5($senha);

$sql_verificar_email = "SELECT * FROM tb_usuario WHERE email = '$email'";
$resultado = mysqli_query($conexao, $sql_verificar_email);

if (mysqli_num_rows($resultado) > 0) {
    $_SESSION['erro_CU'] = "Este e-mail já está cadastrado.";
    header("Location:../views/cadastro.php");
    exit(); 
}

$sql = "INSERT INTO tb_usuario(nome, email, senha) VALUES ('$nome', '$email', '$senha_crip')";

if (mysqli_query($conexao, $sql)) {
    
    header("Location:../views/login.php");
    exit(); 
} else {
    $_SESSION['erro_CU'] = "Erro ao cadastrar usuário. Por favor, tente novamente mais tarde.";
    header("Location:../views/cadastro.php");
    exit(); 
}

?>
