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
        <div class="row row-space">
          <div class="col-md-12">
            <h1>Controle de Peso</h1>
            <?php
              $p = $_SESSION['id_paciente'];
              $sql = "select * from paciente where id_paciente = '$p'";
              require 'connection_mysql.php';
              $r = mysqli_query ($mysqli, $sql) or die (mysqli_error($mysqli));
              $dados = mysqli_fetch_array($r);
              echo "Nome do paciente: ".$dados['nome']."<br />";
              echo "Data de nascimento: ".$dados['data_nascimento']."<br />";
              echo "Diabetes ".$dados['tipo_diabetes']."<br />";
              echo "Data de inicio da doença: ".$dados['data_diabetico']."<br />";
              echo "Email: ".$dados['email'];
            ?>
          </div>
        </div>
        <div class="row row-space">
					<div class ="col-md-12">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Data</th>
									<th>Peso</th>
									<th>Valor</th>
									<th>Descrição</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$id = $_SESSION['id_paciente'];
									$sql = "select * from imc where fk_paciente = '$id' order by data_imc";
									require 'connection_mysql.php';
									try{
										$r = mysqli_query ($mysqli, $sql) or die (mysqli_error($mysqli));
										while ($a = mysqli_fetch_array ($r)){
											$date = date_create($a["data_imc"]);
											echo "<tr>";
											echo "<td>".date_format($date, 'd/m/Y')."</td>";
											echo "<td>".$a["peso"]."</td>";
											echo "<td>".$a["valor"]."</td>";
											echo "<td>Teste</td>";
											echo "</tr>";
										}
									}catch(Exception $e){
										echo "Erro ao gerar relatório: ".  $e->getMessage();
									}
								?>
							</tbody>
						</table>
					</div>
      </div>
    </div>
  </body>
</html>