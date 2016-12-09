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
		<script src="../libraries/RGraph.common.dynamic.js" ></script>
		<script src="../libraries/RGraph.pie.js" ></script>
    
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
								<a href="estatisticas.php">GlicoControl em Números</a>
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
												<a href="recupera_acesso.php">Esqueci minha senha</a>
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
				<br />
				<h1>GlicoControl em Números</h1>
				<br /><br />
			</div>
			
				<?php
					//graficos baseados em numero de pacientes - Inicio
					$tipos = array();
					$tipoCent = array();
					$sexo = array();
					$sexoCent = array();
					//query de total de pacientes
					$queryTotal = "select count(*) as t from paciente";
					require "connection_mysql.php";
					$r = mysqli_query ($mysqli,$queryTotal) or die (mysqli_error($mysqli));
					$dados = mysqli_fetch_array($r);
					$total = $dados['t'];
					//query com porcentagem de diabeticos por tipo
					$queryTipo = "select tipo_diabetes, count(*)/ '$total' as porcentagem from paciente group by tipo_diabetes";
					$a = mysqli_query ($mysqli,$queryTipo) or die (mysqli_error($mysqli));
					while ($d = mysqli_fetch_array ($a)){
						$tipos[]= $d["tipo_diabetes"];
						$tipoCent[]= round(($d["porcentagem"]*100), 2);
					}
					//query de porcentagem de pacientes por sexo
					$querySexo = "select sexo, count(*)/ '$total' as porcentagem from paciente group by sexo";
					$b = mysqli_query ($mysqli,$querySexo) or die (mysqli_error($mysqli));
					while ($f = mysqli_fetch_array ($b)){
						$sexo[]= $f["sexo"];
						$sexoCent[]= round(($f["porcentagem"]*100), 2);
					}
					//Arrays de tipos de diabetes
					$tipos_string = "['" . join("', '", $tipos) . "']";
					$tipo_cent_string = "['" . join("', '", $tipoCent) . "']";
					//Arrays de pacientes por sexo
					$sexo_string = "['" . join("', '", $sexo) . "']";
					$sexo_cent_string = "['" . join("', '", $sexoCent) . "']";
					//graficos baseados em numero de pacientes - Fim
			
					//graficos baseados em indices glicemicos - Inicio
					$alto = array();
					$altoCent = array();
					$baixo = array();
					$baixoCent = array();
					//query de total de medicoes
					$queryMedicoes = "select count(*) as m from medicao";
					$c = mysqli_query ($mysqli,$queryMedicoes) or die (mysqli_error($mysqli));
					$dadosM = mysqli_fetch_array($c);
					$totalM = $dadosM['m'];
					//query de medicoes mais altas
					$queryAlto = "select count(*)/'$totalM' as p from medicao where valor >= 180.00";
					$d = mysqli_query ($mysqli,$queryAlto) or die (mysqli_error($mysqli));
					$dadosA = mysqli_fetch_array($d);
					$porcAlto = round(($dadosA['p']*100),2);
					//query de medicoes mais baixas
					$queryBaixo = "select count(*)/'$totalM' as p from medicao where valor <= 70.00";
					$f = mysqli_query ($mysqli,$queryBaixo) or die (mysqli_error($mysqli));
					$dadosB = mysqli_fetch_array($f);
					$porcBaixo = round(($dadosB['p']*100),2);
					//Arrays de altos
					$alto_string = "['Acima das Metas','Demais medições']";
					$alto_cent_string = "['" .$porcAlto. "','".(100 - $porcAlto)."']";
					//Arrays de baixos
					$baixo_string = "['Abaixo das Metas','Demais medições']";
					$baixo_cent_string = "['" .$porcBaixo. "','".(100 - $porcBaixo)."']";
				?>
				<div class="col-md-4">
					<h3 class="text-center text-primary">Porcentagem de pacientes por tipo</h3>
					<div class="topo">
						<canvas id="cvs1" idth="200" height="200">[No canvas support]</canvas>
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class="col-md-4">
					<h3 class="text-center text-primary">Porcentagem de pacientes por sexo</h3>
					<div class="topo">
						<canvas id="cvs2" idth="200" height="200">[No canvas support]</canvas>
					</div>
				</div>
				<div class="col-md-12"> <br /><br /><br /><br /><br /><br /></div>
				
				<div class="col-md-4">
					<h3 class="text-center text-primary">Porcentagem de índices acima das metas de controle glicêmico</h3>
					<div class="topo">
						<canvas id="cvs3" idth="200" height="200">[No canvas support]</canvas>
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class="col-md-4">
					<h3 class="text-center text-primary">Porcentagem de índices abaixo das metas de controle glicêmico</h3>
					<div class="topo">
						<canvas id="cvs4" idth="200" height="200">[No canvas support]</canvas>
					</div>
				</div>
				<div class="col-md-12"> <br /><br /><br /><br /><br /><br /></div>
				<div class="col-md-6">
				<script>
					 window.onload = function ()
					{
							var dataTipo    = <?php echo $tipo_cent_string?>;
							var labelsTipo  = <?php echo $tipos_string?>;
							for (var i=0; i<dataTipo.length; ++i) {
									labelsTipo[i] = labelsTipo[i] + ', ' + dataTipo[i] + '%';
							}
						 	var dataSexo     = <?php echo $sexo_cent_string?>;
							var labelsSexo   = <?php echo $sexo_string?>;
							for (var i=0; i<dataSexo.length; ++i) {
									labelsSexo[i] = labelsSexo[i] + ', ' + dataSexo[i] + '%';
							}
							var dataAlto     = <?php echo $alto_cent_string?>;
							var labelsAlto   = <?php echo $alto_string?>;
							for (var i=0; i<dataAlto.length; ++i) {
									labelsAlto[i] = labelsAlto[i] + ', ' + dataAlto[i] + '%';
							}
							var dataBaixo     = <?php echo $baixo_cent_string?>;
							var labelsBaixo   = <?php echo $baixo_string?>;
							for (var i=0; i<dataBaixo.length; ++i) {
									labelsBaixo[i] = labelsBaixo[i] + ', ' + dataBaixo[i] + '%';
							}

							var pie = new RGraph.Pie({
									id: 'cvs1',
									data: dataTipo,
									options: {
											labels: labelsTipo,
											labelsSticksList: true,
											tooltips: labelsTipo,
											colors: ['#0966E6','#ff4c13','#C0B8B8'],
											strokestyle: 'white',
											linewidth: 0,
											shadowOffsetx: 2,
											shadowOffsety: 2,
											shadowBlur: 3,
											exploded: 7,
											textAccessible: true
									}
							}).draw();
						 var sexo = new RGraph.Pie({
									id: 'cvs2',
									data: dataSexo,
									options: {
											labels: labelsSexo,
											labelsSticksList: true,
											tooltips: labelsSexo,
											colors: ['#ff4c13','#0966E6'],
											strokestyle: 'white',
											linewidth: 0,
											shadowOffsetx: 2,
											shadowOffsety: 2,
											shadowBlur: 3,
											exploded: 7,
											textAccessible: true
									}
							}).draw();
						 var alto = new RGraph.Pie({
									id: 'cvs3',
									data: dataAlto,
									options: {
											labels: labelsAlto,
											labelsSticksList: true,
											tooltips: labelsAlto,
											colors: ['#ff4c13','#0966E6'],
											strokestyle: 'white',
											linewidth: 0,
											shadowOffsetx: 2,
											shadowOffsety: 2,
											shadowBlur: 3,
											exploded: 7,
											textAccessible: true
									}
							}).draw();
						 var baixo = new RGraph.Pie({
									id: 'cvs4',
									data: dataBaixo,
									options: {
											labels: labelsBaixo,
											labelsSticksList: true,
											tooltips: labelsBaixo,
											colors: ['#ff4c13','#0966E6'],
											strokestyle: 'white',
											linewidth: 0,
											shadowOffsetx: 2,
											shadowOffsety: 2,
											shadowBlur: 3,
											exploded: 7,
											textAccessible: true
									}
							}).draw();
					};
				</script>
		</div>
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
