<!DOCTYPE html>
<html>
	<head>
		<title>Ministérios</title>
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

		</head>
	<body class="fadeIn">
			<?php
                require 'views/components/Header.php';
            ?>
		  <div class="about">
		  	 <div class="container">
			  	<div class="aboutus">
		  		  <h3>Ministérios</h3><br/><br/><br/>
				  <div class="row">
				    <div class="col m6">
				      <div class="card">
				        <div class="card-image">
				          <img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg">
				          <span class="card-title">Cura e Libertação</span>

				        </div>
				        <div class="card-content">
				          O Ministério de Oração por Cura e Libertação é o serviço prestado no grupo de oração, orientando seus participantes a buscar a cura e a libertação para si e para os seus, em Jesus, através da oração dos irmãos. O objetivo deste ministério é reacender a chama da fé no coração de todos, Jesus é o ontem, o hoje e sempre estará realizando seus milagres e derramando suas graças em cada um. Deus concede a seus filhos vida em plenitude em Jesus Cristo pelo poder de seu Espírito Santo.
				        </div>
				      </div>
				    </div>
				    <div class="col m6">
				      <div class="card">
				        <div class="card-image">
				          <img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg">
				          <span class="card-title">Atividades</span>

				        </div>
				        <div class="card-content">
				          <p>Confira nossas atividades</p>
				        </div>
				      </div>
				    </div>

				    <div class="col m4">
				      <div class="card">
				        <div class="card-image">
				          <img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg">
				          <span class="card-title">Contato</span>

				        </div>
				        <div class="card-content">
				          <p>Contate-nos</p>
				        </div>
				      </div>
				    </div>
				  </div>
				</div>
		  	</div>
		  </div>
		<?php require 'views/components/Footer.php'; ?>
	  <!--JQuery-->
      <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.3.1.min.js"></script>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/materialize.min.js"></script>

      <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/js.js"></script>
	</body>
</html>
