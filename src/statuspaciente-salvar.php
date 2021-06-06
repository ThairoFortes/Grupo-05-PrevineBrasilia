<?php

switch ($_REQUEST["acao"]) {
	case 'cadastrar':
	$codigo 		= $_POST["codigostatus_paciente"];
	$status 		= $_POST["status_paciente"];

	$sql_statuspaciente = "INSERT INTO StatusPaciente ( 
	id_statuspaciente, 
	statusPaciente)
	VALUES (
	'{$codigo}',
	'{$status}')";

	$res_statuspaciente = $conn -> query($sql_statuspaciente) or die($conn->error);
	
	/*var_dump($res_statuspaciente);
	die();*/

	if($res_statuspaciente==true){
		print "<div class='alert alert-success mt-5'><p>Cadastrou com sucesso!</p></div>";
	}else{
		print "<div class='alert alert-danger mt-5'><p>Não foi possível cadastrar!</p></div>";
	}
	break;
}
?>
