<?php session_start();
    include './crud/listaUser.php';

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
            <br>
            <p style="text-align: center;font-size: 17px;">
                Veja abaixo as nossas aulas semanais.<br>
                OBS: Grade passiva de alteração.<p><br>
                    <center>
                        <table class="table table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Usuário</th>
                                    <th>Tipo</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach (getUser() as $user): ?>
                                <tr>
                                    <td scope="row">
                                        <?= $user['usuario']?>
                                    </td>
                                    <td scope="row">
                                        <?= $user['tipo']?>
                                    </td>
                                    <td scope="row"><a href="" data-toggle="modal" data-target="#editUser" data-user_id="<?= $user['id_login'] ?>"
                                            data-user_usuario="<?= $user['usuario'] ?>" data-user-tipo="<?= $user['tipo'] ?>"
                                            style="color: gray;"><i id="edit" class="fas fa-edit"></i></a></td>
                                            <td><i id="del" style="cursor: pointer;" class="fas fa-times"></i></td>
                                </tr>

                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </center>
                    <br><br><br>
        </div>
    </div>
    <br><br><br><br><br>
    <?php include 'rodape.php'; ?>

    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="cursoModalLabel">
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
                            <form id="edit_form" action="./crud/updateUser.php" method="POST">
                                <div class="form-group">
                                    <label for="id_" class="sr-only">ID</label>
                                    <input type="hidden" id="txtID" name="txtID" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="idnome">Usuario</label>
                                    <input type="text" id="txtHorario" name="usuario" placeholder="Informe o nome"
                                        class="form-control">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="idnome">Tipo</label>
                                    <select type="text" id="txtSegunda" name="tipo" placeholder="Informe o nome"
                                        class="form-control">
                                        <option></option>
                                        <option>Cliente</option>
                                        <option>Administrador</option>
                                        <option>Funcionario</option>
    </select>
                                </div>
                                <br>
                                
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <script>
        // criação das variaveis
        var user_id = '';
        var user_usuario = '';
        var user_tipo = '';


        jQuery('body').on('click', '[data-toggle="modal"]', function () {
            // Resgata os valores guardados em data-curso_id e data-curso_name
            user_id = $(this).attr('data-user_id');
            user_usuario = $(this).attr('data-user_usuario');
            user_tipo = $(this).attr('data-user_usuario');
            // Atribui os valores as campos do formulario do modal
            $("#txtID").attr({ 'value': user_id });
            $("#txtHorario").attr({ 'value': user_usuario });
            $("#txtSegunda").attr({ 'value': user_tipo });
        });


    </script>

</body>

</html>