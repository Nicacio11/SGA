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
			<meta property="og:image" content="<?php echo BASE_URL;?>assets/images/retiro" />

			<script src="http://js.api.here.com/v3/3.0/mapsjs-core.js"
			  type="text/javascript" charset="utf-8"></script>
			<script src="http://js.api.here.com/v3/3.0/mapsjs-service.js"
			  type="text/javascript" charset="utf-8"></script>
		</head>
	<body class="fadeIn">
			<?php
			require_once ( 'components/Header.php' );?>
			<div>
				<div class="container">
					<div class="row">
						<div class="col s12 m8">

							<?php if(!empty($atividades)):?>
							<div class="carousel carousel-slider center carouselinicio">
						      <?php foreach ($atividades as $atividade): ?>
						      	<a href="<?php echo BASE_URL;?>Atividade/AtividadeDetails/<?php echo $atividade->getId();?>"><div class="carousel-item white-text car"
									style="background-image:url('<?php echo BASE_URL;?>/assets/images/atividades/<?php echo $atividade->getImage()->getImagePath();?>')"
										 href="#one!">

						       <!-- <h2 
						        style="
						        background-color: lightgreen;display: 
						        inline-block;border-radius;5px;
						        "><?php echo $atividade->getTitulo();?></h2> ->
						        <!--<div class="container" style="white-space: normal;overflow: hidden;text-overflow: ellipsis; word-wrap: break-word;">
							        <p class="white-text" style="white-space: normal"><?php echo substr($atividade->getDescricao(), 0,350);?>...</p>
						        </div>-->
						      </div></a>
						      <?php endforeach ;?>
					    	</div>
					    </div>
					    	<?php else:?>
						    		<div class="carousel carousel-slider center carouselinicio">
								      <div class="carousel-item black-text car"
											style="background-image:url('<?php echo BASE_URL;?>/assets/images/praying.jpg')"
												 href="#one!">
								        <h1>Bem vindo</h1>
								        <p class="black-text">Em breve teremos atividades</p>
								      </div>
								  	</div>
					    </div>

					    	<?php endif;?>
						<div class="col s12 m4">
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
													 		<h4><?php echo  $reflexao->getTitulo()?></h4>
												 		</div>
														<div style="text-align:right; color:black;">
															<h7>Data: <?php echo date('d/m/Y \à\s H:i:s', strtotime($reflexao->getData())) ;?></h7>
												 		</div>
														<div class="mod" style="word-wrap: break-word;">
													 		<blockquote><?php echo $reflexao->getCorpo();?></blockquote>
												 		</div>
														<div class="col s12 m4 offset-m8 right-align ">
															<div >

																<div class="row valign-wrapper">
																	Postado por:

																</div>
																<div class="row valign-wrapper">
																	<div class="chip">
																	  <img src="<?php echo BASE_URL; ?>/assets/images/usuarios/<?php echo $reflexao->getUsuario()->getImage()->getImagePath();?>"
																	  alt="Contact Person">
																	  <?php echo $reflexao->getUsuario()->getNome();?>
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
	<!--</div>-->
		<!-- Modal Structure -->

		</div>

		  <div class="about">
		  	 <div class="container">
			  	<div class="aboutus">
		  		  <h3>Sobre Nós</h3><br/><br/><br/>
				  <div class="row">
				    <div class="col m4">
				      <div class="card">
				        <div class="card-image">
				          <img  style="max-height: 150px" src="<?php echo BASE_URL; ?>/assets/images/praying3.jpg">
				          <span class="card-title">Atividades</span>

				        </div>
				        <div class="card-content">
				          <p>Confira todas as atividades</p>
				        </div>
				      </div>
				    </div>
				    <div class="col m4">
				      <div class="card">
				        <div class="card-image">
				          <img style="max-height: 150px" src="<?php echo BASE_URL; ?>/assets/images/pedido.jpg">

				        </div>
				        <div class="card-content">
				          <p>Faça seu pedido de oração</p>
				        </div>
				      </div>
				    </div>
				    <div class="col m4">
				      <div class="card">
				        <div class="card-image">
				          <img style="max-height: 150px" src="<?php echo BASE_URL; ?>/assets/images/reflexao.png">

				        </div>
				        <div class="card-content">
				          <p>Confira todas as reflexões</p>
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
			  			<?php if (!empty($galeria->getImages())):?>
						  <div class="carousel carousel-slider">
						  	<?php foreach($galeria->getImages() as $im):?>
						    	<a class="carousel-item" href="<?php echo $im->getId();  ?>"><img src="<?php echo BASE_URL; ?>/assets/images/galerias/<?php echo $im->getImagePath();?>" class="img-responsive"></a>
						 	<?php endforeach;?>
						  </div><br/>
						
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
								<a href="<?php echo BASE_URL ;?>galeria" class="waves-effect waves-dark">Ver mais...</a>
							</div>
					<?php else :?>
						<div class="row">
							<div class="col m12 center-align">
								<p class="white-text">Em breve serão disponibilizados algumas fotos :)</p>
							</div>
						</div>
					<?php endif ;?>
						<br/>
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
										<a href="<?php echo BASE_URL ;?>video" class="waves-effect waves-dark">Ver mais...</a>
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
