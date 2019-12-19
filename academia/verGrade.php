<?php session_start();
    include './crud/listarGrade.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/main.css">

    <script src="./js/fontawesome.js"></script>
    <link rel="icon" href="./Imagens/haltere.png" type="image/x-icon">
    <title>BodyFit - Sua Sáude Esta Aqui!</title>


</head>

<body>
    <?php
        if(empty($_SESSION['usuario'])){
            include 'menu.php'; 
        } else if($_SESSION['tipo'] == 'Administrador'){
            include 'menu2.php';
        } else if($_SESSION['usuario']){
            include 'menu.php';
        } ?>
    <br><br><br><br><br>
    <div class="container-info">
        <div class="container-info-2" style="max-width: 100%;">
            <br><br><br>
            <h2>Grade de Horarios</h2>
            <hr class="blue">
            <br><p style="text-align: center;font-size: 17px;">
                Veja abaixo as nossas aulas semanais.<br>
                OBS: Grade passiva de alteração.<p><br>
                    <center>
                        <table class="table table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Horário</th>
                                    <th>Segunda-Feira</th>
                                    <th>Terça-Feira</th>
                                    <th>Quarta-Feira</th>
                                    <th>Quinta-Feira</th>
                                    <th>Sexta-Feira</th>
                                    <th>Sábado</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach (listaGrade() as $grade): ?>
                                <tr>
                                    <td scope="row"><?= $grade['horario']?></td>
                                    <td scope="row"><?= $grade['segunda_feira']?></td>
                                    <td scope="row"><?= $grade['terca_feira']?></td>
                                    <td scope="row"><?= $grade['quarta_feira']?></td>
                                    <td scope="row"><?= $grade['quinta_feira']?></td>
                                    <td scope="row"><?= $grade['sexta_feira']?></td>
                                    <td scope="row"><?= $grade['sabado']?></td>
                                </tr>

                                <?php endforeach; ?>
                                <tr>

                                </tr>

                            </tbody>
                        </table>
                    </center>
                    <br><br><br>
        </div>
    </div>
    <br><br><br><br><br>
    <?php include 'rodape.php'; ?>

<!-- Modal lOJAS -->
<div class="modal fade" id="lojas" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
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

    <script src="./js/jquery-3.1.1.min.js"></script>
    <script src="../academia/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>