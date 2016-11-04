<?php
  $usuario = $_GET['id_usuario'];
  session_start();
	$_SESSION['id_senha'] = $usuario;
  echo "<meta http-equiv='refresh' content='0, url=alterar_senha.php'>";
?>