<?php
    require('./crudCadastro.php');
    include('enviarusuario.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $usuario = filter_input(INPUT_POST, "name") ?? "";
        $novasenha = filter_input(INPUT_POST, "senha") ?? "";

        if(redefineNovaSenha($novasenha, $usuario)){
            echo " Redefinido com sucesso ";
        } else{
            echo "Falha ao Redefinir";
        } 
    }
