<?php
	define("HOST","localhost");
	define("USER","root");
	define("PASS","");
	define("BASE","previnebsb_b");

	$conn = new MySQLi(HOST, USER, PASS, BASE);

	if(mysqli_connect_errno())
		trigger_error(mysqli_connect_error());
?>