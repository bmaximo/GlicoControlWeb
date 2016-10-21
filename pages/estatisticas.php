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
    <div class="row">
			<div class="col-md-12">	
				<div class="logo">
					<img src="../img/logo.png" width="100%" height="100%">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">		
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
						</button>

						<a class="navbar-brand" href="../index.php">GlicoControl</a>
					</div>

					<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="active">
								<a href="../index.php">Inicio</a>
							</li>
							<li>
								<a href="sobre.php">Sobre</a>
							</li>
							<li>
								<a href="estatisticas.php">Estatisticas</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<?php
									session_start();
									if(!empty($_SESSION['id_usuario'])){

										echo "<li class='dropdown pull-right'>";
										echo "<a href='#' data-toggle='dropdown' class='dropdown-toggle'>";
										echo $_SESSION['nome'];
										echo "<strong class='caret'></strong>";
										echo "</a>";
										echo "<ul class='dropdown-menu'>";
										echo "<li>";
										echo "<a href='minha_area.php'>Minha Área</a>";
										echo "</li>";
										echo "<li>";
										echo "<a href='perfil.php'>Meu Perfil</a>";
										echo "</li>";
										echo "<li>";
										echo "<a href='sair.php'>Sair</a>";
										echo "</li>";
										echo "</ul>";
										echo "</li>";

									}else{
										echo "<a class='btn' role='button' href='#modal-container-960468' data-toggle='modal'>Área de Acesso aos Profissionais de Saúde</a>	";
									}
								?>
							</li>
						</ul>
					</div>

				</nav>
			</div>
		</div>
		<div class="row-white">
		<div class="container">
		<div class="row row-space">
			<div class="col-md-12">
				<div class="modal fade" id="modal-container-960468" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">

								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									×
								</button>
								<h4 class="modal-title" id="myModalLabel">
									Acesso aos profissionais de saúde
								</h4>
							</div>
							<div class="modal-body">
								<div>
									<ul class="tab-group">
										<li class="tab active"><a href="#login">Login</a></li>
										<li class="tab"><a href="#cadastrar">Cadastrar</a></li>
									</ul>

									<div class="tab-content">
										<div id="login">
											<h1>Login</h1>
											<form name="login" method="post" action="login.php" >
												<label>Email: </label>
												<input type="email" name="email" id="email" required class="form-control"/>
												<br />
												<label>Senha: </label>
												<input type="password" name="senha" id="senha" required class="form-control"/>
												<br />
												<input type="submit" name="Entrar" id="Entrar" value="Entrar" class="btn btn-primary">
												<a href="#">Esqueci minha senha</a>
											</form>
										</div> 
										<div id="cadastrar">
											<h1>Cadastrar</h1>
											<form name="cadastro" method="post" action="cadastro.php" >
												<label>Nome:</label>
												<input type="text" name="nome" id="nome" required class="form-control"/>
												<label>Data de nascimento: </label>
												<input type="date" name="datanasc" id="datanasc" required class="form-control"/>
												<label>Email: </label>
												<input type="email" name="email" id="email" required class="form-control"/>
												<label>CPF: </label>
												<input type="text" name="cpf" id="cpf" pattern="[0-9]{11}" required class="form-control"/>
												<label>CRM: </label>
												<input type="text" name="crm" id="crm" pattern="[0-9]{4}" required class="form-control"/>
												<label>Senha: </label>
												<input type="password" name="senha" id="senha" required class="form-control"/>
												<label>Confirmar Senha: </label>
												<input type="password" name="confirmasenha" id="confirmasenha" required class="form-control"/>
												<br />
												<input type="submit" name="Cadastrar" id="Cadastrar" value="Cadastrar" class="btn btn-primary">
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
		<div class="row row-space">
			<div class="col-md-12">
				<h1>estatistica</h1>
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
		<script>
			var password = document.getElementById("senha"),
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

    
  </body>
</html>