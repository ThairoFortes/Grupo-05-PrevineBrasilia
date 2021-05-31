<?php
session_start();
include_once ("conexao.php");

$cpfpac = filter_input(INPUT_POST, 'cpfpac', FILTER_SANITIZE_NUMBER_INT);
$nomepac = filter_input(INPUT_POST, 'nomepac', FILTER_SANITIZE_SPECIAL_CHARS);
$dtnascpac = filter_input(INPUT_POST, 'dtnascpac', FILTER_SANITIZE_NUMBER_INT);
$cartaosuspac = filter_input(INPUT_POST, 'cartaosuspac', FILTER_SANITIZE_NUMBER_INT);
$generopac = filter_input(INPUT_POST, 'generopac', FILTER_SANITIZE_STRING);
$cor = filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING);
$emailpac = filter_input(INPUT_POST, 'emailpac', FILTER_SANITIZE_EMAIL);
$ceppac = filter_input(INPUT_POST, 'ceppac', FILTER_SANITIZE_NUMBER_INT);
$enderecopac = filter_input(INPUT_POST, 'enderecopac', FILTER_SANITIZE_SPECIAL_CHARS);
$complementopac = filter_input(INPUT_POST, 'complementopac', FILTER_SANITIZE_SPECIAL_CHARS);
$bairropac = filter_input(INPUT_POST, 'bairropac', FILTER_SANITIZE_SPECIAL_CHARS);
$cidadepac = filter_input(INPUT_POST, 'cidadepac', FILTER_SANITIZE_SPECIAL_CHARS);
$ufpac = filter_input(INPUT_POST, 'ufpac', FILTER_SANITIZE_SPECIAL_CHARS);
$telefonepac = filter_input(INPUT_POST, 'telefonepac', FILTER_SANITIZE_NUMBER_INT);
$telefonecompac = filter_input(INPUT_POST, 'telefonecompac', FILTER_SANITIZE_NUMBER_INT);
$celularpac = filter_input(INPUT_POST, 'celularpac', FILTER_SANITIZE_NUMBER_INT);
$possuideppac = filter_input(INPUT_POST, 'possuideppac', FILTER_SANITIZE_STRING);
$quntdep = filter_input(INPUT_POST, 'quntdep', FILTER_SANITIZE_NUMBER_INT);
$senhapac1 = filter_input(INPUT_POST, 'senhapac1', FILTER_SANITIZE_SPECIAL_CHARS);
$diadasemana = filter_input(INPUT_POST, 'diadasemana', FILTER_SANITIZE_STRING);
$periodo = filter_input(INPUT_POST, 'periodo', FILTER_SANITIZE_STRING);
$statususu = filter_input(INPUT_POST, 'statususu', FILTER_SANITIZE_NUMBER_INT);


$result_pessoas =
"UPDATE pessoas SET 
cpf='$cpfpac', nome='$nomepac', DataNascimento='$dtnascpac', email='$emailpac', telefone='$telefonepac', celular='$celularpac', cep='$ceppac', estado='$ufpac', cidade='$cidadepac', bairro='$bairropac', logradouro='$enderecopac', complemento='$complementopac', senha='$senhapac1'
WHERE cpf='$cpfpac'";
$resultado_pessoas = mysqli_query($conn, $result_pessoas);

if(mysqli_affected_rows($conn)){
    $_SESSION["msg"] = "<h1 style='color: green;'>Editado com Sucesso!</h1>";
    header("Location: menu.php");
}else{
    $_SESSION["msg"] = "<h1 style='color: red;'>Não Editado!</h1>";
    header("Location: editar-usuario.php");
}

$result_usuario =
    "UPDATE usuario SET 
pessoas_cpf='$cpfpac', cartaosus='$cartaosuspac', genero='$generopac', cor='$cor', dependentes='$possuideppac', QuantDep='$quntdep', DiaSemana='$diadasemana', periodo='$periodo', StatusUsuarioSUS_idUsu='$statususu'
WHERE pessoas_cpf='$cpfpac'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
    $_SESSION["msg"] = "<h1 style='color: green;'>Editado com Sucesso!</h1>";
    header("Location: menu.php");
}else{
    $_SESSION["msg"] = "<h1 style='color: red;'>Não Editado!</h1>";
    header("Location: editar-usuario.php");
}



