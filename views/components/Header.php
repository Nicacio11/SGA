<nav class="white">
  <div class="container">
        <div class="nav-wrapper">

          <a href="<?php echo BASE_URL;?>Home" class="waves-effect waves-dark change">Mensageiros de Emanuel</a>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons change">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="<?php echo BASE_URL;?>Atividade" class="waves-effect waves-light change">Atividades</a></li>
            <li><a href="#pedido" class="waves-effect waves-light change seletor-ancora">Pedido de Oração</a></li>
            <li><a href="<?php echo BASE_URL;?>Reflexao" class="waves-effect waves-light change">Reflexões</a></li>
            <li><a href="#pedido" class="waves-effect waves-light change seletor-ancora">Contato</a></li>
              <a class='dropdown-trigger waves-effect waves-light menud' href='#' data-target='dropdown1'><i class="material-icons change">menu</i></a>
              <!-- Dropdown Structure -->
              <ul id='dropdown1' class='dropdown-content'>
                <li><a href="<?php echo BASE_URL;?>Galeria" class="waves-effect waves-light">Galerias de Fotos</a></li>
                <li><a href="<?php echo BASE_URL;?>video" class="waves-effect waves-light">Vídeos</a></li>
                <li><a href="<?php echo BASE_URL;?>Testemunho" class="waves-effect waves-light">Testemunhos</a></li>
                <li class="divider" tabindex="-1"></li>
                <li>
                  <a href="<?php echo BASE_URL;?>Usuario" class="waves-effect waves-light">
                  <i class="material-icons" style="margin-right:3px;">lock</i>
                  Área de login
                </a></li>
              </ul>
          </ul>
        </div>

      <ul class="sidenav" id="mobile-demo">
        <li><a href="<?php echo BASE_URL;?>Atividade" class="waves-effect waves-light">Atividades</a></li>
        <li><a href="#ped" class="waves-effect waves-light seletor-ancora">Pedidos de Oração</a></li>
        <li><a href="<?php echo BASE_URL;?>Reflexao" class="waves-effect waves-light">Reflexões</a></li>
        <li><a href="#pedido" class="waves-effect waves-light seletor-ancora">Contato</a></li>
        <li><a href="<?php echo BASE_URL;?>Galeria" class="waves-effect waves-light">Galerias de Fotos</a></li>
        <li><a href="#!" class="waves-effect waves-light">Vídeos</a></li>
        <li><a href="<?php echo BASE_URL;?>Testemunho" class="waves-effect waves-light">Testemunhos</a></li>
        <li><a href="<?php echo BASE_URL;?>Usuario" class="waves-effect waves-light">
          <i class="material-icons" >lock</i> 
          Área de login</a>
        </li>
      </ul>


  </div>
</nav>
