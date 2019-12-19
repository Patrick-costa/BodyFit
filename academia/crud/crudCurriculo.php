<?php

function getCurriculoNome($nome){

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $nome = filter_input(INPUT_POST, 'nome');

    $link = abreConexao();

    $query = "select arquivo from tb_curriculos where nome = {'$nome'}";

    try{
        
        $rs = mysqli_query($link, $query);
        $listaFale = Array();

        while($linha = mysqli_fetch_assoc($rs)){
            array_push($listaFale, $linha);
        }

        return $listaFale;
    } catch(\Throwable $th) {
        throw new \Exception("Erro ao listar do banco", 1);
        return Array(); // retorna uma estrutura de array vazio
    } finally {
        mysqli_close($link);
    }
}
//---------------------------------------------------------------------------------------------------------------------

function getCurriculoCPF($cpf){
    $link = abreConexao();

    $query = "select arquivo from tb_curriculos where cpf = {'$cpf'}";

    try{
        
        $rs = mysqli_query($link, $query);
        $listaFale = Array();

        while($linha = mysqli_fetch_assoc($rs)){
            array_push($listaFale, $linha);
        }

        return $listaFale;
    } catch(\Throwable $th) {
        throw new \Exception("Erro ao listar do banco", 1);
        return Array(); // retorna uma estrutura de array vazio
    } finally {
        mysqli_close($link);
    }
}

//---------------------------------------------------------------------------------------------------------------------

function getCurriculoEmail($email){
    $link = abreConexao();

    $query = "select arquivo from tb_curriculos where email = {'$email'}";

    try{
        
        $rs = mysqli_query($link, $query);
        $listaFale = Array();

        while($linha = mysqli_fetch_assoc($rs)){
            array_push($listaFale, $linha);
        }

        return $listaFale;
    } catch(\Throwable $th) {
        throw new \Exception("Erro ao listar do banco", 1);
        return Array(); // retorna uma estrutura de array vazio
    } finally {
        mysqli_close($link);
    }
}