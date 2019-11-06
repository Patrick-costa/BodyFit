<?php session_start();

include './crud/listarLoja.php';
    $msg = false;

    if(isset($_FILES['arquivo'])){

        $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "upload/";

        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

        function insertImagem(){
        $query = "insert into tb_arquivo(arquivo, data) VALUES('$novo_nome', NOW())";
        $link = abreConexao();
        try{
            if(mysqli_query($link,$query)){
            return true;
        } 
      } catch(\Throwable $th) { // entra nesse bloco caso ocorra erro
        throw new \Exception("Erro ao gravar no banco", 1);
        return false;
    } finally { // executa sempre indiferente de funcionar ou ocorrer um erro
        mysqli_close($link);
    }

    insertImagem();
}

    }
    date_default_timezone_set('America/Sao_Paulo');
    
    $data = date('Y-m-d H:i:s');


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
    <script src="../academia/js/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
    <title>BodyFit - Sua Sáude Esta Aqui!</title>

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


    <!--Quebra de Linha-->
    <?php 
        if(empty($_SESSION['usuario'])){
    echo "<br><br><br>";
        }
        ?>
        <br><br><br>
    <!--Fim da Quebra de Linha-->

    <!--Container Principal-->
    <main class="container-bg">
        <!--Inicio do Formulário de Login-->

        <?php
      if(isset($_SESSION['Usuário ou Senha Inválidos'])){
    
          echo "<script>alert('Usuário ou Senha incorretos!');</script>";
          }
          unset($_SESSION['Usuário ou Senha Inválidos']); ?>

        <?php if(empty($_SESSION['usuario'])){
              echo ' <div class="container-login">
              <br><br>
              <p style="font-size: 30px !important; color: white !important; text-align: center !important;">Bem
                  vindo
              </p>
              <hr class="blue">
  
              <br><br>
              
              <form id="login" action="./login/validar_login.php" method="POST">

              <center><i id="user" class="fas fa-user"></i>
                  <input type="text" class="input-form" placeholder="Digite seu usuário" name="usuario">
              </center>
              <br><br>
              <center><i id="pass" class="fas fa-lock"></i>
                  <input type="password" class="input-form" placeholder="Digite sua senha" name="senha">
              </center>
              <br>
              <p> Não é cadastrado ? <a href="cadastro.php"><strong>Cadastre-se</strong></a></p>
              <center><a href="esqueci_senha.php"><strong>Esqueci minha senha</strong></a></center><br>

              <center><button type="submit" form="login" class="input-button" href="">Entrar</button></center>
          </form>
      </div><br><br><br><br>
      <!--Fim do formulário de Login-->'; }?>

        <!--Quebra de linha-->

        <!--Fim-->
        <div class="container-info">
            <div class="container-info-2">

                <br><br><br>


                <div class="row">
                    <div class="col-md-8">
                        <h2>BodyFit</h2>
                        <hr class="blue">
                        <p style="text-align: center;font-size: 23px;margin-top: 5px;">
                            Contribuir o máximo para o saúde e o bem estar de nossos clientes, além de contribuir com
                            o crescimento profissional de quem deseja seguir na área.<br><br>
                            <span style="font-size:18px">Qualidade de vida, saúde, estética, lazer, bem-estar,
                                longevidade são desejos e princípios
                                que guiam a excelência do nosso trabalho. Todas as suas conquistas são nossa motivação,
                                são
                                nossa inspiração.</span>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h4 style="text-align: center"> Regras de Etiqueta</h4>
                        <hr class="blue"><br>
                        <p style="font-size: 16px; text-align: center;">• Compartilhe os aparelhos<br>
                            • Limpe os Aparelhos ao usar
                            <br>• Não use o celular, foque na academia
                            <br>• Seja educado
                            <br>• Use roupas adequadas
                            <br>• Respeite o espaço coletivo</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h5>1° Mês</h5>
                        <p style="font-size: 14px;">1º mês GRÁTIS: Em razão da promoção você não paga a primeira
                            mensalidades do seu plano Unico
                            ou
                            Fisio,. A promoção é válida
                            apenas para
                            novas vendas que fizerem adesão no plano Unico ou Fisio, a partir de 23/10/2019. O
                            preço
                            promocional refere-se apenas à mensalidade e a taxa de adesão, e não inclui a cobrança de
                            manutenção
                            anual, no valor de R$99,90 que será cobrada como informado no contrato. Condição não é
                            válida para
                            pagamentos à vista.</p>
                    </div>

                    <div class="col-md-4">
                        <h5>2° Mês</h5>
                        <p style="font-size: 14px;">2º mês Desconto: Por conta da promoção do 1° Mês gratis, você
                            ganha desconto de 20% a 40% dependendo da sua região, daí em diante, você pode ganhar um
                            desconto
                            anual, em qualquer plano, porém isso depende da disponibilidade da sua região.</p>
                    </div>

                    <div class="col-md-4">
                        <h5>3° Mês</h5>
                        <p style="font-size: 14px;">3° Mês: Do terceiro mês em diante, você passara a pagar a
                            mensalidade com o valor
                            fixado pela unidade, podendo sofrer alterações de acordo com o tempo. Além disso, é
                            permitida a mudança de plano
                            a hora que quiser, podendo até ser ressarcido do valor do plano anterior, pagando o valor a
                            vista do plano que deseja
                            adquirir, aqui a única coisa que você perde é gordura, e oque você ganha vai além de saúde e
                            massa muscular.</p>
                    </div>
                </div>
                <br><br>
            </div>
        </div>

        <!--Container de Localização-->
        <div class="container-location">
            <div class="container-location-two">
                <br>
                <p><i class="fas fa-map-marker-alt"></i> Localização</p>
                <p style="font-size: 10px; position: relative; bottom: 15px;">Clique para ver o endereço</p>
                <ul>
                    <?php foreach(listaLojas() as $loja): ?>
                    <li><a href="" style="font-size: 12px; color: black" data-toggle="modal" data-target="<?=$loja['localizacao']?>">•
                    <?= $loja['localizacao']?></a></li>
                    
                    <?php endforeach; ?>
                  
                </ul>
                <?php if(empty($_SESSION['tipo'])){
                  
                } else if($_SESSION['tipo'] == 'Administrador'){
                    echo "<a style='font-size: 13px; position: relative; bottom: 20px;
                    text-decoration: none;' href='cadastrarLoja.php'>Cadastrar Loja</a>";
                } ?>

            </div>
        </div>
        <!--Fim-->


        <!--Container do Time de Funcionarios-->
        <div class="container-time">
            <div class="box-text">
                <div class="container-text-time" id="time">
                    <br><br>
                    <p style="font-family: 'Abel',sans-serif !important;position: relative; top: 8px;">Nosso
                        Time</span>
                    </p>
                    <hr class="blue"><br>

                    <p style="font-family: 'Abel',sans-serif !important; font-size: 16px;">O Time
                        <strong>BodyFit</strong> é composto
                        por <strong>profissionais qualificados e especializados</strong> que prezam pela
                        <strong>qualidade do trabalho</strong>
                        desenvolvido e, principalmente, pelos objetivos (desejos) dos nossos clientes.
                        <strong>Somos movidos por
                            motivar nossos clientes.</strong><br><br>

                        <strong>Conheça um pouco mais de cada um de nós. Acompanhe-nos em nossas redes
                            sociais.</strong>
                    </p>
                </div><br>
                <center>
                    <div class="row">
                        <div class="col-12 col-md-6 col-sm-12 col-lg-3">
                            <div class="circle-box" style="margin-top: 20px;">
                                <a href=""><img style="position: relative; " src="./Imagens/mulher.png" width="220"></a>
                            </div>
                        </div>



                        <div class="col-12 col-md-6 col-sm-12 col-lg-3">
                            <div class="circle-box" style="margin-top: 20px;">
                                <a href=""><img style="position: relative; left: -40px; " src="./Imagens/raona.png"
                                        width="250"></a>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-sm-12 col-lg-3">
                            <div class="circle-box" style="margin-top: 20px;">
                                <a href=""><img style="position: relative; " src="./Imagens/pablo.png" width="220"></a>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-sm-12 col-lg-3">
                            <div class="circle-box" style="margin-top: 20px;">
                                <a href=""><img style="position: relative; " src="./Imagens/lutador-png-6.png"
                                        width="220"></a>
                            </div>
                        </div>
                    </div>
                </center>
            </div>
            <!--Quebra de Linha-->
            <br><br><br><br><br><br>
            <!--Fim-->
        </div>
        <!--Fim do Container de Funcionarios-->
    </main>

    <!--Fim do Container Principal-->



    <!--Planos da Academia-->
    <center>
        <div class="bg-2">
            <div class="bg2-container" id="planos">
                <br><br><br><br>
                <p style="text-align: center; font-size: 30px; font-weight: 900; color: 1d1d1d;
        opacity: 0.8; text-transform: uppercase; ">Conheça nossos<span style="color: #073d98;"> Planos</span> </p>
                <img src="./Imagens/arrow.png" width="80">
                <br>
                <div class="row">
                    <!--Plano Unico-->
                    <div class="col-12 col-md-6 col-sm-12 col-lg-3">
                        <a class="planos" data-toggle="modal" data-target="#planounico" href="">
                            <div class="container-box">
                                <p style="margin-top: 10px; color: gray"> Plano Unico </p>
                                <img src="./Imagens/unico.png" width="90">
                            </div>
                        </a>
                    </div>
                    <br>

                    <!--Plano Familia-->
                    <div class="col-12 col-md-6 col-sm-12 col-lg-3">
                        <a class="planos" data-toggle="modal" data-target="#planofamilia" href="">
                            <div class="container-box">
                                <p style="margin-top: 10px; color: gray"> Família </p>
                                <img src="./Imagens/familia.png" width="90">
                            </div>
                    </div>

                    <!--Plano Fisio-->
                    <div class="col-12 col-md-6 col-sm-12 col-lg-3">
                        <a class="planos" data-toggle="modal" data-target="#planofisio" href="">
                            <div class="container-box">
                                <p style="margin-top: 10px; color: gray"> Plano Fisio </p>
                                <img src="./Imagens/fisio.png" width="90" style="break-after: auto">
                            </div>
                        </a>
                    </div>

                    <!--Plano Super-->
                    <div class="col-12 col-md-6 col-sm-12 col-lg-3">
                        <a class="planos" data-toggle="modal" data-target="#planosuper" href="">
                            <div class="container-box">
                                <p style="margin-top: 10px; color: gray"> Plano Super </p>
                                <img src="./Imagens/super.png" width="90">
                            </div>
                        </a>

                    </div>

                </div>
                <!--Fim dos Planos-->

                <br>
                <!--Inicio das Redes sociais-->
                <p
                    style="color: gray; font-family: 'Abel',sans-serif !important;text-transform:uppercase; font-size: 13px;">
                    Temos excelentes planos para você, junto com ótimas promoções que irão
                    satisfaze-los, venha fazer parte desta familia, clique em 1 plano acima e veja
                    oque ele te proporciona.</p>
                <br>
            </div>

            <div class="bg3-container">
                <div class="img-page">
                    <img class="logo" src="./Imagens/bodyfit.png">
                </div>
                <p style="font-size: 20px; font-weight: 600;">Faz bem para a sua <span
                        style="color: #073d98 ">saúde</span></p>

                <br>
                <p
                    style="color: gray; font-size: 20px; font-family: 'Abel',sans-serif !important;text-transform:uppercase; font-size: 13px;">
                    Siga-nos em nossas redes sociais e concorra a promoções
                    exclusivas! </p>


                <!--Quebra de linha-->
                <br><br><br>
                <!--Fim-->

            </div>

            <!--Fim da div de planos-->

    </center>

    <!--Inicio das Estruturas-->

    <div class=" container-estrutura" id="estruturas">
        <div class="container-2-estrutura">
            <br>
            <center>
                <div class="product_images"><br>
                    <p
                        style="font-family: 'Abel',sans-serif !important; font-size: 30px; color: white; text-align: center;">
                        Estruturas
                        </span>
                    </p>
                    <hr class="blue"><br>
                    <p style="color: #f4f5f7">A BodyFit tem o prazer de mostrar para nossos futuros clientes
                        nossas
                        excelentes instalações, galeria abaixo:
                    </p>
                    <br>
                    <div class="cover">
                        <img src="./Imagens/c1.jpg">
                    </div>
                    <div class="thumbs">
                        <img class="active" src="./Imagens/c1.jpg" />
                        <img src="./Imagens/c2.jpg" />
                        <img src="./Imagens/c3.jpg" />
                        <img src="./Imagens/c4.jpg" />
                        <img src="./Imagens/c5.jpg" />
                        <img src="./Imagens/c6.jpg" />
                        <img src="./Imagens/c7.jpg" />
                        <img src="./Imagens/c8.jpg" />
                    </div>
                </div>
            </center>
        </div><br><br>
    </div>

    <!--Fim das Estruturas-->

    <!--Container Email-->
    <div class="container-email" id="contato">
        <div class="container-2-email">
            <br><br><br>
            <p style="font-family: 'Abel',sans-serif !important; font-size: 35px; text-align: center;">
                Contato</span>
            </p>
            <hr class="blue">
            <br><br>

            <div class="row">
                <div class="col-md-6">

                    <h4>Fale Conosco</h4>
                    <p>Entre em contato conosco!<br>
                        Envie suas dúvidas e sugestões, será um prazer respondê-las.</p>
                    <p> Todas as mensagens serão respondidas pelo via e-mail, você pode também
                        enviar sua solicitaçao para:&nbsp;
                        <button class="mail"><a
                                href="mailto:faleconosco@bodyfit.com.br">faleconosco@bodyfit.com.br</a></button>
                    </p>
                    <hr>
                    <p style="text-align: center; " id="email-hidden"> E-mail's úteis:<br>
                        <button class="mail" id="email-hidden"><a style="margin-top: 5px;"
                                href="mailto:coordenacao@bodyfit.com.br">coordenacao@bodyfit.com.br</a></button>
                        &nbsp;<button class="mail" id="email-hidden"><a
                                href="mailto:rh@bodyfit.com.br">cliente@bodyfit.com.br</a></button></p>
                    <hr id="email-hidden">
                    <p>Venha trabalhar conosco!<br>
                        Envie seu curriculo para o e-mail do RH: &nbsp;&nbsp;<button class="mail"><a
                                href="mailto:rh@bodyfit.com.br">rh@bodyfit.com.br</a></button></p>
                    </p>
                    <br><br id="espaco-1">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5"><br>
                    <form class="form-email" action="./crud/registrarFale.php" method="POST" id="fale">
                        <select name="tipo" class="input-contato" required>
                            <option>Comentário</option>
                            <option>Reclamação</option>
                            <option>Sugestão</option>
                            <option>Agradecimento</option>
                        </select>
                        <br><br>
                        <input type="text" placeholder="Nome" name="nome" class="input-contato" required>
                        <br><br>
                        <input type="tel" placeholder="Telefone" id="tel" name="tel" class="input-contato" required>
                        <br><br>
                        <input type="text" placeholder="Email" name="email" class="input-contato" required>
                        <br><br>
                        <textarea type="text" name="descricao" placeholder="Mensagem" required></textarea>
                        <input type="hidden" name="data" value="<?=$data?>" class="input-contato">
                        <br><br>
                        <button type="submit" form="fale" class="button-contato" href="">Enviar</button>
                        <br><br><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Fim-->

    <?php include 'rodape.php'; ?>

    <!-- Modal Plano Unico -->
    <div class="modal fade" id="planounico" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Plano Unico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Plano familia -->
    <div class="modal fade" id="planofamilia" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Plano Familia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Plano fisio -->
    <div class="modal fade" id="planofisio" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Plano Fisio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Plano super -->
    <div class="modal fade" id="planosuper" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Plano Super</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Colubandê -->
    <div class="modal fade" id="Colubande" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Colubandê</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Coelho -->
    <div class="modal fade" id="coelho" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Coelho</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Biquinho de Lacre -->
    <div class="modal fade" id="lacre" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Biquinho de Lacre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mutondo -->
    <div class="modal fade" id="mutondo" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Mutondo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Alcantara -->
    <div class="modal fade" id="alcantara" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Alcantara</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Jardim Catarina -->
    <div class="modal fade" id="catarina" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Jardim Catarina</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Icaraí -->
    <div class="modal fade" id="icarai" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Icaraí</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Centro Niteroi -->
    <div class="modal fade" id="niteroi" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Centro Niteroi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Centro São Gonçalo -->
    <div class="modal fade" id="sao" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Centro São Gonçalo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Centro Marica -->
    <div class="modal fade" id="marica" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Centro Maricá</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Centro Itaboraí -->
    <div class="modal fade" id="itaborai" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Itaboraí</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Imagem-->
    <div class="modal fade" id="imagem" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Escolha a imagem</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="arquivo" onchange="previewImagem()" required><br><br><br>
                        <center><img class="perfil"style="width: 350px; height: 350px; border-radius: 8px;"><br><br></center>
                        <input type="submit" value="salvar">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
	var width = screen.width;

    if(width < 992){

            $('#navbar').css({"background-color":"#3e444d00"});
        
    }

</script>
    <script>
        function previewImagem() {
            var imagem = document.querySelector('input[name=arquivo]').files[0];
            var preview = document.querySelector('img.perfil');

            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (imagem) {
                reader.readAsDataURL(imagem);
            } else {
                preview.src = "";
            }
        }
    </script>

<!--Script para Mascara -->
<script>
        $("#tel").mask("(99) 99999-9999");

    </script>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->

    <script src="./js/galeria.js"></script>
    <script src="../academia/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>