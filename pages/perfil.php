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
					<h1>Meu Perfil</h1>
					<br /><br />
				</div>
				<div class="col-md-6">
					<?php
						$id = $_SESSION['id_usuario'];
						$sql = "select * from usuario where id_usuario = '$id'";
						require 'connection_mysql.php';
						$r = mysqli_query ($mysqli, $sql) or die (mysqli_error());
						$a = mysqli_fetch_array($r);
					?>
					<h3 class="text-primary">Editar dados: </h3>
					<form name="cadastro" method="post" action="?go=editar" >
						<label>Nome:</label>
						<input type="text" name="nome" id="nome" value="<?php echo $a['nome'];?>" required class="form-control"/>
						<label>Data de nascimento: </label>
						<input type="date" name="datanasc" id="datanasc" value="<?php echo $a['data_nascimento'];?>" required class="form-control"/>
						<label>Email: </label>
						<input type="email" name="email" id="email" value="<?php echo $a['email'];?>" required class="form-control"/>
						<label>CPF: </label>
						<input type="text" name="cpf" id="cpf" pattern="[0-9]{11}" value="<?php echo $a['cpf'];?>" required class="form-control"/>
						<label>CRM: </label>
						<input type="text" name="crm" id="crm" pattern="[0-9]{4}" value="<?php echo $a['crm'];?>" required class="form-control"/>
						<br />
						<input type="submit" name="Editar" id="editar" value="Editar" class="btn btn-primary">
						<br />
					</form>
					<?php
						if(@$_GET['go'] == 'editar'){
							$nome = $_POST['nome'];
							$email = $_POST['email'];
							$cpf = $_POST['cpf'];
							$crm = $_POST['crm'];
							$datanasc = $_POST['datanasc'];
							
							$query = "update usuario set nome = '$nome', email = '$email', cpf = '$cpf', crm = '$crm', data_nascimento = '$datanasc' where id_usuario = '$id'";
							require 'connection_mysql.php';
							try{
								$r = mysqli_query ($mysqli, $query) or die (mysqli_error($mysqli));
								echo "<br /><div class='alert alert-success' role='alert'>Cadastro editado com sucesso.</div>";
							}catch(Exception $e){
								echo "Erro ao editar: ".  $e->getMessage();
							}
						}
					?>
				</div>
				<div class="col-md-6">
					<h3 class="text-primary">Alterar Senha: </h3>
					<form name="alteraSenha" method="post" action="?go=senha" >
						<label>Senha Atual: </label>
						<input type="password" name="atualsenha" id="atualsenha" required class="form-control"/>
						<label>Nova Senha: </label>
						<input type="password" name="novasenha" id="novasenha" required class="form-control"/>
						<label>Confirmar Senha: </label>
						<input type="password" name="confirmasenha" id="confirmasenha" required class="form-control"/>
						<br />
						<input type="submit" name="Alterar Senha" id="alterar" value="Alterar Senha" class="btn btn-primary">
						<br />
					</form>
					<?php
						if(@$_GET['go'] == 'senha'){
							$sa = $_POST['atualsenha'];
							$sn = $_POST['novasenha'];
							$consulta = "select * from usuario where id_usuario = '$id' and senha = '$sa'";
							require 'connection_mysql.php';
							$r = mysqli_query ($mysqli, $consulta) or die (mysqli_error($mysqli));
							$dados = mysqli_fetch_array($r);
							if(empty($dados)){
								echo "<br /><div class='alert alert-danger' role='alert'>Senha atual está incorreta</div>";
							}else{
								$query = "update usuario set senha = '$sn' where id_usuario = '$id'";
								try{
									$r = mysqli_query ($mysqli, $query) or die (mysqli_error($mysqli));
									echo "<br /><div class='alert alert-success' role='alert'>Senha alterada com sucesso</div>";
								}catch(Exception $e){
									echo "Erro ao editar: ".  $e->getMessage();
								}
							}
						}
					?>
				</div>
				</div>
				</div>
			</div>
			<?php
				include('rodape.php');
			?>
		</div>
		<script>
			var password = document.getElementById("novasenha"),
			var confirm_password = document.getElementById("confirmasenha");
			function validatePassword(){
				if(password.value != confirm_password.value) {
					confirm_password.setCustomValidity("Senhas não correspondem");
				} else {
					confirm_password.setCustomValidity('');
				}
			}
			password.onchange = validatePassword;
			confirm_password.onkeyup = validatePassword;
		</script>
		<script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
	</body>
</html>