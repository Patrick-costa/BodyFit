<?php 

session_start();

if($_SESSION['tipo'] != 'Administrador'){
    header('location: index.php');
}

$chave = "(select id_endereco from tb_endereco order by id_endereco DESC LIMIT 1)"
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
            <h2>Cadastro de Lojas</h2>
            <hr class="blue">
            <br><br><br>
            <form id="dtipo" action="./crud/registrarLoja.php" method="POST">
                <div class="row">
                        <input type="hidden" class="input-form3" placeholder="Escreva a localização da loja"
                            >

                    <div class="col-md-12">
                        <i class="fa fa-user"> </i>
                        <input type="text" id="cnpj" class="input-form3" placeholder="Escreva o CNPJ" name="cnpj" required>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-address-card"> </i>
                        <input type="text" class="input-form3" id="cep" placeholder="Escreva o CEP" name="cep" required>
                    </div>
                    <div class="col-md-7">
                        <i class="fa fa-address-card"></i>
                        <input type="text" id="rua" class="input-form3" placeholder="Escreva o nome da sua rua"
                            name="end" required>
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-address-card"> </i>
                        <input type="text" class="input-form3" placeholder="N°" name="num" required>
                    </div>
                    <div class="col-md-12">
                        <i class="fa fa-address-card"> </i>
                        <input type="text" class="input-form3" placeholder="Escreva o complemento" name="comp">
                    </div>
                    <div class="col-md-5">
                        <i class="fa fa-address-card"> </i>
                        <input type="text" id="cidade" class="input-form3" placeholder="Escreva a cidade" name="cidade"
                            required>
                    </div>
                    <div class="col-md-5">
                        <i class="fa fa-address-card"> </i>
                        <input type="text" id="bairro" class="input-form3" placeholder="Escreva o bairro" name="bairro"
                            required>
                    </div>
                    <div class="col-md-2">
                        <i class="fa fa-address-card"> </i>
                        <select class="input-form3" id="uf" placeholder="UF" name="estado" required>
                            <option>AC</option>
                            <option>AL</option>
                            <option>AP</option>
                            <option>AM</option>
                            <option>BA</option>
                            <option>CE</option>
                            <option>DF</option>
                            <option>ES</option>
                            <option>GO</option>
                            <option>MA</option>
                            <option>MT</option>
                            <option>MS</option>
                            <option>MG</option>
                            <option>PA</option>
                            <option>PB</option>
                            <option>PR</option>
                            <option>PE</option>
                            <option>PI</option>
                            <option>RJ</option>
                            <option>RN</option>
                            <option>RS</option>
                            <option>RO</option>
                            <option>RR</option>
                            <option>SC</option>
                            <option>SP</option>
                            <option>SE</option>
                            <option>TO</option>
                            <option>EX</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" class="input-form3" placeholder="Escreva a localização da loja" name="chave" value="<?=$chave?>"
                    required>
                <br><br>
                <div class="col-xs-12 text-right ">
                    <input type="submit" class="button-contato" style="width: 120px;" form="dtipo">
                </div>
            </form>

        </div>
    </div>


    <br><br><br><br>
    <?php include 'rodape.php'; ?>

    <!--Script para Mascara -->
    <script>
        $('#cpf').mask('000.000.000-00');
        $("#t1").mask("(99) 9999-9999");
        $("#t2").mask("(99) 99999-9999");
        $("#cep").mask("00000-000");
        $('#cnpj').mask('00.000.000/0000-00');
    </script>

    <!--Script para auto preenchimento de endereço a partir do CEP -->
    <script type="text/javascript">

        $(document).ready(function () {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function () {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

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