<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GlicoControl</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
  </head>
  <body>

    <div class="container-fluid">
    <div class="row">
		<div class="col-md-12">	
		<div class="topo">
			<img src="img/logo.png" width="100%" height="100%">
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

					<a class="navbar-brand" href="index.php">GlicoControl</a>
				</div>
				
				<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="index.php">Inicio</a>
						</li>
						<li>
							<a href="#">Sobre</a>
						</li>
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control">
						</div> 
						<button type="submit" class="btn btn-default">
							Submit
						</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a class="btn" role="button" href="#modal-container-960468" data-toggle="modal">Área de Acesso aos Profissionais de Saúde</a>							
						</li>
					</ul>
				</div>
				
			</nav>
		</div>
	</div>
	<div class="row">
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
										<form name="login" method="post" action="pages/login.php" >
											<label>Email: </label>
											<input type="email" name="email" id="email" required class="form-control"/>
											<br />
											<label>Senha</label>
											<input type="password" name="senha" id="senha" required class="form-control"/>
											<br />
											<input type="submit" name="Entrar" id="Entrar" value="Entrar" class="btn btn-default">
									</div> 
									<div id="cadastrar">
										<h1>Cadastrar</h1>

									</div>
								</div>
						    </div>
						</div>
					</div>
				</div>				
			</div>
			<div class="carousel slide" id="carousel-708755">
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#carousel-708755">
					</li>
					<li data-slide-to="1" data-target="#carousel-708755">
					</li>
					<li data-slide-to="2" data-target="#carousel-708755">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<img alt="Carousel Bootstrap First" src="http://lorempixel.com/output/sports-q-c-1600-500-1.jpg">
						<div class="carousel-caption">
							<h4>
								First Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="Carousel Bootstrap Second" src="http://lorempixel.com/output/sports-q-c-1600-500-2.jpg">
						<div class="carousel-caption">
							<h4>
								Second Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="Carousel Bootstrap Third" src="http://lorempixel.com/output/sports-q-c-1600-500-3.jpg">
						<div class="carousel-caption">
							<h4>
								Third Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
				</div> <a class="left carousel-control" href="#carousel-708755" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-708755" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
		</div>
		<div class="col-md-4">
			<img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
		</div>
		<div class="col-md-4">
			<img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center text-primary">
				h3. Lorem ipsum dolor sit amet.
			</h3>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

    
  </body>
</html>