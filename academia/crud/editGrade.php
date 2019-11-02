<?php

require 'crudCadastro.php';

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $id = filter_input(INPUT_POST, 'txtID') ?? "";
    $segunda = filter_input(INPUT_POST, 'txtSegunda') ?? "";
    $terca = filter_input(INPUT_POST, 'txtTerca') ?? "";
    $quarta = filter_input(INPUT_POST, 'txtQuarta') ?? "";
    $quinta = filter_input(INPUT_POST, 'txtQuinta') ?? "";
    $sexta = filter_input(INPUT_POST, 'txtSexta') ?? "";
    $sabado = filter_input(INPUT_POST, 'txtSabado') ?? "";

    atualizaGrade($id,$segunda, $terca, $quarta, $quinta, $sexta, $sabado);
}

function atualizaGrade($id,$segunda, $terca, $quarta, $quinta, $sexta, $sabado){
    if(updateGrade($id,$segunda, $terca, $quarta, $quinta, $sexta, $sabado)){
        header('location: ../redirecionarGrade.php');
    } else{
        echo " Falha ao alterar";
    }
}