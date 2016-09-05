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
					<table class="table table-striped">
						<thead>
							<tr>
								<th>
									Nome
								</th>
								<th>
									Data de Nascimento
								</th>
								<th>
									Email
								</th>
							</tr>
						</thead>
						<tbody>
						<?php
							require 'connection_mysql.php';
							$sql = "select * from paciente as p inner join rl_usuario_paciente as rl on p.id_paciente = rl.fk_paciente where rl.fk_usuario =".$_SESSION['id_usuario'];
							$r = mysqli_query ($mysqli, $sql) or die (mysqli_error());
							while ($a = mysqli_fetch_array ($r)){
								echo "<tr>";
								echo "<td>";
								echo "<a href='paciente_sessao.php?id_paciente=".$a["id_paciente"]."'>";
								echo $a["nome"];
								//echo "</a>";
								echo "</td>";
								echo "<td>";
								echo $a["data_nascimento"];
								echo "</td>";
								echo "<td>";
								echo $a["email"];
								echo "</td>";
								echo "</tr>";
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
    </div>
	</body>
</html>
