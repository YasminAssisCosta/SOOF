<?php

require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'banco.php');
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_crip = md5($senha);

$sql = "SELECT * FROM tb_usuario WHERE email = '{$email}'";
$consulta = mysqli_query($conexao, $sql);

if (mysqli_num_rows($consulta) == 1) {
    $dados = mysqli_fetch_assoc($consulta);
    $senha_bd = $dados['senha'];
    $tipo_usuario = $dados['tipo'];

    if ($senha_bd === $senha_crip) {
        $_SESSION['usuario'] = $dados["id_usuario"];
        

        if ($tipo_usuario == 0) {
            $_SESSION['sucesso'] = "Login realizado com sucesso";
            header("Location:../views/main.php");
            exit(); 
        } elseif ($tipo_usuario == 1) {
            $_SESSION['sucesso'] = "Login realizado com sucesso";
            header("Location:../views/inicioAdmin.php");
            exit(); 
        }
    } else {
        $_SESSION['erro'] = "Senha incorreta";
        header("Location:../views/login.php");
        exit(); 
    }
} else {
    $_SESSION['erro'] = "Email não cadastrado";
    header("Location:../views/login.php");
    exit(); 
}
?>
