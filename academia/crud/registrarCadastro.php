<?php

    require('crudCadastro.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $primeiro_nome = filter_input(INPUT_POST, "p_nome") ?? "";
        $segundo_nome = filter_input(INPUT_POST, "s_nome") ?? "";
        $terceiro_nome = filter_input(INPUT_POST, "t_nome") ?? "";
        $matricula = filter_input(INPUT_POST, "matricula") ?? "";
        $cpf = filter_input(INPUT_POST, "cpf") ?? "";
        $estado_civil = filter_input(INPUT_POST, "e_civil") ?? "";
        $data_cadastro = filter_input(INPUT_POST, "data") ?? "";
        $email = filter_input(INPUT_POST, "email") ?? "";
        $telefone1 = filter_input(INPUT_POST, "t1") ?? "";
        $telefone2 = filter_input(INPUT_POST, "t2") ?? "";
        $rua = filter_input(INPUT_POST, "rua") ?? "";
        $numero = filter_input(INPUT_POST, "num") ?? "";
        $complemento = filter_input(INPUT_POST, "comp") ?? "";
        $cep = filter_input(INPUT_POST, "cep") ?? "";
        $cidade = filter_input(INPUT_POST, "cidade") ?? "";
        $bairro = filter_input(INPUT_POST, "bairro") ?? "";
        $uf = filter_input(INPUT_POST, "estado") ?? "";
        $usuario = filter_input(INPUT_POST, "usuario") ?? "";
        $senha = filter_input(INPUT_POST, "password") ?? "";
        $chave = filter_input(INPUT_POST, "chave") ?? "";
        
   
       
        if(createCadastro($primeiro_nome, $segundo_nome, $terceiro_nome, $matricula, $cpf, $estado_civil, 
        $data_cadastro, $email, $telefone1, $telefone2,
        $rua, $numero, $complemento, $cep, $cidade, $bairro, $uf, $usuario, $senha, $chave)){
            header('location: ../index.php');
        } else{
            echo "falha ao gravar";
        } 
    }

    