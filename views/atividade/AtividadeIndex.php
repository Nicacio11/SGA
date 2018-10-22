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


		</head>
	<body class="fadeIn">
		<?php
		require_once ( 'views/components/Header.php' );?>
		
		<div class="container">
			<h2>Atividades</h2>
			<hr/>
			<br/>
			<br/>
			<br/>
			<div class="row">
				
					    <?php if(!empty($atividades)):?>
					    	<form>
								<div class="container">
									<div class="input-field col s12 m8">
								      <input id="procurar" name="procurar" type="search" required class="validate">
								      <label class="active" for="procurar">Filtrar Atividade</label>
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
							<?php foreach($atividades as $atividade): ?>
				                 <div class="col s12 m12">
								    <div class="card horizontal">
								      <div class="card-image">
								        <img style="width: 100px;height: 125px;" src="<?php echo BASE_URL;?>assets/images/atividades/<?php echo $atividade->getImage()->getImagePath();?>">
								      </div>
								      <div class="card-stacked">
								        <div class="card-content" style="word-wrap: break-word;">
								          <p><?php echo substr($atividade->getDescricao(), 0,50); ?>.</p>
								        </div>
								        <div class="card-action">
								          <a href="<?php echo BASE_URL?>atividade/AtividadeDetails/<?php echo $atividade->getId();?>"><?php echo $atividade->getTitulo(); ?></a>
								          <p style="display: inline-block">Data: <?php echo $atividade->getData();?></p>
								        </div>
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
						    				    <li class="waves-effect waves-dark <?php echo ($p==$q)?'active':''; ?>"><a href="<?php echo BASE_URL;?>atividade/index/?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
						         <?php
						              endfor;
						              endif;
						            ?>
						        </ul> 	
				            </div>
					       
						<?php else:?>
							<div class="center-align">
								<p class="black-text">Em breve teremos atividades</p>							
							</div>
						<?php endif;?>  
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
