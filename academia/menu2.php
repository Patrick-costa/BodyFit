 <!-- Menu -->
 <div class="container-menu" style="width: 100%">
        <div class="menu" style="width: 100%;">
            <nav class="navbar navbar-expand-lg navbar-right " id="navbar">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse " id="navbarTogglerDemo03">
                    <ul class=" navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link disabled" href="index.php">INÍCIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="index.php    #planos">PLANOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="index.php#time">NOSSO TIME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">ATIVIDADES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="index.php#estruturas">ESTRUTURAS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="redirecionarGrade.php">GRADE DE HORÁRIOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="acesso.php">ACESSOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="faleconosco.php">SOLICITAÇÕES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="faleconosco.php">Usuarios</a>
                        </li>

                    </ul>

                        <?php if(empty($_SESSION['usuario'])){
                            echo "";
                        } else{

                            echo "<a style='color: white; text-transform: uppercase; font-size: 12px; letter-spacing: 0.05em'> ".$_SESSION['usuario']."</a>";
                        }?>


                    <?php if(empty($_SESSION['usuario'])){
                        echo "";
                    } else{
                        echo '
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php" style="font-size: 12px; color: white; text-decoration: none;">DESCONECTAR&nbsp;&nbsp;&nbsp;</a>
                    ';
                    }?>

                </div>

            </nav>
        </div>
    </div>
    <!-- Fim do Menu -->