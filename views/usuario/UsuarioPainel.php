<div class="painelInterno2">
  <div class="container">
    <div>
      <?php if( !empty($usuarios != null) ): ?>
        <table class="centered highlight">
          <thead>
             <tr>
                 <th>Login</th>
                 <th>Nome</th>
                 <th>Ativo</th>
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
                  <a href="<?php echo BASE_URL;?>usuario/edit/<?php echo $usuario->getId();?>" class="btn blue waves-effect waves-light">Alterar</a>
                  |
                  <a href="javascript: desativarUsuario(<?php echo $usuario->getId();?>);" class="btn red waves-effect waves-light">Desativar</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <ul class="pagination">
            <?php for($q=1;$q<=$total_paginas;$q++): ?>
    				<li class="waves-effect waves-dark <?php echo ($p==$q)?'active':''; ?>"><a href="<?php echo BASE_URL;?>usuario/painel/?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
    				<?php endfor; ?>
        </ul>
        <a class="btn green" href="<?php echo BASE_URL;?>usuario/adicionar">Adicionar usuario</a>
      <?php else: ?>
          <p> Nenhum usuario adicionado</p>
          <a class="btn green" href="<?php echo BASE_URL;?>usuario/adicionar">Adicionar usuario</a>
      <?php endif; ?>
    </div>
  </div>
</div>
$usuario->getActive() < 2 ? ((total = 0) ? "Desativado" : "Normal") : "Admin";
