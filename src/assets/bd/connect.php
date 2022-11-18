<?php
/* O programa irá realizar a conexão entre PHP e MySQL sempre que o require("connect.php") for usado nas outras páginas. */
$conexao = mysqli_connect ("localhost","root","");

if(mysqli_connect_errno())
{
    echo "falha ao conectar: ". mysqli_connect_error(); die();
}

mysqli_select_db($conexao,"pai_e_filhos");
?>