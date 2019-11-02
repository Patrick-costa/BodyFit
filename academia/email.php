<?php

include './crud/crudCadastro.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$email = filter_input(INPUT_POST, "esqueciemail") ?? "";
$nome = filter_input(INPUT_POST, "name") ?? ""; 

if(redefineSenha($novasenha, $email)){
    echo " Redefinido com sucesso ";
} else{
    echo " Falha ao redefinir ";
}
}


require_once('./phpmailer/PHPMailerAutoload.php'); //chama a classe de onde você a colocou.

$mail = new PHPMailer(); // instancia a classe PHPMailer

$mail->IsSMTP();
$mail->CharSet ='UTF-8';
//configuração do gmail
$mail->Port = '465'; //porta usada pelo gmail.
$mail->Host = 'smtp.gmail.com'; 
$mail->IsHTML(true); 
$mail->Mailer = 'smtp'; 
$mail->SMTPSecure = 'ssl';

//configuração do usuário do gmail
$mail->SMTPAuth = true; 
$mail->Username = 'patrickcosta470@gmail.com'; // usuario gmail.   
$mail->Password = 'matematica10'; // senha do email.

$mail->SingleTo = true; 


// configuração do email a ver enviado.
$mail->From = "Nova Senha - Academia BodyFit"; 
$mail->FromName = "Patrick"; 

$mail->addAddress($email); // email do destinatario.
$mail->SetFrom('patrickcosta470@gmail.com');
$mail->Subject = "Nova Senha - Academia BodyFit"; 
$mail->Body = '<html>

<head>
    <title>Corpo Email</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
<div style="background-color: #c8cdd7; border-radius: 8px; max-width: 600px; min-height: 650px; margin: 0 auto;" >
        <figure style="text-align: center;">
            <br><img src="./Imagens/bodyfit.png" width="400">
          </figure>
        <div style="background-color: #3e444dbe;; max-width: 500px; min-height: 500px; border-radius: 8px; margin: 0 auto;">
            <br><br><p style="font-family: helvetica, sans-serif; font-size: 30px; text-transform: uppercase; font-weight: 600; margin: 0 auto; text-align: center; color: white; letter-spacing: 0.7;"><br>Olá!</p>
            <p style="font-family: helvetica, sans-serif; font-size: 15px; text-transform: uppercase; font-weight: 600; margin: 0 auto; text-align: center; color: white; letter-spacing: 0.7;">Obrigado por usar os serviços da Academia BodyFit</p>
            <p style="font-family: helvetica, sans-serif; font-size: 15px; text-transform: uppercase; font-weight: 600; margin: 0 auto; text-align: center; color: white; letter-spacing: 0.7;">Vejo que você pediu para redifinir sua senha, caso contrário ignore esse e-mail</p>
            <br><br><br><p style="font-family: helvetica, sans-serif; font-size: 13px; font-weight: 600; margin: 0 auto; text-align: center; color: white; letter-spacing: 0.7;">Seu usuário é: ' .$nome.'</p>
            <br><p style="font-family: helvetica, sans-serif; font-size: 13px; font-weight: 600; margin: 0 auto; text-align: center; color: white; letter-spacing: 0.7;">E sua nova senha é: '.$novasenha.'</p>

            <br><br>
            <br><p style="font-family: helvetica, sans-serif; font-size: 12px; font-weight: 600; margin: 0 auto; text-align: center; color: white; letter-spacing: 0.7;">Sua senha nova já foi criada, caso queira escolher uma da sua preferência
            clique no botão abaixo que você será redirecionado para escolher uma nova senha, mas antes, entre com a senha fornecida por nós.</p>
           <br> <br><a href="../projeto_integrador/redefinirsenha/login2.php" style="text-decoration: none; text-align: center;"><p style=" width: 40%;
            font-size: 18px;
            border-radius: 4px;
            color: #3e444dbe;
            font-family: helvetica;
            text-transform: uppercase;
            font-weight: 800;
            margin: 0 auto;
            height: 30px;
            margin-bottom: 20px;
            cursor: pointer;
            background: white;
            display: block;

            transition: 1s;">Redefinir</p></a>
        </div>
    
    <br><p style="font-family: helvetica, sans-serif; font-size: 12px; font-weight: 600; margin: 0 auto; text-align: center; color: #3e444dbe;; letter-spacing: 0.7;"> ©BodyFit. &nbsp;All Rights Reserved. </p>
 <br><br>
    </div>';
if(!$mail->Send()){
    echo "Erro ao enviar Email:" . $mail->ErrorInfo;
}else{
    header('location: index.php');
}

