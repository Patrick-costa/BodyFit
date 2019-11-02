<?php

define("SERVER","localhost");
define("USER","root");
define("PASS","");
define("DB","academia");
define("PORT", 3306);

function abreconexao(){
    $link = mysqli_connect(SERVER, USER ,PASS, DB, PORT);
    mysqli_set_charset($link,'utf8');
    return $link;
}

$con = abreConexao();

if(!$con){
    echo "Erro ao estabelecer uma conexão com o banco de dados <br>";
    echo "Código do erro: ". mysqli_connect_errno(). "<br>";
    echo "Mensagem de erro: " . mysqli_connect_error();
    exit;
}
