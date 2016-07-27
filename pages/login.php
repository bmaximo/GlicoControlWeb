<?php
	$e = $_POST['email'];
	$s = $_POST['senha'];
	
	
	$sql = "select * from usuario where email = '$e' and senha = '$s'";
	
	require 'connection_mysql.php';
	$r = mysqli_query ($mysqli, $sql) or die (mysqli_error());
	$dados = mysqli_fetch_array($r);

	if(!empty($dados)){
		session_start();
		$_SESSION['id_usuario'] = $dados['id_usuario'];
		$_SESSION['nome'] = $dados['nome'];
		echo "<meta http-equiv='refresh' content='0, url=minha_area.php'>";
	}
	
	//echo "bem vindo, ". $_SESSION['nome'];	
	else{
		echo "<script>alert('Usuário e senha não correspondem.'); history.back();</script>";
	}
?>