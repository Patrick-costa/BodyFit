<?php 

session_start();

include './crud/listaFale.php';

if($_SESSION['tipo'] != 'Administrador'){
    header('location: index.php');
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/main.css">
    <script src="../academia/js/fontawesome.js"></script>
    <link rel="icon" href="./Imagens/haltere.png" type="image/x-icon">
    <title>BodyFit - Trabalhe Conosco</title>
    <script src="../academia/js/jquery-3.1.1.min.js"></script>
    <script src="./js/galeria.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
</head>

<body>

    <?php
if(empty($_SESSION['usuario'])){
    include 'menu.php'; 
} else if($_SESSION['tipo'] == 'Administrador'){
    include 'menu2.php';
}
else if($_SESSION['usuario']){
  include 'menu.php';
} ?>

    <br><br><br><br><br>
    <div class="container-info">
        <div class="container-info-3" style="max-width: 60%; margin: 0 auto;">
            <br><br><br>
            <h2>Solicitações de Clientes</h2>
            <hr class="blue">
            <br><br>

            <?php foreach(listaFale() as $fale): ?>
                <div style="max-width: 70%; margin: 0 auto; min-height: 60px; border: 1px solid gray;
                border-radius: 8px; text-align: center; margin-top: 20px;">
                    <br><p>Tipo de Solicitação: <?=$fale['tipo']?></p>
                    <p>Nome: <?=$fale['nome']?></p>
                    <p>Email: <?=$fale['email']?></p>
                    <p>Telefone: <?=$fale['telefone']?></p>
                    <p>Data: <?=$fale['data']?></p>
                    <div style="width: 90%; margin: 0 auto;"><p style="word-wrap: break-word">Mensagem: <?=$fale['descricao']?></p></div>
                </div>
            <?php endforeach; ?>
            <br><br>
        </div>
    </div>


    <br><br><br><br>
    <?php include 'rodape.php'; ?>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->

    <script src="../academia/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>