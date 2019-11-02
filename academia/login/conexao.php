<?php

define("SERVER","localhost");
define("USER","root");
define("PASS","");
define("DB","academia");
define("PORT", 3306);


$conexao = mysqli_connect(SERVER, USER ,PASS, DB, PORT);