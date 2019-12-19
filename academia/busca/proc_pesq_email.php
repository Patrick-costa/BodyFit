<?php
//Incluir a conexão com banco de dados
include_once 'conexao.php';

$email = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$result_user = "SELECT * FROM tb_curriculos WHERE email LIKE '%$email%' LIMIT 20";
$resultado_user = mysqli_query($conn, $result_user);

if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
	while($row_user = mysqli_fetch_assoc($resultado_user)): ?>

    <li><a href="uploadCurriculo/<?= $row_user['arquivo']?>" style='color: black; font-size: 14px;' download><img src="Imagens/pdf.png" width="50"><?=$row_user['arquivo']?>
    </a> </li><br>

    <?php endwhile;
	
    }else{
	echo "Nenhum curriculo encontrado ...";
}

?>