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
						$p = $_SESSION['id_paciente'];
						$sql = "select * from paciente where id_paciente = '$p'";
						require 'connection_mysql.php';
						$r = mysqli_query ($mysqli, $sql) or die (mysqli_error($mysqli));
						$dados = mysqli_fetch_array($r);
						echo "Nome do paciente: ".$dados['nome']."<br />";
						echo "Data de nascimento: ".$dados['data_nascimento']."<br />";
						echo "Email: ".$dados['email'];
					?>
					<form name="gerarRelatorio" class="form-inline" method="post" action="?go=geraRelatorio">
						<div class="form-group">
							<label for="dataInicial">Data Inicial:</label><br />
							<input type="date" class="form-control" id="dataInicio" name="dataInicio" />
						</div>
						<div class="form-group">
							<label for="dataFinal">Data Final:</label><br />
							<input type="date" class="form-control" id="dataFim" name="dataFim" />
						</div>
						<br />
						<button type="submit" name="Gerar" id="Gerar" class="btn btn-default">Gerar Relatório</button>
					</form>
				</div>
			</div>
			<div class="row">
				<div class ="col-md-12">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>
									Valor
								</th>
								<th>
									Data/Hora
								</th>
								<th>
									Descrição
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if(@$_GET['go'] == 'geraRelatorio'){
									$id = $_SESSION['id_paciente'];
									$inicio = $_POST['dataInicio']." 00:00:00";
									$fim = $_POST['dataFim']." 00:00:00";
									$sql = "select * from medicao where fk_paciente = '$id' and data between '$inicio' and '$fim' order by data";
									$cor = "";
									require 'connection_mysql.php';
									try{
									$r = mysqli_query ($mysqli, $sql) or die (mysqli_error($mysqli));
									while ($a = mysqli_fetch_array ($r)){
										if($a['valor']>=160){
											$cor = "danger";
										}elseif($a['valor']<70){
											$cor = "warning";
										}else{
											$cor="active";
										}
										echo "<tr class='".$cor."'>";
										echo "<td>";
										echo $a["valor"];
										echo "</td>";
										echo "<td>";
										echo $a["data"];
										echo "</td>";
										echo "<td>";
										echo $a["descricao"];
										echo "</td>";
										echo "</tr>";
									}
									}catch(Exception $e){
										echo "Erro ao adicionar paciente: ".  $e->getMessage();
									}
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>