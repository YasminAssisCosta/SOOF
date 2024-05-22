<?php
require_once('..' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'banco.php');
session_start();

if(isset($_GET['produto'])) {
    $id_produto = $_GET['produto'];

    
    $sql = "SELECT * FROM tb_produto WHERE id_produto = $id_produto";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
       
        $sql_delete = "DELETE FROM tb_produto WHERE id_produto = $id_produto";

        if ($conexao->query($sql_delete) === TRUE) {
           
            header("Location: ../views/inicioAdmin.php");
        } else {
            echo "Erro ao excluir o produto: " . $conexao->error;
        }
    } else {
        echo "O produto com ID $id_produto não foi encontrado.";
    }

    $conexao->close();
} else {
    echo "ID do produto não especificado.";
}
?>
