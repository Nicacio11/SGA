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

      <?php if( !empty($reflexoes != null) ): ?>
      <div>
        <h4>Reflexões</h4>
        <div class="container">
          <hr/>
          <br/><br/><br/>
        </div>
      </div>
      <table class="centered highlight tableStyle">
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
                  <a data-position="top" data-tooltip="Alterar" href="<?php echo BASE_URL;?>reflexao/alterar/<?php echo $reflexao->getId();?>" class="btn tooltipped blue waves-effect waves-light"><i class="material-icons">edit</i></a>
                  
                  <a <a data-position="top" data-tooltip="Apagar" href="javascript: excluirReflexao(<?php echo $reflexao->getId();?>);" class="btn tooltipped red waves-effect waves-light"><i class="material-icons">delete</i></a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <ul class="pagination">
        <?php
            if($total_paginas!=1):
              for($q=1;$q<=$total_paginas;$q++): ?>
    				    <li class="waves-effect waves-dark <?php echo ($p==$q)?'active':''; ?>"><a href="<?php echo BASE_URL;?>reflexao/painel/?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
            <?php
              endfor;
              endif;
            ?>
        </ul>
        <a class="btn green" href="<?php echo BASE_URL;?>Reflexao/adicionar">Adicionar Reflexao</a>
      <?php else: ?>
          <p> Nenhuma reflexão adicionada</p>
          <a class="btn green" href="<?php echo BASE_URL;?>Reflexao/adicionar">Adicionar Reflexao</a>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php if($removido=='exist'):?>
  <script>
      alert("Removido com sucesso");
  </script>
<?php endif;?>
