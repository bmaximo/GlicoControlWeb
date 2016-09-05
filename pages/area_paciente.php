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


			<div class="row">
				<div class="col-md-12">
					<?php
						$paciente = $_SESSION['id_paciente'];
						$sql = "select * from paciente where id_paciente = '$paciente'";
						require 'connection_mysql.php';
						$r = mysqli_query ($mysqli, $sql) or die (mysqli_error($mysqli));
						$dados = mysqli_fetch_array($r);
						echo "Nome do paciente: ".$dados['nome']."<br />";
						echo "Data de nascimento: ".$dados['data_nascimento']."<br />";
						echo "Email: ".$dados['email'];
					?>
				</div>
			</div>
			<div class="row">
				<div class ="col-md-4">
					<?php
						echo "<a href= 'relatorio_medicao.php'>Relatório de Medições</a>";
					?>
				</div>
				<div class ="col-md-4">
					<?php
						echo "<a href= 'grafico_medicao.php'>Gráfico das Medições</a>";
					?>
				</div>
				<div class ="col-md-4">
					<?php
						echo "<a href= 'controle_peso.php'>Controle de Peso</a>";
					?>
				</div>
			</div>
		</div>
  </body>
</html>