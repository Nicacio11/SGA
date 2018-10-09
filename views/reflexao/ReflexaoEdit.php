<div class="painelInterno2">
  <div class="container">
    <div class="row">
      <div class="col s12 offset-2 m8 offset-m2 card-panel green accent-2">
        <?php if($erro=='nonexist'):?>
          <div class="erro">
            Não foi possivel atualizar!
          </div>
        <?php endif;?>    
        <h5>Editar Reflexão</h5>
        <div class="formAlign">
          <form id="atualizarDescricao" method="post">
            <div class="row">
              <div class="input-field col offset-m2 m8 offset-m2">
                <input required id="tituloedit" name="tituloedit" type="text" autocomplete="off" value="<?php echo $reflexao->getTitulo();?>" class="novalidate text-white">
                <label for="tituloedit">Titulo</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">
                <textarea autocomplete="off" required id="descricaoedit" name="descricaoedit" class="materialize-textarea text-white" data-length="2000"><?php echo $reflexao->getCorpo();?>
                </textarea>
                <label for="descricao">Descricão</label>
              </div>
            </div>
            <input type="submit" value="Atualizar" class="btn teal-2"><br/><br/>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
