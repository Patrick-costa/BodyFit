<?php

require './crudCadastro.php';

if(isset($_SERVER['HTTP_REFERER'])) {
    $id = filter_input(INPUT_GET,'id');
    excluirLoja($id);
    exit;
}

function excluirLoja($id) {
if(deleteLoja($id)) {
header('Location: ../index.php');
} else {
echo "Erro ao excluir";
}
}
