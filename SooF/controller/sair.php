<?php
session_start(); 


if(isset($_SESSION['usuario'])) {
    
    session_unset();
    session_destroy();
    header("Location: ../views/main.php"); 
    exit(); 
} else {
    
     header("Location: ../views/main.php");
    exit();
}
?>