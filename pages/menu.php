<div class="row">
				<div class="col-md-12">	
					<div class="logo">
						<a href="../index.php"><img src="../img/logo.png" width="100%" height="100%"></a>
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
								<li class="dropdown pull-right">
									<a href="#" data-toggle="dropdown" class="dropdown-toggle">
										<?php
										session_start();
										echo $_SESSION['nome'];
										?>
										<strong class="caret"></strong>
									</a>
									<ul class="dropdown-menu">
										<li>
											<a href="minha_area.php">Minha Área</a>
										</li>
										<li>
											<a href="perfil.php">Meu Perfil</a>
										</li>
										<li>
											<a href="sair.php">Sair</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>