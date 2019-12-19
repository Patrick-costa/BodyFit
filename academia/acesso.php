<?php 

include './crud/listarLoja.php';
session_start();

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
            <h2>Definição de Tipo de Usuário</h2>
            <hr class="blue">
            <br><br><br>
            <form id="dtipo" action="./crud/registrarTipo.php" method="POST">
                <div class="col-md-12">
                    <i class="fa fa-user"> </i>
                    <input type="text" class="input-form3" placeholder="Escreva o nome de usuario" name="usuario"
                        required>

                    <select class="input-form3" name="tipo">
                        <option>Cliente</option>
                        <option>Funcionario</option>
                        <option>Administrador</option>
                    </select>
                </div>
                <br><br>
                <div class="col-xs-12 text-right ">
                    <input type="submit" class="button-contato" style="width: 120px;" form="dtipo">
                </div>
            </form>

        </div>
    </div>


    <br><br><br><br>
    <?php include 'rodape.php'; ?>

    <div class="modal fade" id="lojas2" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Lojas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php 
                        foreach(ListaLojas() as $loja): ?>
                    <span style="font-size: 20px; font-weight: 600"><?=$loja['localizacao']?></span><br>
                    Rua: <?=$loja['rua']?><br>
                    N°: <?=$loja['numero']?><br>
                    Cidade: <?=$loja['cidade']?><br>
                    <input type="hidden" id="id" value="<?=$loja['id_loja']?>">
                    <a href="./crud/deleteLoja.php?id=<?= $loja['id_loja'] ?>"
                        onclick="return confirm('Você tem certeza?')">Excluir</a>
                    <hr>
                    <br>
                    <?php endforeach ?>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <?php 
                    
                    if(!empty($_SESSION['usuario'])){
                        if($_SESSION['tipo'] == "Administrador"){
                            echo '<button type="button" class="btn btn-secondary"><a href="cadastrarLoja.php" style="color: white; text-decoration: none;">Cadastrar Loja</a></button>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
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