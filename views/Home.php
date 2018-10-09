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
			<meta property="og:title" content="Grupo de Oração Mensageiros de Emanuel" />
			<meta property="og:description" content="Acompanhe-nos" />
			<meta property="og:image" content="<?php echo BASE_URL;?>assets/images/retiro.jpg" />


		</head>
	<body class="fadeIn">
			<?php
			require_once ( 'components/Header.php' );?>
			<div class="container">
				<div class="row">
					<div class="col m8">
						<div class="carousel carousel-slider center carouselinicio">
				      <div class="carousel-fixed-item center">
				        <a class="btn waves-effect white grey-text darken-text-2">button</a>
				      </div>
				      <div class="carousel-item white-text car"
							style="background-image:url('<?php echo BASE_URL;?>/assets/images/praying.jpg')"
								 href="#one!">

				        <h2>First Panel</h2>
				        <p class="white-text">This is your first panel</p>
				      </div>
				      <div class="carousel-item white-text car"
							style="background-image:url('<?php echo BASE_URL; ?>/assets/images/praying2.jpg')"
								  href="#two!">
				        <h2>Second Panel</h2>
				        <p class="white-text">This is your second panel</p>
							</div>
				      <div class="carousel-item car white-text"
							style="background-image:url('<?php echo BASE_URL; ?>/assets/images/praying3.jpg')"
								  href="#three!">
				        <h2>Third Panel</h2>
				        <p class="white-text">This is your third panel</p>
							</div>
				      <div class="carousel-item car white-text"
							style="background-image:url('<?php echo BASE_URL; ?>/assets/images/teste.jpg')"
								  href="#four!">
				        <h2>Fourth Panel</h2>
				        <p class="white-text">This is your fourth panel</p>
							</div>
				    </div>
					</div>

					<div class="col m4">
						<div class="reflexion">
							<div class="card-panel teal reflexao">
								<div class="reflexaoTitle">
					      	<h5>Reflexão do dia</h5>
								</div>
								<?php if( !empty($reflexao != null) ) : ?>

								<div class="reflexaoBody">
									<a class="waves-effect waves-dark modal-trigger" href="#modal1">Clique aqui</a>
									<!-- Modal Structure -->
									<div id="modal1" class="modal modal-fixed-footer" >
										<div class="">
											 <div class="modal-content" >
													<div style="text-align:left;float:left;">
												 		<h4>Title</h4>
											 		</div>
													<div style="text-align:right; color:black;">
														<h7>Data: 00/00/000</h7>
											 		</div>
													<div class="mod">
												 		<blockquote>Tomé, o incrédulo, queria ver, colocar sua mão nas feridas de Jesus, para poder acreditar que era ele mesmo. Ele colocava muitas condições para poder acreditar em Deus. Era difícil para ele acreditar no testemunho dos que tinham estado com o Senhor Ressuscitado antes dele. Jesus, no entanto, não desprezou Tomé, conhecia bem sua pequenez e até foi capaz de elogiar os que creram sem terem visto, mas quis aparecer também a ele. Hoje precisamos seguir Cristo sem colocarmos condições, mas crendo de todo o nosso coração. Deus abençoe você!</blockquote>
											 		</div>
													<div class="col s12 m4 offset-m8 right-align ">
														<div >

															<div class="row valign-wrapper">
																Postado por:

															</div>
															<div class="row valign-wrapper">
																<div class="chip">
																  <img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg" alt="Contact Person">
																  Nome Sobrenome
																</div>

															</div>
														</div>
													</div>
											 </div>
											 <div class="modal-footer">
												 <a href="#!" class="modal-close waves-effect black-text waves-green btn-flat">Fechar</a>
											 </div>
										 </div>
									 </div>

								</div>
							<?php else : ?>
								<div class="reflexaoBody">
									<p class="white-text"> Em breve </p>
								</div>
							<?php endif; ?>
							</div>

					</div>

				</div>
			</div>
		</div>
		<!-- Modal Structure -->

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
				          <span class="card-title">Atividades</span>

				        </div>
				        <div class="card-content">
				          <p>Confira todas as atividades até o Momento</p>
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

		  <div class="photos-and-video">
		  	<div class="container">
			  	<div class="row">
			  		<div class="col s12 m6 ">
			  			<h5>Ultimas Fotos</h5>

						  <div class="carousel carousel-slider">
						    <a class="carousel-item" href="#one!"><img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg"></a>
						    <a class="carousel-item" href="#two!"><img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg"></a>
						    <a class="carousel-item" href="#three!"><img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg"></a>
						    <a class="carousel-item" href="#four!"><img src="<?php echo BASE_URL; ?>/assets/images/gg.jpg"></a>

						  </div>
							<br/>
	            <div class="row">
	              <div class="col s6 center-align">
	                <button class="waves-effect waves-light btn-small left-align btn-color-linear" onclick="prev()" ><i class="small material-icons left-align">navigate_before</i></button>
	              </div>
	              <div class="col s6 center-align">
	                <button class="waves-effect waves-light btn-small right-align btn-color-linear" onclick="next()"><i class="small material-icons left-align">navigate_next</i></button>
	              </div>
	            </div>
							<br/>
							<div class="vermais">
								<a href="#" class="waves-effect waves-dark">Ver mais...</a>
							</div>
			  		</div>

			  		<div class="col s12 m6">
				  			<h5>Ultimo Vídeo</h5>
				  			<br/>
				  			<br/>
								<?php if(!empty($video)) :?>
									<div class="video-container">
										<iframe class="responsive-video" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen
											src="<?php echo $video->getVideoPath(); ?>">
										</iframe>
									</div>
									<br/>
									<div class="vermais">
										<a href="#" class="waves-effect waves-dark">Ver mais...</a>
									</div>
								<?php else :?>
									<div class="row">
										<div class="col m12 center-align">
											<p class="white-text">Em breve serão disponibilizados alguns videos :)</p>
										</div>
									</div>
								<?php endif ;?>

			  		</div>
			  	</div>
		  	</div>
		  </div>
		<?php if($erro == 'exist'):?>
		<script>
			alert("Não foi possivel enviar");
		</script>
		<?php endif; ?>
		<?php if($erro == 'nonexist') :?>
			<script>
				alert("Enviado com sucesso!");
				<?php endif; ?>
			</script>
		<?php require_once ('components/Footer.php'); ?>
	  <!--JQuery-->
      <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery-3.3.1.min.js"></script>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/materialize.min.js"></script>

      <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/js.js"></script>
	</body>
</html>
