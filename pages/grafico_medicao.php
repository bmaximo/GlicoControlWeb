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
            $query = "select data, valor from medicao where fk_paciente = ".$paciente." order by data";
            require "connection_mysql.php";
            $datas = array();
            $meds = array();

            $r = mysqli_query ($mysqli,$query) or die (mysqli_error());

            while ($a = mysqli_fetch_array ($r)){
              $datas[] = $a["data"];
              $meds[]= $a["valor"];
            }
            $datas_string = "['" . join("', '", $datas) . "']";
                $meds_string = "['" . join("', '", $meds) . "']";
                
           ?>

                <h1>A basic Bar chart</h1>


             <canvas id="cvs" width="600" height="250">[No canvas support]</canvas>
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
  </body>
</html>