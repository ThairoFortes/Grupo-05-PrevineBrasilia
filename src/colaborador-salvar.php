<?php

switch ($_REQUEST["acao"]) {
	case 'cadastrar':
	$cpf 			= $_POST["cpf_colaborador"];
	$matricula 		= $_POST["matricula_colaborador"];
	$nome 			= $_POST["nome_colaborador"];
	$email 			= $_POST["email_colaborador"];
	$dtnascimento  	= $_POST["dtnascimento_colaborador"];
	$telefone 		= $_POST["telefone_colaborador"];
	$celular 		= $_POST["celular_colaborador"];
	$cep     		= $_POST["cep_colaborador"];
	$cidade     	= $_POST["cidade_colaborador"];
	$bairro      	= $_POST["bairro_colaborador"];
	$uf             = $_POST["uf_colaborador"];
	$endereco       = $_POST["endereco_colaborador"];
	$complemento    = $_POST["complemento_colaborador"];
	$funcao 		= $_POST["funcao_colaborador"];
	$cargo 			= $_POST["cargo_colaborador"];
	$atuacao 		= $_POST["atuacao_colaborador"];
	$senha          = $_POST["senha_colaborador"];

	$sql_usuarios = "INSERT INTO usuarios (
	cpf, 
	nome, 
	DataNascimento, 
	email, 
	cep, 
	logradouro, 
	complemento, 
	bairro, 
	cidade, 
	estado, 
	telefone, 
	celular, 
	senha)
	VALUES (
	'{$cpf}',
	'{$nome}',
	'{$dtnascimento}',
	'{$email}',
	'{$cep}',
	'{$endereco}',
	'{$complemento}',
	'{$bairro}',
	'{$cidade}',
	'{$uf}',
	'{$telefone}',
	'{$celular}',
	'{$senha}')";

	$res_usuarios = $conn -> query($sql_usuarios) or die($conn->error);

	$id_usuarios = $conn->insert_id;

	$sql_colaborador = "INSERT INTO colaborador (
	usuarios_id_usuarios, 
	matricula,
	funcao,
	cargo,
	areaatuacao,
	StatusColaborador_id_statuscolaborador)
	VALUES (
	{$id_usuarios},
	'{$matricula}',
	'{$funcao}',
	'{$cargo}',
	'{$atuacao}',
	'1')";

	$res_colaborador = $conn -> query($sql_colaborador) or die($conn->error);
	
	/*var_dump($result_usuarios);
	var_dump($result_colaborador);
	die();*/

	if($res_colaborador==true AND $res_colaborador==true){
		print "<div class='alert alert-success mt-5'><p>Cadastrou com sucesso!</p></div>";
	}else{
		print "<div class='alert alert-danger mt-5'><p>Não foi possível cadastrar!</p></div>";
	}
	break;


	case 'editar':
	$nome     		= $_POST["nome"];
	$email     		= $_POST["email"];
	$DataNascimento = $_POST["DataNascimento"];
	$telefone     	= $_POST["telefone"];
	$celular     	= $_POST["celular"];
	$cep     		= $_POST["cep"];
	$cidade     	= $_POST["cidade"];
	$bairro      	= $_POST["bairro"];
	$estado         = $_POST["estado"];
	$logradouro     = $_POST["logradouro"];
	$complemento    = $_POST["complemento"];
	$funcao   		= $_POST["funcao"];
	$cargo    		= $_POST["cargo"];
	$areaatuacao    = $_POST["areaatuacao"];
	$StatusColaborador_id_statuscolaborador    = $_POST["StatusColaborador_id_statuscolaborador"];

	$sql_usuarios = "UPDATE usuarios SET 
	nome='{$nome}',
	email='{$email}',
	DataNascimento='{$DataNascimento}',
	telefone='{$telefone}',
	celular='{$celular}',
	cep='{$cep}',
	cidade='{$cidade}',
	bairro='{$bairro}',
	estado='{$estado}',
	logradouro='{$logradouro}',
	complemento='{$complemento}'	
	WHERE
	id_usuarios = ".$_POST["id_usuarios"];

	$res_usuarios = $conn -> query($sql_usuarios) or die($conn->error);

	$sql_colaborador = "UPDATE colaborador SET 
	funcao='{$funcao}',
	cargo='{$cargo}',
	StatusColaborador_id_statuscolaborador='{$StatusColaborador_id_statuscolaborador}',
	areaatuacao='{$areaatuacao}'
	WHERE
	usuarios_id_usuarios = ".$_POST["id_usuarios"];

	$res_colaborador = $conn -> query($sql_colaborador) or die($conn->error);

	/*var_dump($sql_usuarios);
	var_dump($sql_colaborador);
	die();*/

	if($res_usuarios==true AND $res_colaborador==true){
		print "<div class='alert alert-success mt-5'><p>Editou com sucesso!</p></div>";
	}else{
		print "<div class='alert alert-danger mt-5'><p>Não foi possível editar!</p></div>";
	}
	break;
	
}
?>
