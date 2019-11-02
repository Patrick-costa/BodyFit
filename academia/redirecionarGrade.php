<?php

session_start();

if($_SESSION['tipo'] == 'Administrador'){
    header('location: editarGrade.php');
} else{
    header('location: verGrade.php');
}