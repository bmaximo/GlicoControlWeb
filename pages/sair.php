<?php
  session_start();
  try{
    session_destroy();
    echo "<meta http-equiv='refresh' content='0, url=../index.php'>";
  }catch(Exception $e){
	  echo "Erro ao sair: ".  $e->getMessage();
	}
?>