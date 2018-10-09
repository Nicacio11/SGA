<!DOCTYPE html>
<html>
	<head>
		<title>Painel - SGA</title>
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
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
	<body class="fadeIn">
		<nav class="black white-text">
		  <div class="container">
		        <div class="nav-wrapper">

		          <a href="<?php echo BASE_URL; ?>Usuario" class="brand-logo waves-effect waves-dark">SGA</a>
		          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		          <ul class="right hide-on-med-and-down">
								<li><a href="<?php echo BASE_URL;?>Reflexao/painel" class="waves-effect waves-light">Reflexões</a></li>
								<li><a href="<?php echo BASE_URL;?>Testemunho/painel" class="waves-effect waves-light">Testemunhos</a></li>
								<li><a href="<?php echo BASE_URL;?>Video/painel" class="waves-effect waves-light">Videos</a></li>
								<li><a href="<?php echo BASE_URL;?>Galeria/painel" class="waves-effect waves-light">Galerias</a></li>
								<li><a href="<?php echo BASE_URL;?>Atividade/painel" class="waves-effect waves-light">Atividades</a></li>
								<?php if(unserialize($_SESSION['usuario'])->getActive()==2):?>
									<li>
										<a href="<?php echo BASE_URL;?>usuario/painel" class="waves-effect waves-light">Usuarios</a>
									</li>
								<?php endif; ?>
		          </ul>
		        </div>

		      <ul class="sidenav" id="mobile-demo">
					<li><a href="<?php echo BASE_URL;?>Reflexao/painel" class="waves-effect waves-light">Reflexões</a></li>
								<li><a href="<?php echo BASE_URL;?>Testemunho/painel" class="waves-effect waves-light">Testemunhos</a></li>
								<li><a href="<?php echo BASE_URL;?>Video/painel" class="waves-effect waves-light">Videos</a></li>
								<li><a href="<?php echo BASE_URL;?>Galeria/painel" class="waves-effect waves-light">Galerias</a></li>
								<li><a href="<?php echo BASE_URL;?>Atividade/painel" class="waves-effect waves-light">Atividades</a></li>
								<?php if(unserialize($_SESSION['usuario'])->getActive()==2):?>
									<li>
										<a href="<?php echo BASE_URL;?>usuario/painel" class="waves-effect waves-light">Usuarios</a>
									</li>
								<?php endif; ?>
		      </ul>
		  </div>
		</nav>
    <?php
        $this->loadInTemplate($viewName, $viewData);
    ?>
    <footer class="page-footer green" >
      <div class="container right-align">
        <a class="btn carousel-background waves-effect waves-light" href="<?php echo BASE_URL;?>Usuario/sair">
          Sair
        </a>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2018 - <?php echo date('Y');?> Todos os direitos reservados.
        <a class="green-text text-lighten-4 right" href="#!">God Blesses You</a>
        </div>
      </div>
    </footer>

	  <!--JQuery-->
      <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.3.1.min.js"></script>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/materialize.min.js"></script>

      <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/js.js"></script>
	</body>
</html>
