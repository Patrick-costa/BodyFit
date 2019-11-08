<?php

require 'crudCadastro.php';

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $id = filter_input(INPUT_POST, "txtID") ?? "";
    $tipo = filter_input(INPUT_POST, "tipo") ?? "";
    $usuario = filter_input(INPUT_POST, "usuario") ?? "";

    atualizaUser($id, $usuario, $tipo);

    
}
        function atualizaUser($id, $usuario, $tipo){
    
            if(updateUser($id, $usuario, $tipo)){
                echo "Gravado com sucesso";
            } else{
                echo "Falha ao gravar";
            }
        }