<div class="painelInterno2">
  <div class="container">
    <div>
      <?php if( !empty($testemunhos != null) ): ?>
        <table class="centered highlight">
          <thead>
             <tr>
                 <th>Nome</th>
                 <th>Email</th>
                 <th>Ação</th>
             </tr>
           </thead>
          <tbody>
              <?php foreach($testemunhos as $testemunho): ?>
              <tr>
                <td><?php echo $testemunho->getEmail(); ?></td>
                <td><?php echo $testemunho->getData(); ?></td>
                <td>
                  <a href="<?php echo BASE_URL;?>testemunho/editar/<?php echo $testemunho->getId();?>" class="btn blue waves-effect waves-light">Alterar</a>
                  |
                  <a href="javascript: excluirtestemunho(<?php echo $testemunho->getId();?>);" class="btn red waves-effect waves-light">Apagar</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <ul class="pagination">
            <?php for($q=1;$q<=$total_paginas;$q++): ?>
    				<li class="waves-effect waves-dark <?php echo ($p==$q)?'active':''; ?>"><a href="<?php echo BASE_URL;?>testemunho/index.php?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
    				<?php endfor; ?>
        </ul>
        <a class="btn green" href="<?php echo BASE_URL;?>testemunho/adicionar">Adicionar Testemunho!</a>
      <?php else: ?>
          <p> Nenhum testemunho adicionado</p>
          <a class="btn green" href="<?php echo BASE_URL;?>testemunho/adicionar">Adicionar Testemunho!</a>
      <?php endif; ?>
    </div>
  </div>
</div>
