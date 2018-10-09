<div class="painel fadeIn">
  <div class="container">
    <div class="panel">
      <div class="painelInterno2 card-panel carousel-background">
      <h4 class="center-align"> Olá <?php echo $nome;?>,
        A Paz!
      </h4>
      <div class="right-align">
        <img class="right-align resposnive-img pessoa img-thumbnail" src=<?php echo BASE_URL;?>assets/images/usuarios/<?php echo $imagem;?> </img>
      </div>
      <p class="right-align"> Antes de postar ou fazer alguma alteração faça essa oração
        <i class="material-icons">arrow_downward</i>
      </p>
        <blockquote>
          “Vinde, Espírito Santo!
          Enchei os corações dos Vossos fiéis e acendei neles o fogo do Vosso amor.
          Enviai o Vosso Espírito, e tudo será criado.
          E renovareis a face da Terra.
          Deus, que instruístes os corações dos Vossos fiéis com a luz do Espírito Santo, fazei que apreciemos retamente
          todas as coisas segundo o mesmo Espírito e gozemos sempre da Sua consolação.
          Por Cristo, Senhor Nosso.
          Amém.”
        </blockquote>
        <?php if(unserialize($_SESSION['usuario'])->getActive()==2):?>
         <div class="center-align">
           <a class="waves-effect waves-light btn carousel-background" href=<?php echo BASE_URL;?>usuario/painel>Painel de Usuarios</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
