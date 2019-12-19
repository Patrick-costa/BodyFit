<?php session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/main.css">
    <script src="https://kit.fontawesome.com/dd5154e18c.js"></script>
    <link rel="icon" href="./Imagens/haltere.png" type="image/x-icon">
    <title>BodyFit - Sua Sáude Esta Aqui!</title>
    <script src="../academia/js/jquery-3.1.1.min.js"></script>
    <script src="./js/galeria.js"></script>
</head>

<body>

    <?php include 'menu.php' ?>

    <!--Quebra de Linha-->
    <br><br><br><br><br><br>
    <!--Fim da Quebra de Linha-->

    <!--Container Principal-->
    <main class="container-bg">
        <!--Inicio do Formulário de Login-->
       
    
             <div class="container-login">
              <br><br>
              <p style="font-size: 30px !important; color: white !important; text-align: center !important;">Esqueci a Senha
              </p>
              <hr class="blue">
  
              <br><br>
              
              <form id="esqueci" action="email.php" method="POST">

              <center><i id="user" class="fas fa-user"></i>
                  <input type="text" class="input-form" placeholder="Digite seu usuario" name="name">
              
              <br><br><br><br>
              
              <center><button type="submit" form="esqueci" class="input-button" href="">Enviar</button></center>
          </form>
      </div><br><br><br><br>
      <!--Fim do formulário de Login-->'



      <?php include 'rodape.php'; ?>
      
</main>



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