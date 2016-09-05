<?php
  $paciente = $_GET['id_paciente'];
  session_start();
	$_SESSION['id_paciente'] = $paciente;
  echo "<meta http-equiv='refresh' content='0, url=area_paciente.php'>";
?>