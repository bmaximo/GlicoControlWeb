<?php
	session_start();
	$paciente = $_GET['id_paciente'];
	$usuario = $_SESSION['id_usuario'];

	$sql = "insert into rl_usuario_paciente (fk_usuario, fk_paciente) values ('$usuario', '$paciente')";
	
	require 'connection_mysql.php';
	try{
		$r = mysqli_query ($mysqli, $sql) or die (mysqli_error());
		echo "<meta http-equiv='refresh' content='0, url=minha_area.php'>";
	}catch(Exception $e){
		echo "Erro ao adicionar paciente: ".  $e->getMessage();
	}
?>