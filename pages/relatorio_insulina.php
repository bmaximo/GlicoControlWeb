<!DOCTYPE html>
<html>
	<head>
		<meta charset="unicode">
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
				<div class="col-md-3">
					<br />
					<a class="btn btn-primary btn-xs" href="area_paciente.php" role="button">
						<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Voltar ao paciente
					</a>
				</div>
				<div class="col-md-12">
					<h1>Relatório de Medicações</h1>
				</div>
				<div class="col-md-12">
						<?php
							$p = $_SESSION['id_paciente'];
							$sql = "select nome from paciente where id_paciente = '$p'";
							require 'connection_mysql.php';
							$r = mysqli_query ($mysqli, $sql) or die (mysqli_error($mysqli));
							$dados = mysqli_fetch_array($r);
							echo "<h4 class='text-center text-primary'><p class='text-center'>Paciente: ".$dados['nome']."</p></h4>";
						?>
					</div>
				<div class="col-md-12">
					<br /><br />
					<strong>Escolha uma data inicial e final para gerar o relatório:</strong>
					<form name="gerarRelatorio" class="form-inline" method="post" action="?go=geraRelatorio">
						<div class="form-group">
							<label for="dataInicial">Data Inicial:</label><br />
							<input type="date" class="form-control" id="dataInicio" name="dataInicio" />
						</div>
						<div class="form-group">
							<label for="dataFinal">Data Final:</label><br />
							<input type="date" class="form-control" id="dataFim" name="dataFim" />
						</div>
						<br /><br />
						<strong>Você também pode escolher um periodo pré-determinado:</strong>
						<select id="periodo" name="periodo" class="form-control">
							<option value="">Selecione:</option>
							<option value="15">Últimos 15 dias</option>
							<option value="30">Últimos 30 dias</option>
							<option value="60">Últimos 60 dias</option>
						</select>
						<br /><br />
						<button type="submit" name="Gerar" id="Gerar" class="btn btn-primary">Gerar Relatório</button>
					</form>
				</div>
				
			</div>
			<br /><br />
			<div class="row row-space">
				<div class ="col-md-12 ">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>
									Data
								</th>
								<th>
									Hora
								</th>
								<th>
									Tipo
								</th>
								<th>
									Unidade
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if(@$_GET['go'] == 'geraRelatorio'){
									$fim;
									$inicio;
									$id = $_SESSION['id_paciente'];
									$p = $_POST['periodo'];
									if(($p != "") || ($p != null)){
										$fim = date('Y-m-d');
										$inicio = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-$p, date("Y")));
									}else{
										$inicio = $_POST['dataInicio'];
										$fim = $_POST['dataFim'];
									}
									$sql = "select * from insulina where fk_paciente = '$id' and data_insulina between '$inicio' and '$fim' order by data_insulina, hora_insulina";
									$cor = "";
									require 'connection_mysql.php';
									try{
									$r = mysqli_query ($mysqli, $sql) or die (mysqli_error($mysqli));
									while ($a = mysqli_fetch_array ($r)){
										$date = date_create($a["data_insulina"]);
										echo "<tr>";
										echo "<td>".date_format($date, 'd/m/Y')."</td>";
										echo "<td>".$a["hora_insulina"]."</td>";
										echo "<td>".$a["tipo"]."</td>";
										echo "<td>".$a["unidade"]."</td>";
										echo "</tr>";
									}
									}catch(Exception $e){
										echo "Erro ao gerar relatório: ".  $e->getMessage();
									}
								}
							?>
						</tbody>
					</table>
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