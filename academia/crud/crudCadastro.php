<?php

    require('conexao.php');
    ## ARQUIVO RESPONSAVEL POR FAZER AS TRANSAÇÕES COM O BANCO DE DADOS ##


# Função responsável por inserir os dados no banco
function createCadastro($primeiro_nome, $segundo_nome, $terceiro_nome, $matricula, $cpf, $estado_civil, 
$data_cadastro, $email, $telefone1, $telefone2,
$rua, $numero, $complemento, $cep, $cidade, $bairro, $uf, $usuario, $senha, $chave) {
    // recebe o retorno da função com a conexão aberta
    $link = abreConexao();

    // variavel responsável por definir a query SQL a ser disparada no banco
    $query = "insert into tb_telefone(telefone_1, telefone_2) values('{$telefone1}', '{$telefone2}')";
    
    $query2 =  "insert into tb_endereco(rua, numero, complemento, cep, cidade, bairro, uf) values('{$rua}',{$numero},'{$complemento}','{$cep}',
    '{$cidade}','{$bairro}','{$uf}')";

    $query3 = "insert into tb_login(usuario, senha) values ('{$usuario}','{$senha}')";

    $query4 = "insert into tb_aluno(primeiro_nome, segundo_nome, terceiro_nome, matricula, cpf, estado_civil, 
    email, data_cadastro, login_id, telefone_id, endereco_id) values ('{$primeiro_nome}','{$segundo_nome}','{$terceiro_nome}',{$matricula},'{$cpf}','{$estado_civil}','{$email}',
    '{$data_cadastro}',{$chave},{$chave},{$chave})";

    echo $query ."<br>";
    echo $query2 ."<br>";
    echo $query3 ."<br>";
    echo $query4 ."<br>";

    try{ // Tenta executar
        if(mysqli_query($link, $query)) {
            
            if(mysqli_query($link, $query2)){
                if(mysqli_query($link, $query3)){
                    if(mysqli_query($link, $query4)){
                        return true;
                    }
                }
            }
        }
    } catch(\Throwable $th) { // entra nesse bloco caso ocorra erro
        throw new \Exception("Erro ao gravar no banco", 1);
        return false;
    } finally { // executa sempre indiferente de funcionar ou ocorrer um erro
        mysqli_close($link);
    }
}

// ----------------------------------------------------------------------------------------------------

// Função responsável por redefinir senha
$novasenha = substr(md5(time()), 0, 6);

function redefineSenha($novasenha, $email) {
    // recebe o retorno da função com a conexão aberta
    $link = abreConexao();

    // variavel responsável por definir a query SQL a ser disparada no banco
    $query = " update tb_login set senha = '{$novasenha}' where usuario = '{$nome}' ";
    echo $query ."<br>";
    try{ // Tenta executar
        if(mysqli_query($link, $query)) {
            return true;
        }
    } catch(\Throwable $th) { // entra nesse bloco caso ocorra erro
        throw new \Exception("Erro ao gravar no banco", 1);
        return false;
    } finally { // executa sempre indiferente de funcionar ou ocorrer um erro
        mysqli_close($link);
    }
}

// ----------------------------------------------------------------------------------------------------------------
// Função responsável por definir uma nova senha

function redefineNovaSenha($novasenha,$email) {
    // recebe o retorno da função com a conexão aberta
    $link = abreConexao();
    
    // variavel responsável por definir a query SQL a ser disparada no banco
    $query = " update tb_login set senha = '{$novasenha}' where usuario = '{$email}' ";
    echo $query ."<br>";
    try{ // Tenta executar
        if(mysqli_query($link, $query)) {
            return true;
        }
    } catch(\Throwable $th) { // entra nesse bloco caso ocorra erro
        throw new \Exception("Erro ao gravar no banco", 1);
        return false;
    } finally { // executa sempre indiferente de funcionar ou ocorrer um erro
        mysqli_close($link);
    }
}

// ---------------------------------------------------------------------------------------------------------------------

