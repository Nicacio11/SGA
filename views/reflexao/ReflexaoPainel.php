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
                <td><a class="btn blue waves-effect waves-light">Alterar</a> | <a class="btn red waves-effect waves-light">Apagar</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <a class="btn green" href="<?php BASE_URL?>Reflexao/adicionar">Adicionar Reflexao</a>
      <?php else: ?>
          <p> Nenhuma reflexão adicionada</p>
          <a class="btn green" href="<?php BASE_URL?>Reflexao/adicionar">Adicionar Reflexao</a>
      <?php endif; ?>
    </div>
  </div>
</div>
