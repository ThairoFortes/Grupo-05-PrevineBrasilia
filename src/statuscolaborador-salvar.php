<?php

switch ($_REQUEST["acao"]) {
	case 'cadastrar':
	$status 		= $_POST["status_colaborador"];

	$sql_statuscolaborador = "INSERT INTO StatusColaborador (  
	statusColaborador)
	VALUES (
	'{$status}')";

	$res_statuscolaborador = $conn -> query($sql_statuscolaborador) or die($conn->error);
	
	/*var_dump($res_statuscolaborador);
	die();*/

	if($res_statuscolaborador==true){
		print "<div class='alert alert-success mt-5'><p>Cadastrou com sucesso!</p></div>";
	}else{
		print "<div class='alert alert-danger mt-5'><p>Não foi possível cadastrar!</p></div>";
	}
	break;
}
?>
