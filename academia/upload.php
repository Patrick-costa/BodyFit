<?php include './crud/crudCadastro.php' ;


if($_SERVER['REQUEST_METHOD'] === "POST"){
    $nome = filter_input(INPUT_POST, "nome") ?? "";
    $email = filter_input(INPUT_POST, "email") ?? "";
    $data = filter_input(INPUT_POST, "data") ?? "";
    $cpf = filter_input(INPUT_POST, "cpf") ?? "";
    $rg = filter_input(INPUT_POST, "rg") ?? "";
    $tel1 = filter_input(INPUT_POST, "tel1") ?? "";
    $tel2 = filter_input(INPUT_POST, "tel2") ?? "";
    $vaga = filter_input(INPUT_POST, "vaga") ?? "";
    $pergunta = filter_input(INPUT_POST, "pergunta") ?? "";
    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    $arquivo = substr(md5(time()), 0, 6). $extensao;
    $diretorio = "uploadCurriculo/";

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$arquivo);

    
    if(insertCurriculo($nome,$email,$cpf,$rg,$tel1,$tel2,$vaga,$pergunta,$arquivo,$data)){
        header('location: index.php');
    } else{
        echo "Falha ao gravar";
    }
}


?>

