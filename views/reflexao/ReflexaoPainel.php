<div class="painelInterno2">
  <div class="container">
    <div>
      <?php if( !empty($reflexoes != null) ): ?>
        <table class="centered striped">
          <thead>
             <tr>
                 <th>Titulo</th>
                 <th>Data</th>
                 <th>Ação</th>
             </tr>
           </thead>
          <tbody>
              <?php foreach($reflexoes as $reflexao): ?>
              <tr>
                <td><?php echo $reflexao->getTitulo(); ?></td>
                <td><?php echo $reflexao->getData(); ?></td>
                <td>
                  <a href="<?php echo BASE_URL;?>reflexao/editar/<?php echo $reflexao->getId();?>" class="btn blue waves-effect waves-light">Alterar</a>
                  |
                  <a href="javascript: excluirReflexao(<?php echo $reflexao->getId();?>);" class="btn red waves-effect waves-light">Apagar</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <ul class="pagination">
            <?php for($q=1;$q<=$total_paginas;$q++): ?>
    				<li class="<?php echo ($p==$q)?'active':''; ?>"><a href="<?php echo BASE_URL;?>Reflexao/index.php?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
    				<?php endfor; ?>
          </ul>
        <a class="btn green" href="<?php echo BASE_URL;?>Reflexao/adicionar">Adicionar Reflexao</a>
      <?php else: ?>
          <p> Nenhuma reflexão adicionada</p>
          <a class="btn green" href="<?php echo BASE_URL;?>Reflexao/adicionar">Adicionar Reflexao</a>
      <?php endif; ?>
    </div>
  </div>
</div>
