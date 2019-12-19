<?php date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d H:i:s');
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

    <?php include 'menu.php' ?>

    <br><br><br><br><br>
    <div class="container-info">
        <div class="container-info-2">

            <br><br><br>


            <div class="row">
                <div class="col-md-12">
                    <h2>Trabalhe Conosco</h2>
                    <hr class="blue">

                    <h3 style="color: #212529; font-size: 22px;">Envie seu curriculo</h3>
                    <hr><br>
                    <p>Estamos dispostos a te conhecer! Gostaríamos de receber o seu currículo, para ser analisado assim
                        que iniciarmos um novo processo seletivo. Nosso banco de talentos é diversificado e procura
                        pessoas engajadas e que possuam essas sete qualidades acima! Se você quer fazer parte da nossa
                        equipe e almeja crescer com o fruto do seu trabalho, nós ficaremos felizes em receber você.
                        Preencha todos os campos abaixo e boa sorte!</p><br><br>

                    <form action="upload.php" method="POST" id="curriculo" enctype="multipart/form-data">
                    <input type="hidden" name="data" value='<?=$data?>'>
                        <div class="col-xs-12">
                            <legend> Informações Pessoais </legend>
                            <i class="fa fa-user"> </i>
                            <input type="text" class="input-form3" placeholder="Escreva seu nome completo" name = "nome">
                        </div>
                        <div class="col-xs-12">
                            <i class="fa fa-envelope"> </i>
                            <input type="text" class="input-form3" placeholder=" Escreva seu e-mail" name = "email">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <i class="fa fa-address-card-o"></i>
                                <input type="text" class="input-form3" id="cpf"placeholder="Escreva seu CPF" name="cpf">
                            </div>
                            <div class="col-md-6">
                                <i class="fa fa-address-card-o"></i>
                                <input type="text" class="input-form3" id="rg" placeholder="Escreva seu RG" name="rg">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <i class="fa fa-phone-alt"></i>
                                <input type="text" id="t1" class="input-form3" placeholder="Escreva seu número de telefone Fixo" name="tel1">
                            </div>
                            <div class="col-md-6">
                                <i class="fa fa-mobile-alt" style="font-size: 25px;"></i>
                                <input type="text" id="t2" class="input-form3" placeholder="Escreva seu número de celular" name="tel2">
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <i class="fa fa-user"> </i>
                            <select type="text" class="input-form3" placeholder="Escolha a vaga de interesse" name = "vaga">
                            <option></option>
                            <option>Limpeza</option>
                            <option>Professor de Musculacao</option>
                            <option>Professor de Dança</option>
                            <option>Professor de Luta</option>
                            <option>Informatica</option>
                            <option>Manutencao</option>
                            <option>Recepcao</option>
                            <option>Atendimento ao Cliente</option>
                            <option>Vendedor</option>
                            <option>Outras</option>
                            </select>
                        </div>

                        <br><br>
                        <div class="col-xs-12">
                            <h5 style="position: relative; top: 30px;"> Porque você quer trabalhar conosco? </h5><br>
                            <i class="fa fa-comment" id="msg" style="height: 180px;"></i>
                            <textarea cols="40" rows="10" class="input-form3" style="height: 180px;"
                                aria-required="true" aria-invalid="false" placeholder="Sua Resposta" name="pergunta"></textarea>
                        </div>
                        <br>
                        <div class="col-xs-12">
                            <h5 style="position: relative; top: 30px;"> Envie seu Curriculo</h5><br><br>
                            <h6>Seu curriculo deve estar em formato PDF ou Word(.doc) e conter o tamanho de até 2MB</h6>
                        </div>
                        <br>
                        <input type="file" name="arquivo" required accept="application/pdf">
                        <br><br><br>
                        <div class="col-xs-12 text-right ">
                            <input type="submit" class="button-contato" style="width: 120px;" form="curriculo">
                        </div>
                        <br><br>
                    </form>
                </div>
            </div>
            <br><br>
        </div>
    </div>

    <br><br><br><br>

<?php include 'rodape.php'; ?>

    <script>
        $('#cpf').mask('000.000.000-00');
        $("#rg").mask("00.000.000-0");
        $("#t1").mask("(99) 9999-9999");
        $("#t2").mask("(99) 99999-9999");
    </script>


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