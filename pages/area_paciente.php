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
			<?php
				include('menu.php');
			?>
			<div class="row-white">
			<div class="container">
			<div class="row row-space">
				<div class="col-md-12">
					<?php
						$paciente = $_SESSION['id_paciente'];
						$sql = "select * from paciente where id_paciente = '$paciente'";
						require 'connection_mysql.php';
						$r = mysqli_query ($mysqli, $sql) or die (mysqli_error($mysqli));
						$dados = mysqli_fetch_array($r);
						echo "<h1>".$dados['nome']."</h1><br />";
						echo "<h4>Data de nascimento: ".$dados['data_nascimento']."</h4>";
						echo "<h4>Diabetes ".$dados['tipo_diabetes']."</h4>";
						echo "<h4>Data de inicio da doença: ".$dados['data_diabetico']."</h4>";
						echo "<h4>Email: ".$dados['email']."</h4><br />";
					?>
				</div>
			</div>
			<div class="row">
				<div class ="col-md-4">
					<a href= "relatorio_medicao.php">
						<div class="topo">
							<img src="../img/glicemia.png" width="100%" height="100%" class="img-circle">
						</div>
						<h3 class="text-center text-primary">Relatório de Medições</h3>
					</a>
				</div>
				<div class ="col-md-4">
					<a href= 'grafico_medicao.php'>
						<div class="topo">
						<img src="../img/grafico.png" width="100%" height="100%" class="img-circle">
						</div>	
						<h3 class="text-center text-primary">Gráfico das Medições</h3>
					</a>
				</div>
				<div class ="col-md-4">
					<a href= 'controle_peso.php'>
						<div class="topo">
						<img src="../img/peso.png" width="100%" height="100%" class="img-circle">
						</div>
						<h3 class="text-center text-primary">Controle de Peso</h3>
					</a>
				</div>
				<div class ="col-md-4">
					<a href= 'relatorio_insulina.php'>
						<div class="topo">
						<img src="../img/insulina.png" width="100%" height="100%" class="img-circle">
						</div>
						<h3 class="text-center text-primary">Relatório de Medicação</h3>
					</a>
				</div>
			</div>
			</div>
			</div>
		</div>
  </body>
</html>