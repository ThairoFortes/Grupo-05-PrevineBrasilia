<?php
session_start();
include_once ("conexao.php");

$id_usuarios = filter_input(INPUT_POST, 'id_usuarios', FILTER_SANITIZE_NUMBER_INT);
$cpfserv = filter_input(INPUT_POST, 'cpfserv', FILTER_SANITIZE_SPECIAL_CHARS);
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

$result_usuarios = "INSERT INTO usuarios (cpf, nome, DataNascimento, email, cep, logradouro, complemento, bairro, cidade, estado, telefone, celular, senha)
VALUES ('$cpfserv', '$nomeserv', '$dtnascserv', '$emailserv', '$cepserv', '$enderecoserv', '$complementoserv', '$bairroserv', '$cidadeserv', '$ufserv',  '$telefoneserv', '$celularserv', '$senhaserv1')";

$res = $conn -> query($result_usuarios);

$id_usuarios = $conn->insert_id;

$result_colaborador = "INSERT INTO colaborador (usuarios_id_usuarios, matricula, funcao, cargo, areaatuacao, StatusColaborador_idCol)
VALUES($id_usuarios, '$matriculaserv', '$funcaoserv', '$cargorserv', '$areaatuaserv', '1')";

$resultado_colaborador = $conn -> query($result_colaborador);

/*var_dump($result_usuarios);
var_dump($result_colaborador);
die();*/


if(($res==true)and($resultado_colaborador==true)){
		$_SESSION["msg"] = "<h1 style='color: green;'>Cadastrado com Sucesso!</h1>";
	    header("Location: menu.php");
	}else{
		$_SESSION["msg"] = "<h1 style='color: red;'>Não foi Cadastrado!</h1>";
	    header("Location: cadagentegestor.php");
	}