<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "previnebsb_b";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(!$conn){
    die("Falha na Conexão: " . mysqli_connect_error());
}else{
    //echo "Conexão Realizada com Sucesso!";
}