<!DOCTYPE html>
<html>
	<head>
		<title>Mensageiros de Emanuel</title>
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
			<meta charset="utf-8">
			<meta property="og:url" content="www.mensageirosdeemanuel.com.br" />
			<meta property="og:title" content="Atividades do Grupo de Oração Mensageiros de Emanuel" />
			<meta property="og:description" content="Acompanhe-nos" />
			<meta property="og:image" content="<?php echo BASE_URL;?>assets/images/retiro" />
<script src="http://js.api.here.com/v3/3.0/mapsjs-core.js"
  type="text/javascript" charset="utf-8"></script>
<script src="http://js.api.here.com/v3/3.0/mapsjs-service.js"
  type="text/javascript" charset="utf-8"></script>

		</head>
	<body class="fadeIn">
		<?php
		require_once ( 'views/components/Header.php' );?>
		
		<div class="container"  >
			<div style="margin-bottom: 70px;">
				<br>
				<h2><?php echo $atividade->getTitulo();?></h2>
				<hr>			
			</div>
					
			<div class="pan">
				<div class="row">
					<div class="col s4">
						<img  class="responsive-img actImage" 
					
					src="<?php echo BASE_URL?>assets/images/atividades/<?php echo $atividade->getImage()->getImagePath();?>">
					</div>
					<div class="col s8">
						<p>
							<?php echo $atividade->getDescricao();?>
						</p>
						<p>Data: <?php echo $atividade->getData();?></p>
						
						<div class="row valign-wrapper">
							<div class="chip">
							  <img src="<?php echo BASE_URL; ?>/assets/images/usuarios/<?php echo $atividade->getUsuario()->getImage()->getImagePath();?>"
							  alt="Contact Person">
							  <?php echo $atividade->getUsuario()->getNome();?>
							</div>

						</div> 
					</div>
					
				</div>
			</div>
	  	</div>
 
		
		<?php require_once ('views/components/Footer.php'); ?>
	  <!--JQuery-->
      <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.3.1.min.js"></script>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/materialize.min.js"></script>

      <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/js.js"></script>
	</body>
</html>
