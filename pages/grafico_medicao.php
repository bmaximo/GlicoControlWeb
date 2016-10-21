<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>GlicoControl</title>

		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
    <script src="../libraries/RGraph.common.core.js" ></script>
    <script src="../libraries/RGraph.common.annotate.js" ></script>
    <script src="../libraries/RGraph.common.context.js" ></script>
    <script src="../libraries/RGraph.common.tooltips.js" ></script>
    <script src="../libraries/RGraph.common.resizing.js" ></script>
    <script src="../libraries/RGraph.line.js" ></script>
		<script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
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
						<h1>Gráfico de Medições</h1>
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
						<strong>Escolha uma data inicial e final para gerar o gráfico:</strong>
						<form name="gerarGraficoo" class="form-inline" method="post" action="?go=geraGrafico">
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
							<button type="submit" name="Gerar" id="Gerar" class="btn btn-primary">Gerar Gráfico</button>
						</form>
					</div>
				</div>
			<div class="row row-space">
				<div class="col-md-12">
          <?php
						if(@$_GET['go'] == 'geraGrafico'){
							$fim;
							$inicio;
							$paciente = $_SESSION['id_paciente'];
							$p = $_POST['periodo'];
							if(($p != "") || ($p != null)){
								$fim = date('Y-m-d');
								$inicio = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-$p, date("Y")));
							}else{
								$inicio = $_POST['dataInicio'];
								$fim = $_POST['dataFim'];
							}
							$query = "select data_medicao, AVG(valor) as valor from medicao where fk_paciente = ".$paciente." 
												and data_medicao between '$inicio' and '$fim' 
												group by data_medicao
												order by data_medicao, hora_medicao";
							require "connection_mysql.php";
							$datas = array();
							$meds = array();

							$r = mysqli_query ($mysqli,$query) or die (mysqli_error($mysqli));

							while ($a = mysqli_fetch_array ($r)){
								$date = date_create($a["data_medicao"]);
								$datas[] = date_format($date, 'd/m/Y');
								$meds[]= $a["valor"];
							}
							$datas_string = "['" . join("', '", $datas) . "']";
									$meds_string = "['" . join("', '", $meds) . "']";
						}
           ?>
					 <canvas id="cvs" width="800" height="250px">[No canvas support]</canvas>
					 <script>
						chart = new RGraph.Line('cvs', <?php echo($meds_string) ?>);
						chart.Set('chart.background.grid.autofit', false);
						chart.Set('chart.gutter.left', 35);
						chart.Set('chart.gutter.right', 5);
						chart.Set('chart.hmargin', 10);
						chart.Set('chart.tickmarks', 'endcircle');
						chart.Set('chart.labels', <?php echo $datas_string ?>); 
						chart.Draw();
					</script>
        </div>
      </div>
			</div>
    </div>
		<?php
			include('rodape.php');
		?>
		</div>
  </body>
</html>