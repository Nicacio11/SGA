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

      <?php if( !empty($atividades != null) ): ?>
      <div>
        <h4>Atividades</h4>
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
              <?php foreach($atividades as $atividade): ?>
              <tr>
                <td><?php echo $atividade->getTitulo(); ?></td>
                <td><?php echo $atividade->getData(); ?></td>
                <td>
                  <a data-position="top" data-tooltip="Alterar" href="<?php echo BASE_URL;?>atividade/alterar/<?php echo $atividade->getId();?>" class="btn tooltipped blue waves-effect waves-light"><i class="material-icons">edit</i></a>
                  
                  <a data-position="top" data-tooltip="Apagar" href="javascript: excluirAtividade(<?php echo $atividade->getId();?>);" class="btn tooltipped red waves-effect waves-light"><i class="material-icons">delete</i></a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <ul class="pagination">
        <?php
            if($total_paginas!=1):
              for($q=1;$q<=$total_paginas;$q++): ?>
    				    <li class="waves-effect waves-dark <?php echo ($p==$q)?'active':''; ?>"><a href="<?php echo BASE_URL;?>atividade/painel/?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
            <?php
              endfor;
              endif;
            ?>
        </ul>
        <a class="btn green" href="<?php echo BASE_URL;?>Atividade/adicionar">Adicionar Atividade</a>
      <?php else: ?>
          <p> Nenhuma atividade adicionada</p>
          <a class="btn green" href="<?php echo BASE_URL;?>Atividade/adicionar">Adicionar Atividade</a>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php if($removido=='exist'):?>
  <script>
      alert("Removido com sucesso");
  </script>
<?php endif;?>
