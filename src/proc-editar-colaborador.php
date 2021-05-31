<?php
session_start();
include_once ("conexao.php");

$cpfserv = filter_input(INPUT_POST, 'cpfserv', FILTER_SANITIZE_NUMBER_INT);
$nomeserv = filter_input(INPUT_POST, 'nomeserv', FILTER_SANITIZE_SPECIAL_CHARS);
$dtnascserv = filter_input(INPUT_POST, 'dtnascserv', FILTER_SANITIZE_NUMBER_INT);
$emailserv = filter_input(INPUT_POST, 'emailserv', FILTER_SANITIZE_EMAIL);
$cepserv = filter_input(INPUT_POST, 'cepserv', FILTER_SANITIZE_NUMBER_INT);
$enderecoserv = filter_input(INPUT_POST, 'enderecoserv', FILTER_SANITIZE_SPECIAL_CHARS);
$complementoserv = filter_input(INPUT_POST, 'complementoserv', FILTER_SANITIZE_SPECIAL_CHARS);
$bairroserv = filter_input(INPUT_POST, 'bairroserv', FILTER_SANITIZE_SPECIAL_CHARS);
$cidadeserv = filter_input(INPUT_POST, 'cidadeserv', FILTER_SANITIZE_SPECIAL_CHARS);
$ufserv = filter_input(INPUT_POST, 'ufserv', FILTER_SANITIZE_SPECIAL_CHARS);
$telefoneserv = filter_input(INPUT_POST, 'telefoneserv', FILTER_SANITIZE_NUMBER_INT);
$celularserv = filter_input(INPUT_POST, 'celularserv', FILTER_SANITIZE_NUMBER_INT);

$matriculaserv = filter_input(INPUT_POST, 'matriculaserv', FILTER_SANITIZE_NUMBER_INT);
$funcaoserv = filter_input(INPUT_POST, 'funcaoserv', FILTER_SANITIZE_SPECIAL_CHARS);
$cargorserv = filter_input(INPUT_POST, 'cargorserv', FILTER_SANITIZE_SPECIAL_CHARS);
$areaatuaserv = filter_input(INPUT_POST, 'areaatuaserv', FILTER_SANITIZE_SPECIAL_CHARS);
$senhaserv1 = filter_input(INPUT_POST, 'senhaserv1', FILTER_SANITIZE_SPECIAL_CHARS);
$statususu = filter_input(INPUT_POST, 'statususu', FILTER_SANITIZE_NUMBER_INT);

$result_pessoas =
    "UPDATE pessoas SET 
cpf='$cpfserv', nome='$nomeserv', DataNascimento='$dtnascserv', email='$emailserv', telefone='$telefoneserv', celular='$celularserv', cep='$cepserv', estado='$ufserv', cidade='$cidadeserv', bairro='$bairroserv', logradouro='$enderecoserv', complemento='$complementoserv', senha='$senhaserv1'
WHERE cpf='$cpfserv'";
$resultado_pessoas = mysqli_query($conn, $result_pessoas);

if(mysqli_affected_rows($conn)){
    $_SESSION["msg"] = "<h1 style='color: green;'>Editado com Sucesso!</h1>";
    header("Location: menu.php");
}else{
    $_SESSION["msg"] = "<h1 style='color: red;'>Não Editado!</h1>";
    header("Location: editar-colaborador.php");
}

$result_colaborador =
    "UPDATE colaborador SET 
pessoas_cpf='$cpfserv', matricula='$matriculaserv', funcao='$funcaoserv', cargo='$cargorserv', areaatuacao='$areaatuaserv', StatusColaborador_idCol='$statususu'
WHERE pessoas_cpf='$cpfserv'";
$resultado_colaborador = mysqli_query($conn, $result_colaborador);

if(mysqli_affected_rows($conn)){
    $_SESSION["msg"] = "<h1 style='color: green;'>Editado com Sucesso!</h1>";
    header("Location: menu.php");
}else{
    $_SESSION["msg"] = "<h1 style='color: red;'>Não Editado!</h1>";
    header("Location: editar-colaborador.php");
}



