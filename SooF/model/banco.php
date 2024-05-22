<?php
$conexao = mysqli_connect("localhost", "root", "", "bd_soof");


if (!$conexao) {
  
    die("Falha na conexão com o banco: " . mysqli_connect_error());
   
}

?>