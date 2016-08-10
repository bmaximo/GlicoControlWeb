<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>GlicoControl</title>

		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">	
					<div class="topo">
						<img src="../img/logo.png" width="100%" height="100%">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">		
					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="../index.php">GlicoControl</a>
						</div>
						<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active">
									<a href="../index.php">Inicio</a>
								</li>
								<li>
									<a href="#">Sobre</a>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li>
									<?php
										session_start();
										echo "bem vindo, ". $_SESSION['nome'];
									?>							
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form name="busca" method="post" action="?go=pesquisar" class="form-inline">
            <label>Digite o email do paciente: </label>
            <br />
            <input type="email" name="email" id="email" required class="form-control" />
						<button type="submit" name="Pesquisar" id="Pesquisar" value="Pesquisar" class="btn btn-primary">Pesquisar</button>
          </form>
          <?php
						if(@$_GET['go'] == 'pesquisar'){
							$e = $_POST["email"];
							$sql = "select * from paciente where email = '$e'";
							require 'connection_mysql.php';
							$r = mysqli_query ($mysqli, $sql) or die (mysqli_error());
							$dados = mysqli_fetch_array($r);
							if(!empty($dados)){
								echo "Nome do paciente: ".$dados['nome']."<br />";
								echo "Data de nascimento: ".$dados['data_nascimento']."<br />";
								//echo "Sexo: ".$dados['sexo_paciente']."<br />";
								echo "<a href='adiciona_paciente.php?id_paciente= $dados[id_paciente]' class='btn btn-primary btn-lg' role='button'>Adicionar</a>";
							}
							else{
								echo "Nenhum paciente encontrado com este email.";
							}
						}
          ?>
				</div>
			</div>
		</div>
	</body>
</html>
