<?php

require 'crudCadastro.php';

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $localizacao = filter_input(INPUT_POST, "bairro") ?? "";
    $cnpj = filter_input(INPUT_POST, "cnpj") ?? "";
    $endereco_id = filter_input(INPUT_POST, "chave") ?? "";
    $rua = filter_input(INPUT_POST, "end") ?? "";
    $numero = filter_input(INPUT_POST, "num") ?? "";
    $complemento = filter_input(INPUT_POST, "comp") ?? "";
    $cep = filter_input(INPUT_POST, "cep") ?? "";
    $cidade = filter_input(INPUT_POST, "cidade") ?? "";
    $bairro = filter_input(INPUT_POST, "bairro") ?? "";
    $uf = filter_input(INPUT_POST, "estado") ?? "";

    if(createLoja($localizacao, $cnpj, $rua, $numero, $complemento, $cep, $cidade, $bairro, $uf)){
        echo " Loja Cadastrada com sucesso ";
        header('location: ../index.php');
    } else{
        echo " Erro ao gravar loja ";
    }

}