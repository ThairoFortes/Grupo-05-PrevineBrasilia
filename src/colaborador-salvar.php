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
	/*$id_usuarios    = $_POST["id_usuarios"];*/
	$cpf 			= $_POST["cpf_paciente"];
	$cartao 		= $_POST["cartao_paciente"];
	$nome     		= $_POST["nome_paciente"];
	$email     		= $_POST["email_paciente"];
	$dtnascimento   = $_POST["dtnascimento_paciente"];
	$telefone     	= $_POST["telefone_paciente"];
	$celular     	= $_POST["celular_paciente"];
	$genero     	= $_POST["genero_paciente"];
	$cor     		= $_POST["cor_paciente"];
	$cep     		= $_POST["cep_paciente"];
	$cidade     	= $_POST["cidade_paciente"];
	$bairro      	= $_POST["bairro_paciente"];
	$uf             = $_POST["uf_paciente"];
	$endereco       = $_POST["endereco_paciente"];
	$complemento    = $_POST["complemento_paciente"];
	$dependentes    = $_POST["dependentes_paciente"];
	$qtddependentes = $_POST["qtddependentes_paciente"];
	$agendamento    = $_POST["agendamento_paciente"];
	$periodo        = $_POST["periodo_paciente"];
	$senha          = $_POST["senha_paciente"];

	$result_usuarios = "UPDATE usuarios SET 
	nome='{$nome}'
	WHERE
	id_usuarios = ".$_POST["id_usuarios"];
	
	$res = $conn -> query($result_usuarios);

	if($res==true){
		print "<div class='alert alert-success mt-5'><p>Editou com sucesso!</p></div>";
	}else{
		print "<div class='alert alert-danger mt-5'><p>Não foi possível editar!</p></div>";
	}
	break;

	case 'excluir':
	$sql = "DELETE FROM biblioteca
	WHERE id_biblioteca = ".$_REQUEST["id_biblioteca"];
	$res = $conn->query($sql) or die($conn->error);

	if($res==true){
		print "<div class='alert alert-success mt-5'><p>Excluiu com sucesso!</p></div>";
	}else{
		print "<div class='alert alert-danger mt-5'><p>Não foi possível excluir!</p></div>";
	}
	break;
}
?>
