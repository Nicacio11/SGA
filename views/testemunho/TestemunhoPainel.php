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

      <?php if( !empty($testemunhos != null) ): ?>
      <div>
        <h4>Testemunhos</h4>
        <div class="container">
          <hr/>
          <br/><br/><br/>
        </div>
      </div>
      <table class="centered highlight tableStyle">
          <thead>
             <tr>
                 <th>Nome</th>
                 <th>Email</th>
                 <th>Adicionado por</th>
                 <th>Ação</th>
             </tr>
           </thead>
          <tbody>
              <?php foreach($testemunhos as $testemunho): ?>
              <tr>
                <td><?php echo $testemunho->getNome(); ?></td>
                <td><?php echo $testemunho->getEmail(); ?></td>
                <td><?php echo $testemunho->getUsuario()->getNome(); ?></td>

                <td>
                  <a data-position="top" data-tooltip="Alterar" href="<?php echo BASE_URL;?>testemunho/alterar/<?php echo $testemunho->getId();?>" class="btn blue waves-effect waves-light tooltipped"><i class="material-icons">edit</i></a>

                  <a data-position="top" data-tooltip="Apagar" href="javascript: excluirTestemunho(<?php echo $testemunho->getId();?>);" class="btn red waves-effect waves-light tooltipped"><i class="material-icons">delete</i></a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <ul class="pagination">
        <?php
            if($total_paginas!=1):
              for($q=1;$q<=$total_paginas;$q++): ?>
    				    <li class="waves-effect waves-dark <?php echo ($p==$q)?'active':''; ?>"><a href="<?php echo BASE_URL;?>testemunho/painel/?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
            <?php
              endfor;
              endif;
            ?>
        </ul>
        <a class="btn green" href="<?php echo BASE_URL;?>testemunho/adicionar">Adicionar Testemunho!</a>
      <?php else: ?>
          <p> Nenhum testemunho adicionado</p>
          <a class="btn green" href="<?php echo BASE_URL;?>testemunho/adicionar">Adicionar Testemunho!</a>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php if($removido=='exist'):?>
  <script>
      alert("Removido com sucesso");
  </script>
<?php endif;?>
