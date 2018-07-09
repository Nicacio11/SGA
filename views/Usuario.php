<!DOCTYPE html>
<html>
	<head>
		<title>Área de Login</title>
	</head>
  <!--Import Google Icon Font-->
  <link href="<?php echo BASE_URL; ?>/assets/css/icon.css" rel="stylesheet">
	<!--Roboto-->
  <link href="<?php echo BASE_URL; ?>/assets/css/roboto.css" rel="stylesheet">
	<!--Font-awesome-->
  <link href="<?php echo BASE_URL; ?>/assets/css/font-awesome.min.css" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/materialize.min.css"  media="screen,projection"/>

  <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/style.css"/>
  <!--Otimização para mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<body class="fadeIn">
		<?php require_once ('components/Header.php');?>
		<div class="loginRow">
			<div class="container">
					<div class="row">
						<div class="col s12 offset-m4 m4 offset-m4">
							<div class="card-panel carousel-background sizeForm">
								<form method="post" id="formulario">
									<div class="form-item">
										<label for="usuario">Usuário</label>
										<input class="text-white" placeholder="Usuário" type="text" name="usuario" id="usuario" required class="validate" autocomplete="off" />
									</div>
									<div class="form-item">
										<label for="usuario">Senha</label>
										<input placeholder="Senha" type="password" id="senha"  name="senha" required class="validate" autocomplete="" />

									</div class="form-item">
									<div class="center-align">
										<input type="submit" class="btn carousel-background pulse waves-effect waves-dark" value="Entrar"/>
									</div>
									<div>
										<p class="msg"></p>
									</div>
								</form>
							</div>
						</div>

					</div>
			</div>

		</div>


		<?php require_once ('components/Footer.php');?>

	  <!--JQuery-->
      <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.3.1.min.js"></script>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/materialize.min.js"></script>

      <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/js.js"></script>
	</body>
</html>
