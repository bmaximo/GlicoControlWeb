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
		<div class="container-fluid" >
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
								<li class="dropdown pull-right">
									<a href="#" data-toggle="dropdown" class="dropdown-toggle">
										<?php
										session_start();
										echo $_SESSION['nome'];
										?>
										<strong class="caret"></strong>
									</a>
									<ul class="dropdown-menu">
										<li>
											<a href="minha_area.php">Minha Área</a>
										</li>
										<li>
											<a href="#">Meu Perfil</a>
										</li>
										<li>
											<a href="sair.php">Sair</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<div class="row row-white">
				<div class="col-md-12">
					<h1>Minha Área</h1>
					<br /><br />
				</div>
				<div class="col-md-4">
						<a href="buscar_paciente.php">
							<div class="topo">
							<img src="../img/adiciona.png" width="100%" height="100%" class="img-circle">
							</div>
							<h3 class="text-center text-primary">Buscar Paciente</h3>
						</a>
					</div>
				
				<div class="col-md-4">
					<a href="lista_paciente.php">
						<div class="topo">
							<img src="../img/lista_paciente.png" width="100%" height="100%" class="img-circle">
						</div>
						<h3 class="text-center text-primary">Lista de Pacientes</h3>
					</a>
				</div>
				<div class="col-md-4">
					<a href="perfil.php">
						<div class="topo">
							<img src="../img/perfil.png" width="100%" height="100%" class="img-circle">
						</div>
						<h3 class="text-center text-primary">Meu Perfil</h3>
					</a>
				</div>
			</div>
		</div>
		<script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
	</body>
</html>
