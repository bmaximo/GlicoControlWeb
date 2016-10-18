<?php
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$cpf = $_POST['cpf'];
	$crm = $_POST['crm'];
	$senha = $_POST['senha'];
	$datanasc = $_POST['datanasc'];

	//$queryBusca = "select * from usuario where email = '$email'";
	$queryInsert = "insert into usuario (nome, email, cpf, crm, senha, data_nascimento) values ('$nome', '$email', $cpf, $crm, '$senha', $datanasc)";

	//$mysqli = mysqli_connect("localhost","root","","glicocontrol");

	require 'connection_mysql.php';
	try{
		$r = mysqli_query ($mysqli, $queryInsert) or die (mysqli_error($mysqli));
		echo "<script>alert('Usuário cadastrado com sucesso.'); history.back();</script>";
	}catch(Exception $e){
		echo "Erro ao adicionar paciente: ".  $e->getMessage();
	}

	/*$busca = mysqli_num_rows(mysqli_query($mysqli, $queryBusca));
		if($busca == 1){
			echo "<script>alert('Email já cadastrado.'); history.back();</script>"; 
		}else{
			try{
				$r = $mysqli -> query($queryInsert);
				$error = $mysqli -> error;
				echo "<script>alert('Usuário cadastrado com sucesso.'); history.back();</script>";
			}catch(Exception $e){
				echo "Erro ao cadastrar: ".  $e->getMessage();
			}
		}*/

?>