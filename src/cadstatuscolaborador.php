<?php
session_start();
include_once ("conexao.php");

$codstatcol = filter_input(INPUT_POST, 'codstatcol', FILTER_SANITIZE_NUMBER_INT);
$statcol = filter_input(INPUT_POST, 'statcol', FILTER_SANITIZE_SPECIAL_CHARS);

$result_statuscolaborador = "INSERT INTO statuscolaborador (idCol, StatusColaborador)
VALUES ('$codstatcol','$statcol')";
$res = $conn -> query($result_statuscolaborador);
if($res == true){
    $_SESSION["msg"] = "<h1 style='color: green;'>Status Cadastrado com Sucesso!</h1>";
    header("Location: statuscolaboradores.php");
}else{
    $_SESSION["msg"] = "<h1 style='color: red;'>Status Não foi Cadastrado!</h1>";
    header("Location: statuscolaboradores.php");
}
?>