<?php
    session_start();
    include_once ("conexao.php");

$codusu = filter_input(INPUT_POST, 'codusu', FILTER_SANITIZE_NUMBER_INT);
$statusu = filter_input(INPUT_POST, 'statusu', FILTER_SANITIZE_SPECIAL_CHARS);

$result_statususuariosus = "INSERT INTO statususuariosus (idUsu, StatusUsuario)
VALUES ('$codusu','$statusu')";
$res = $conn -> query($result_statususuariosus);
if($res == true){
    $_SESSION["msg"] = "<h1 style='color: green;'>Status Cadastrado com Sucesso!</h1>";
    header("Location: statususuariosus.php");
}else{
    $_SESSION["msg"] = "<h1 style='color: red;'>Status Não foi Cadastrado!</h1>";
    header("Location: statususuariosus.php");
}
?>