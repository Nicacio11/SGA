<!DOCTYPE html>
<html>
	<head>
		<title>Mensageiros de Emanuel</title>
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
		  <nav class="white">
		  	<div class="container">
					    <div class="nav-wrapper">
					      <a href="#!" class="brand-logo change">Mensageiros de Emanuel</a>
					      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons change">menu</i></a>
					      <ul class="right hide-on-med-and-down">
									<li><a href="#" class="waves-effect waves-light change">Ministérios</a></li>
									<li><a href="#" class="waves-effect waves-light change">Atividades</a></li>
									<li><a href="#" class="waves-effect waves-light change">Pedidos de Oração</a></li>
									<li><a href="#" class="waves-effect waves-light change">Reflexões</a></li>
									<li><a href="#" class="waves-effect waves-light change">Contato</a></li>
									<!-- Menu Dropdown -->
									  <a class='dropdown-trigger waves-effect waves-light menud' href='#' data-target='dropdown1'><i class="material-icons change">menu</i></a>
									  <!-- Dropdown Structure -->
									  <ul id='dropdown1' class='dropdown-content'>
									    <li><a href="#!">Galerias de Fotos</a></li>
									    <li><a href="#!">Vídeos</a></li>
									    <li class="divider" tabindex="-1"></li>
									    <li><a href="#!">Testemunhos</a></li>

											<li><a href="#" class="waves-effect waves-light">Quem Somos</a></li>
									  </ul>
					      </ul>
					    </div>

					  <ul class="sidenav" id="mobile-demo">
							<li><a href="#" class="waves-effect waves-light">Ministérios</a></li>
							<li><a href="#" class="waves-effect waves-light">Atividades</a></li>
							<li><a href="#" class="waves-effect waves-light">Pedidos de Oração</a></li>
							<li><a href="#" class="waves-effect waves-light">Reflexões</a></li>
							<li><a href="#" class="waves-effect waves-light">Contato</a></li>
							<li><a href="#!" class="waves-effect waves-light">Galerias de Fotos</a></li>
							<li><a href="#!" class="waves-effect waves-light">Vídeos</a></li>
							<li><a href="#!" class="waves-effect waves-light">Testemunhos</a></li>

							<li><a href="#" class="waves-effect waves-light">Quem Somos</a></li>
					  </ul>


		    </div>
		  </nav>
		<div>
			<div class="slider">
			    <ul class="slides ">
			      <li>
			        <img src="<?php echo BASE_URL; ?>/assets/images/vida.jpg" class="imgimg"> <!-- random image -->
			        <div class="caption center-align">
			          <h3 class="text-black">Todos pela vida!</h3>
			          <h5 class="light grey-text text-lighten-3 text-black">A favor da vida.</h5>
			        </div>
			      </li>
			      <li>
			        <img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg"> <!-- random image -->
			        <div class="caption left-align">
			          <h3>Left Aligned Caption</h3>
			          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
			        </div>
			      </li>
			      <li>
			        <img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg"> <!-- random image -->
			        <div class="caption right-align">
			          <h3>Right Aligned Caption</h3>
			          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
			        </div>
			      </li>
			      <li>
			        <img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg"> <!-- random image -->
			        <div class="caption center-align">
			          <h3>This is our big Tagline!</h3>
			          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
			        </div>
			      </li>
			    </ul>
			  </div>
		</div>
	  <div class="about">
	  	 <div class="container">
		  	<div class="aboutus">
	  		  <h3>Sobre Nós</h3><br/><br/><br/>
			  <div class="row">
			    <div class="col m3">
			      <div class="card">
			        <div class="card-image">
			          <img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg">
			          <span class="card-title">Ministérios</span>

			        </div>
			        <div class="card-content">
			          <p>Ministérios</p>
			        </div>
			      </div>
			    </div>
			    <div class="col m3">
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
			    <div class="col m3">
			      <div class="card">
			        <div class="card-image">
			          <img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg">
			          <span class="card-title">Pedido de Oração</span>

			        </div>
			        <div class="card-content">
			          <p>Faça seu pedido de oração</p>
			        </div>
			      </div>
			    </div>
			    <div class="col m3">
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

      <div class="activities">
      	<div class="container">
      		<h3>Ultimas Atividades</h3><br/><br/><br/>
      		<div class="row">
			    <div class="col m3">
			    	<img class="responsive-img img-thumbnail" src="<?php echo BASE_URL; ?>/assets/images/gg.jpg">
			        <a class="waves-effect waves-dark activities-link">
			        	Festa da Divina Miséricordia
			        </a>


			    </div>
			    <div class="col m3">
			    	<img class="responsive-img img-thumbnail" src="<?php echo BASE_URL; ?>/assets/images/gg.jpg">
			        <a class="waves-effect waves-dark activities-link">
			        	Exaltação da Santa Cruz
			        </a>
			    </div>
			    <div class="col m3">
			    	<img class="responsive-img img-thumbnail" src="<?php echo BASE_URL; ?>/assets/images/gg.jpg">
			        <a class="waves-effect waves-dark activities-link">
			        	Festa da Divina Miséricordia
			        </a>
			    </div>
			    <div class="col m3">
			    	<img class="responsive-img img-thumbnail" src="<?php echo BASE_URL; ?>/assets/images/gg.jpg">
			        <a class="waves-effect waves-dark activities-link">
			        	Festa da Divina Miséricordia
			        </a>
			    </div>
			  </div>
      	 </div>
	  </div>
	  <div class="reflexion">
	  	<div class="container">
		    <div class="col s12 m5">
		      <div class="card-panel teal reflexao">
		      	<h5>Ultima Reflexão</h5>
		      	<div class="row">

		      		<div class="col m12">

		      			<blockquote>Tomé, o incrédulo, queria ver, colocar sua mão nas feridas de Jesus, para poder acreditar que era ele mesmo. Ele colocava muitas condições para poder acreditar em Deus. Era difícil para ele acreditar no testemunho dos que tinham estado com o Senhor Ressuscitado antes dele. Jesus, no entanto, não desprezou Tomé, conhecia bem sua pequenez e até foi capaz de elogiar os que creram sem terem visto, mas quis aparecer também a ele. Hoje precisamos seguir Cristo sem colocarmos condições, mas crendo de todo o nosso coração. Deus abençoe você!
				        </blockquote>
				        <h6 class="right-align">Tomé o Incrédulo</h6>
		      		</div>
		      	</div>

		      </div>
		    </div>
	  	</div>
	  </div>

	  <div class="photos-and-video">
	  	<div class="container">
		  	<div class="row">
		  		<div class="col s12 m6">
		  			<h5>Ultimas Fotos</h5>

					  <div class="carousel carousel-slider">
					    <a class="carousel-item" href="#one!"><img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg"></a>
					    <a class="carousel-item" href="#two!"><img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg"></a>
					    <a class="carousel-item" href="#three!"><img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg"></a>
					    <a class="carousel-item" href="#four!"><img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg"></a>

					  </div>
						<br/>
						<button class="waves-effect waves-light btn-small left-align" onclick="prev()" ><i class="small material-icons left-align">navigate_before</i></button>
						<button class="waves-effect waves-light btn-small right-align" onclick="next()"><i class="small material-icons left-align">navigate_next</i></button>
						<br/>
						<div class="vermais">
							<a href="#" class="waves-effect waves-dark">Ver mais...</a>
						</div>
		  		</div>

		  		<div class="col s12 m6">
			  			<h5>Ultimo Vídeo</h5>
			  			<br/>
			  			<br/>
						<iframe class="responsive-video"
							src="https://www.youtube.com/embed/0174tYEZnnA">
						</iframe>
						<br/>
						<div class="vermais">
							<a href="#" class="waves-effect waves-dark">Ver mais...</a>
						</div>
		  		</div>
		  	</div>
	  	</div>
	  </div>
		<footer class="page-footer green" >
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">Contato</h5>
						<p class="grey-text text-lighten-4">Email: testeWteste.com</p>
						<blockquote style="border-color:#fff;">
							“Vocês, Renovação Carismática, receberam um grande presente do Senhor. Vocês nasceram de um desejo do Espírito Santo como “uma corrente de graça” na Igreja e para a Igreja. É isto que os define: “uma corrente de graça”."Papa Francisco"
						</blockquote>
					</div>
					<div class="col l4 offset-l2 s12">
						<h5 class="white-text">Siga-nos</h5>
						<ul>
							<li><a class="green-text text-lighten-3" href="#!">Facebook</a></li>
							<li><a class="green-text text-lighten-3" href="#!">Twitter</a></li>
							<li><a class="green-text text-lighten-3" href="#!">Linkedin</a></li>
							<li><a class="green-text text-lighten-3" href="#!">Instagram</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
				© 2018 Copyright Text
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
