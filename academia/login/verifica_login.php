<?php  

if(!$_SESSION['usuario']){
    header('location: ../cadastro.php');
    exit();
}