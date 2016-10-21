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
				<div class="col-md-3">
					<br />
					<a class="btn btn-primary btn-xs" href="minha_area.php" role="button">
						<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Voltar a minha área
					</a>
				</div>
				<div class="col-md-12">
					<h1>Lista de Pacientes</h1><br /><br />
				</div>
				<div class="col-md-12">
					<table class="table table-striped table-condensed">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Data de Nascimento</th>
								<th>Sexo</th>
								<th>Tipo de Diabetes</th>
								<th>Tipo Sanguíneo</th>
								<th>Email</th>
								<th>Telefone</th>
							</tr>
						</thead>
						<tbody>
						<?php
							require 'connection_mysql.php';
							$sql = "select * from paciente as p inner join rl_usuario_paciente as rl on p.id_paciente = rl.fk_paciente where rl.fk_usuario =".$_SESSION['id_usuario']." order by p.nome";
							$r = mysqli_query ($mysqli, $sql) or die (mysqli_error($mysqli));
							while ($a = mysqli_fetch_array ($r)){
								$nasc = date_create($a["data_nascimento"]);
								echo "<tr>";
								echo "<td><a href='paciente_sessao.php?id_paciente=".$a["id_paciente"]."'>";
								echo $a["nome"]."</a></td>";
								echo "<td>".date_format($nasc, 'd/m/Y')."</td>";
								echo "<td>".$a["sexo"]."</td>";
								echo "<td>".$a["tipo_diabetes"]."</td>";
								echo "<td>".$a["tipo_sanguineo"]."</td>";
								echo "<td>".$a["email"]."</td>";
								echo "<td>".$a["telefone"]."</td>";
								echo "</tr>";
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
			</div>
			</div>
    </div>
		<script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
	</body>
</html>
