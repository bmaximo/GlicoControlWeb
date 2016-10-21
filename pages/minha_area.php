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
			<?php
				include('menu.php');
			?>
			<div class="row-white">
			<div class="container">
			<div class="row row-space">
				<div class="col-md-12">
					<br />
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
			</div>
			<?php
				include('rodape.php');
			?>
		</div>
		<script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
	</body>
</html>
