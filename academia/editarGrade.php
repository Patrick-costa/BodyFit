<?php session_start();
    include './crud/listarGrade.php';

    if($_SESSION['tipo'] != 'Administrador'){
        header('location: verGrade.php');
    }
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
                                    <th colspan="2">Editar</th> 
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
                                    <td scope="row"><a href="" data-toggle="modal" data-target="#atividade"
                                            data-grade_id="<?= $grade['id'] ?>"
                                            data-grade_horario="<?= $grade['horario'] ?>"
                                            data-grade_segunda="<?= $grade['segunda_feira'] ?>"
                                            data-grade_terca="<?= $grade['terca_feira'] ?>"
                                            data-grade_quarta="<?= $grade['quarta_feira'] ?>"
                                            data-grade_quinta="<?= $grade['quinta_feira'] ?>"
                                            data-grade_sexta="<?= $grade['sexta_feira'] ?>"
                                            data-grade_sabado="<?= $grade['sabado'] ?>" style="color: gray;"><i id="edit" class="fas fa-edit"></i></a></td>
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

    <div class="modal fade" id="atividade" tabindex="-1" role="dialog" aria-labelledby="cursoModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Editar Grade</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-3">
                        <fieldset>
                            <form id="edit_form" action="./crud/editGrade.php" method="post">
                                <div class="form-group">
                                    <label for="id_" class="sr-only">ID</label>
                                    <input type="hidden" id="txtID" name="txtID" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="idnome">Horario</label>
                                    <input type="text" id="txtHorario" name="txtHorario" placeholder="Informe o nome"
                                        class="form-control" readonly="readonly">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="idnome">Segunda-Feira</label>
                                    <input type="text" id="txtSegunda" name="txtSegunda" placeholder="Informe o nome"
                                        class="form-control">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="idnome">Terça-Feira</label>
                                    <input type="text" id="txtTerca" name="txtTerca" placeholder="Informe o nome"
                                        class="form-control" >
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="idnome">Quarta-Feira</label>
                                    <input type="text" id="txtQuarta" name="txtQuarta" placeholder="Informe o nome"
                                        class="form-control" >
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="idnome">Quinta-Feira</label>
                                    <input type="text" id="txtQuinta" name="txtQuinta" placeholder="Informe o nome"
                                        class="form-control" >
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="idnome">Sexta-Feira</label>
                                    <input type="text" id="txtSexta" name="txtSexta" placeholder="Informe o nome"
                                        class="form-control" >
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="idnome">Sabado</label>
                                    <input type="text" id="txtSabado" name="txtSabado" placeholder="Informe o nome"
                                        class="form-control" >
                                </div>
                                <br>
                            </form>
                        </fieldset>
                    </div>
                </div>
                <div class="modal-footer clearfix">
                    <button type="submit" form="edit_form" class="pull-left btn btn-default">Editar</button>
                    <button type="button" class="pull-right btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->

    <script src="./js/jquery-3.1.1.min.js"></script>
    <script src="./js/galeria.js"></script>
    <script src="../academia/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script>
        // criação das variaveis
        var grade_id = '';
        var grade_horario = '';
        var grade_segunda = '';
        var grade_terca = '';
        var grade_quarta = '';
        var grade_quinta = '';
        var grade_sexta = '';
        var grade_sabado = '';


        jQuery('body').on('click', '[data-toggle="modal"]', function () {
            // Resgata os valores guardados em data-curso_id e data-curso_name
            grade_id = $(this).attr('data-grade_id');
            grade_horario = $(this).attr('data-grade_horario');
            grade_segunda = $(this).attr('data-grade_segunda');
            grade_terca = $(this).attr('data-grade_terca');
            grade_quarta = $(this).attr('data-grade_quarta');
            grade_quinta = $(this).attr('data-grade_quinta');
            grade_sexta = $(this).attr('data-grade_sexta');
            grade_sabado = $(this).attr('data-grade_sabado');
            // Atribui os valores as campos do formulario do modal
            $("#txtID").attr({ 'value': grade_id });
            $("#txtHorario").attr({ 'value': grade_horario });
            $("#txtSegunda").attr({ 'value': grade_segunda });
            $("#txtTerca").attr({ 'value': grade_terca });
            $("#txtQuarta").attr({ 'value': grade_quarta });
            $("#txtQuinta").attr({ 'value': grade_quinta });
            $("#txtSexta").attr({ 'value': grade_sexta });
            $("#txtSabado").attr({ 'value': grade_sabado });
        });


    </script>
</body>

</html>