<?php
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$cpf = $_POST['cpf'];
	$crm = $_POST['crm'];
	$senha = $_POST['senha'];

	$queryBusca = "select * from usuario where email = '$email'";
	$queryInsert = "insert into usuario (nome, email, cpf, crm, senha) values ($nome, $email, $cpf, $crm, $senha)";

	$mysqli = mysqli_connect("localhost","root","","glicocontrol");

	$busca = mysqli_num_rows(mysqli_query($mysqli, $queryBusca));
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
		}

?>