// Função para mudar o tipo de acesso de usuario
function tipoUsuario($tipo, $usuario){

    $link = abreConexao();

    $query = "update tb_login set tipo = '{$tipo}' where usuario = '{$usuario}' ";

    echo $query ."<br>";
    try{ // Tenta executar
        if(mysqli_query($link, $query)) {
            return true;
        }
    } catch(\Throwable $th) { // entra nesse bloco caso ocorra erro
        throw new \Exception("Erro ao gravar no banco", 1);
        return false;
    } finally { // executa sempre indiferente de funcionar ou ocorrer um erro
        mysqli_close($link);
    }
}

// --------------------------------------------------------------------------------------------------------------------------

//Função para cadastrar as grades

function cadastraGrade($atividade){

    $link = abreConexao();

    $query = "insert into tb_atividades(nome_atividade) value('{$atividade}')";

    echo $query."<br>";

    try{
        if(mysqli_query($link, $query)){
                return true;
            } 
    } catch(\Throwable $th){
        throw new \Exception("Erro ao gravar no banco", 1);
        return false;
    } finally{
        mysqli_close($link);
    }
}

// ----------------------------------------------------------------------------------------------------------------------------------------

// Função para listar horário

function getHorario(){
    $link = abreConexao();
    $query = "select horario from tb_horarios";

    try{
        $rs = mysqli_query($link, $query);
        $listaHorario = Array();

        while($linha = mysqli_fetch_assoc($rs)){
            array_push($listaHorario,$linha);
        }

        return $listaHorario;

    } catch(\Throwable $th) {
        throw new \Exception("Erro ao listar do banco", 1);
        return Array(); // retorna uma estrutura de array vazio
    } finally {
        mysqli_close($link);
    }
}


// ------------------------------------------------------------------------------------------------------------------

// Função para cadastrar as chaves estrangeiras

function cadastraChave($atividade, $horario){

    $link = abreConexao();

    $query = "(select id_atividade from tb_atividades ORDER BY nome_atividade = '{$atividade}' DESC LIMIT 1)";
    $query2 = "(select id_horario from tb_horarios where horario = '{$horario}')";
    $query3 = "insert into tb_atividades_horarios(horario_id, atividade_id) values ({$query2}, {$query})";

    echo $query3."<br>";

    try{
        if(mysqli_query($link, $query3)){
                return true;
            } 
    } catch(\Throwable $th){
        throw new \Exception("Erro ao gravar no banco", 1);
        return false;
    } finally{
        mysqli_close($link);
    }
}

// Função para listar as atividades

function getGrade(){

    $link = abreConexao();

    $query = "select * from tb_grade_dias";

    try{
        
        $rs = mysqli_query($link, $query);
        $listaGrade = Array();

        while($linha = mysqli_fetch_assoc($rs)){
            array_push($listaGrade, $linha);
        }

        return $listaGrade;
    } catch(\Throwable $th) {
        throw new \Exception("Erro ao listar do banco", 1);
        return Array(); // retorna uma estrutura de array vazio
    } finally {
        mysqli_close($link);
    }
}

// Função para editar a grade

Function updateGrade($id,$segunda, $terca, $quarta, $quinta, $sexta, $sabado){
    $link = abreConexao();

    $query = "update tb_grade_dias set segunda_feira = '{$segunda}', terca_feira = '{$terca}', quarta_feira = '{$quarta}',
    quinta_feira = '{$quinta}', sexta_feira = '{$sexta}', sabado = '{$sabado}' where id = {$id}";

    echo $query."<br>";

    try{
        if(mysqli_query($link, $query)) {
            return true;
        }
    } catch(\Throwable $th) {
        throw new \Exception("Erro ao atualizar no banco", 1);
        return false;
    } finally {
        mysqli_close($link);
    }
 }

 // Função para adicionar curriculos

 function insertCurriculo($nome,$email,$cpf,$rg,$tel1,$tel2,$pergunta,$arquivo,$data){

    $link = abreConexao();

    $query = "insert into tb_curriculos(nome,email,cpf,rg,telefone_1,telefone_2,pergunta,arquivo,data) values('{$nome}','{$email}','{$cpf}','{$rg}','{$tel1}','{$tel2}','{$pergunta}',
    '{$arquivo}','{$data}')";

    echo $query."<br>";

    try{
        if(mysqli_query($link,$query)){
            return true;
        }
    } catch(\Throwable $th){
        throw new \Exception("Erro ao atualizar o banco",1);
        return false;
    } finally{
        mysqli_close($link);
    }
 }