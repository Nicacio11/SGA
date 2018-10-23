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
			<meta property="og:image" content="<?php echo BASE_URL;?>assets/images/praying.jpg" />
			<meta property="og:url" content="<?php echo BASE_URL?>galeria" />
			<meta property="og:title" content="Galeria" />
			<meta property="og:description" content="Galeria de foto de momentos" />
			<script src="http://js.api.here.com/v3/3.0/mapsjs-core.js"
  type="text/javascript" charset="utf-8"></script>
<script src="http://js.api.here.com/v3/3.0/mapsjs-service.js"
  type="text/javascript" charset="utf-8"></script>
		</head>
	<body class="fadeIn">
		<?php
		require_once ( 'views/components/Header.php' );?>
		
		<div class="container">
			<h2>Galerias</h2>
			<hr/>
			<br/>
			<br/>
			<br/>
			<div class="row">
				
					    <?php if(!empty($galerias)):?>
							<form>
								<div class="container">
									<div class="input-field col s12 m8">
								      <input id="procurar" name="procurar" type="search" required class="validate" placeholder="Digite o titulo">
								      <label class="active" for="procurar">Filtrar Galeria</label>
								    </div>
								    <div class="input-field col s12 m4">
								      <input type="submit" value="Pesquisar" class="btn">
								    </div>
							</form>
								    <br>
								    <br>
								    <br/>
							        <br/>
							        <br/><br/>
							       </div>
							<?php foreach($galerias as $galeria): ?>
								<div >
									<div style="margin-bottom: 70px;
					    				
									    border-radius: .3rem;
									    padding-top: 30px;
									    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2); ">
									 <h5 class="center-align"><?php echo $galeria->getTitulo()?></h5>
										
							<div class="carousel carousel-slider center carouselinicio">
						      <?php foreach ($galeria->getImages() as $g): ?>
						      	<div class="carousel-item white-text car"
									style="background-image:url('<?php echo BASE_URL;?>/assets/images/galerias/<?php echo $g->getImagePath();?>')"
										 href="#one!">

						        
						      </div>
						      <?php endforeach; ?>
							</div>
					    	
					    	</div>
								</div>
				                 
				            <?php endforeach; ?>
				            <br/>
				            <br/>
				            <div class="container" style="text-align: center;">
					           <ul class="pagination">
						        <?php
						            if($total_paginas!=1):
						              for($q=1;$q<=$total_paginas;$q++): ?>
						    				    <li class="waves-effect waves-dark <?php echo ($p==$q)?'active':''; ?>"><a href="<?php echo BASE_URL;?>galeria/index/?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
						         <?php
						              endfor;
						              endif;
						            ?>
						        </ul> 	
				            </div>
					       
						<?php else:?>
							<div class="center-align">
								<p class="black-text">Não foi encontrado galerias</p>							
							</div>
						<?php endif;?>  
				    

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
