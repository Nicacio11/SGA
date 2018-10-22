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

      <?php if( !empty($galerias != null) ): ?>
      <div>
        <h4>Galerias</h4>
        <div class="container">
          <hr/>
          <br/><br/><br/>
        </div>
      </div>
      <table class="centered highlight tableStyle">
          <thead>
             <tr>
                 <th>Titulo</th>
                 <th>Ação</th>
             </tr>
           </thead>
          <tbody>
              <?php foreach($galerias as $galeria): ?>
              <tr>
                <td><?php echo $galeria->getTitulo(); ?></td>
                <td>
                  <a data-position="top" data-tooltip="Adicionar" href="<?php echo BASE_URL;?>galeria/adicionarFoto/<?php echo $galeria->getId();?>" class="btn green waves-effect waves-light tooltipped"><i class="material-icons">add</i></a>

                  <a data-position="top" data-tooltip="Alterar" href="<?php echo BASE_URL;?>galeria/alterar/<?php echo $galeria->getId();?>" class="btn blue waves-effect waves-light tooltipped"><i class="material-icons">edit</i></a>

                  <a data-position="top" data-tooltip="Apagar" href="javascript: excluirGaleria(<?php echo $galeria->getId();?>);" class="btn red waves-effect waves-light tooltipped"><i class="material-icons">delete</i></a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <ul class="pagination">
        <?php
            if($total_paginas!=1):
              for($q=1;$q<=$total_paginas;$q++): ?>
    				    <li class="waves-effect waves-dark <?php echo ($p==$q)?'active':''; ?>"><a href="<?php echo BASE_URL;?>galeria/painel/?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
            <?php
              endfor;
              endif;
            ?>
        </ul>
        <a class="btn green" href="<?php echo BASE_URL;?>Galeria/adicionar">Adicionar Galeria</a>
      <?php else: ?>
          <p> Nenhuma galeria adicionada</p>
          <a class="btn green" href="<?php echo BASE_URL;?>Galeria/adicionar">Adicionar Galeria</a>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php if($removido=='exist'):?>
  <script>
      alert("Removido com sucesso");
  </script>
<?php endif;?>
