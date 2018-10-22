<div class="painelInterno2">
  <div class="container">
    <div class="row">
      <div class="col s12 offset-2 m8 offset-m2 card-panel green accent-2">
      <?php if($erro=='exist'):?>
        <div class="erro">
          Problema ao cadastrar!
        </div>
      <?php endif;?>
        <h5>Adicionar Galeria</h5>
        <div class="formAlign">
          <form id="galeriaedit" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col offset-m2 m8 offset-m2">
                <input value="<?php echo $galeria->getTitulo();?>" required id="tituloeg" name="tituloeg" type="text" autocomplete="off" class="novalidate text-white">
                <label for="titulo">Titulo</label>
              </div>

            </div>
            <input type="submit" value="Atualizar" class="btn teal-2"><br/><br/>
          </form>
        </div>
      </div>
    </div>
    <?php if( !empty($fotos != null) ): ?>
      <br/><br/><br/>

    <table class="centered highlight tableStyle">
        <thead>
           <tr>
               <th>Foto</th>
               <th>Ação</th>
           </tr>
         </thead>
        <tbody>
            <?php foreach($fotos as $foto): ?>
            <tr>
              <td>
                <img class="responsive-img" style="width:50px;" src="<?php echo BASE_URL;?>assets/images/galerias/<?php echo $foto->getImagePath(); ?>">
              </td>
              <td>

                <a data-position="top" data-tooltip="Alterar" class="btn blue waves-effect waves-light tooltipped moda" href="<?php echo BASE_URL;?>galeria/alterarFoto/<?php echo $galeria->getId(); ?>/<?php echo $foto->getId();?>" ><i class="material-icons">edit</i></a>

                <a data-position="top" data-tooltip="Apagar" href="javascript: excluirFoto(<?php echo $galeria->getId(); ?>,<?php echo $foto->getId();?>);" class="btn red waves-effect waves-light tooltipped"><i class="material-icons">delete</i></a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <ul class="pagination">
      <?php
          if($total_paginas!=1):
            for($q=1;$q<=$total_paginas;$q++): ?>
              <li class="waves-effect waves-dark <?php echo ($p==$q)?'active':''; ?>"><a href="<?php echo BASE_URL;?>galeria/alterar/<?php echo $galeria->getId(); ?>?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
          <?php
            endfor;
            endif;
          ?>
      </ul>
      <a class="btn green" href="<?php echo BASE_URL;?>Galeria/adicionarFoto/<?php echo $galeria->getId(); ?>">Adicionar Foto</a>
    <?php else: ?>
        <p> Nenhuma foto nessa galeria</p>
        <a class="btn green" href="<?php echo BASE_URL;?>Galeria/adicionarFoto/<?php echo $galeria->getId(); ?>">Adicionar Fotos</a>
    <?php endif; ?>
  </div>

</div>
<!-- Modal Structure -->
<div id="modalFoto" class="modal modal-fixed-footer" >
  <div class="">
     <div class="modal-content" >
        <div style="text-align:left;float:left;">
          <h4>Escolha a foto</h4>
        </div>
        
        <div class="fotoedit">
          
        </div>
        
     </div>
     <div class="modal-footer">
       <a href="#!" class="modal-close waves-effect black-text waves-green btn-flat">Fechar</a>
     </div>
   </div>
 </div>
<?php if($removido=='exist'):?>
  <script>
      alert("Removido com sucesso");
  </script>
<?php endif;?>
