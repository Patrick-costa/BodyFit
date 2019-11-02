<?php 
session_start();
include 'conexao.php';


$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);


$query = "select id_login, usuario, tipo from tb_login where usuario = '{$usuario}' and senha = '{$senha}'";

$query2 = "select tipo from tb_login where usuario = '{$usuario}'";

$result = mysqli_query($conexao, $query);

$return = mysqli_query($conexao, $query2);

$row = mysqli_num_rows($result);

$return2 = mysqli_fetch_assoc($return);

echo $row."<br> ";

if($row >= 1){
    $_SESSION['usuario'] = $usuario;
    $_SESSION["tipo"] = $return2['tipo'];
    header('location: ../index.php');
    exit();
} else{
    $_SESSION['Usuário ou Senha Inválidos'] = true;
    header('location: ../index.php');
}