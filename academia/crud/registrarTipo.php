<?php

    require('crudCadastro.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $tipo = filter_input(INPUT_POST, "tipo") ?? "";
        $usuario = filter_input(INPUT_POST, "usuario") ?? "";

        if(tipoUsuario($tipo, $usuario)){
            echo "Alterado com sucesso";
        } else{
            echo " Falha ao alterar ";
        }
    }