<div class="painelInterno2">
  <div class="container">

    <div>
      <?php if($sucesso=='exist'):?>
        <div class="sucesso">
          Cadastrado com sucesso!
        </div>
      <?php endif;?>
      <?php if($alterado=='exist'):?>
        <div class="sucesso">
          Modificado com sucesso!
        </div>
      <?php endif;?>
      <?php if( !empty($usuarios != null) ): ?>
      <div>
        <h4>Usuários</h4>
        <div class="container">
          <hr/>
          <br/><br/><br/>
        </div>
      </div>
        <table class="centered highlight tableStyle">
          <thead>
             <tr>
                 <th>Login</th>
                 <th>Nome</th>
                 <th>Status</th>
                 <th>Ação</th>
             </tr>
           </thead>
          <tbody>
              <?php foreach($usuarios as $usuario): ?>
              <tr>
                <td><?php echo $usuario->getUsuario(); ?></td>
                <td><?php echo $usuario->getNome(); ?></td>
                <td><?php echo $usuario->getActive() < 2 ? (($usuario->getActive() == 0) ? "Desativado" : "Normal") : "Admin" ?></td>
                <td>
                  <a data-position="top" data-tooltip="Alterar" href="<?php echo BASE_URL;?>usuario/alterar/<?php echo $usuario->getId();?>" class="btn blue waves-effect waves-light tooltipped"><i class="material-icons">edit</i></a>

                  <a data-position="top" data-tooltip="Apagar" href="javascript: desativarUsuario(<?php echo $usuario->getId();?>);" class="btn red waves-effect waves-light tooltipped"><i class="material-icons">delete</i></a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <ul class="pagination">

            <?php
            if($total_paginas!=1):
              for($q=1;$q<=$total_paginas;$q++): ?>
    				    <li class="waves-effect waves-dark <?php echo ($p==$q)?'active':''; ?>"><a href="<?php echo BASE_URL;?>usuario/painel/?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
            <?php
              endfor;
              endif;
            ?>
        </ul>
        <a class="btn green" href="<?php echo BASE_URL;?>usuario/adicionar">Adicionar usuario</a>
      <?php else: ?>
          <p> Nenhum usuario adicionado</p>
          <a class="btn green" href="<?php echo BASE_URL;?>usuario/adicionar">Adicionar usuario</a>
      <?php endif; ?>
    </div>
  </div>
</div>
