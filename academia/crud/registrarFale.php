<?php

require 'crudCadastro.php';

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $descricao = filter_input(INPUT_POST, 'descricao');
    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email');
    $data = filter_input(INPUT_POST, 'data');
    $telefone = filter_input(INPUT_POST, 'tel');
    $tipo = filter_input(INPUT_POST, 'tipo');
    
    
    if(createFale($descricao, $nome, $email, $data, $telefone, $tipo)){
        echo "Cadastrado com sucesso";
    } else{
        echo "falha ao gravar";
    }
}