<?php

switch ($_REQUEST["acao"]) {
	case 'cadastrar':
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
	senha,
	tipo)
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
	'{$senha}',
	'1')";

	$res_usuarios = $conn -> query($sql_usuarios) or die($conn->error);

	$id_usuarios = $conn->insert_id;

	$sql_paciente = "INSERT INTO paciente (
	usuarios_id_usuarios, 
	CartaoSUS, 
	genero, 
	cor, 
	dependentes, 
	QuantDep, 
	DiaSemana, 
	periodo, 
	StatusPaciente_id_statuspaciente)
	VALUES (
	{$id_usuarios},
	'{$cartao}',
	'{$genero}',
	'{$cor}',
	'{$dependentes}',
	'{$qtddependentes}',
	'{$agendamento}',
	'{$periodo}',
	'1')";

	$res_paciente = $conn -> query($sql_paciente) or die($conn->error);
	
	/*var_dump($sql_usuarios);
	var_dump($sql_paciente);
	die();*/

	if($res_paciente==true AND $res_usuarios==true){
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
	$genero     	= $_POST["genero"];
	$cor     		= $_POST["cor"];
	$dependentes    = $_POST["dependentes"];
	$QuantDep 		= $_POST["QuantDep"];
	$DiaSemana    	= $_POST["DiaSemana"];
	$periodo        = $_POST["periodo"];
	$StatusPaciente_id_statuspaciente  = $_POST["StatusPaciente_id_statuspaciente"];

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

	$sql_paciente = "UPDATE paciente SET 
	genero='{$genero}',
	cor='{$cor}',
	dependentes='{$dependentes}',
	QuantDep='{$QuantDep}',
	DiaSemana='{$DiaSemana}',
	StatusPaciente_id_statuspaciente='{$StatusPaciente_id_statuspaciente}',
	periodo='{$periodo}'
	WHERE
	usuarios_id_usuarios = ".$_POST["id_usuarios"];

	$res_paciente = $conn -> query($sql_paciente) or die($conn->error);

	/*var_dump($sql_usuarios);
	die();*/

	if($res_usuarios==true AND $res_paciente==true){
		print "<div class='alert alert-success mt-5'><p>Editou com sucesso!</p></div>";
	}else{
		print "<div class='alert alert-danger mt-5'><p>Não foi possível editar!</p></div>";
	}
	break;
}
?>
