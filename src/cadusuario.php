<?php
session_start();
include_once ("conexao.php");

$id_usuarios = filter_input(INPUT_POST, 'id_usuarios', FILTER_SANITIZE_NUMBER_INT);
$cpfpac = filter_input(INPUT_POST, 'cpfpac', FILTER_SANITIZE_SPECIAL_CHARS);
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

$result_usuarios = "INSERT INTO usuarios (cpf, nome, DataNascimento, email, cep, logradouro, complemento, bairro, cidade, estado, telefone, celular, senha)
VALUES ('$cpfpac', '$nomepac', '$dtnascpac', '$emailpac', '$ceppac', '$enderecopac', '$complementopac', '$bairropac', '$cidadepac', '$ufpac',  '$telefonepac', '$celularpac', '$senhapac1')";

$res = $conn -> query($result_usuarios);

$id_usuarios = $conn->insert_id;

$result_paciente = "INSERT INTO paciente (usuarios_id_usuarios, CartaoSUS, genero, cor, dependentes, QuantDep, DiaSemana, periodo, StatusUsuarioSUS_idUsu) 
VALUES($id_usuarios,'$cartaosuspac','$generopac','$cor','$possuideppac','$quntdep', '$diadasemana', '$periodo', '1')";

$resultado_paciente = $conn -> query($result_paciente);

/*var_dump($result_usuarios);
var_dump($result_paciente);
die();*/

	if(($res==true)and($resultado_paciente==true)){
		$_SESSION["msg"] = "<h1 style='color: green;'>Cadastrado com Sucesso!</h1>";
	    header("Location: menu.php");
	}else{
		$_SESSION["msg"] = "<h1 style='color: red;'>Não foi Cadastrado!</h1>";
	    header("Location: cadusuariosus.php");
	}




