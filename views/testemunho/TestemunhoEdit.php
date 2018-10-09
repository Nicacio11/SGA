<div class="painelInterno2">
  <div class="container">
    <div class="row">
      <div class="col s12 offset-2 m8 offset-m2 card-panel green accent-2">
      <?php if($erro=='nonexist'):?>
          <div class="erro">
            Não foi possivel atualizar!
          </div>
        <?php endif;?>    
      <h5>Atualizar Testemunho</h5>
        <div class="formAlign">
          <form id="testemunhoedit" method="post">
            <div class="row">
              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="nometestemunhoedit" name="nometestemunhoedit" type="text" autocomplete="off" value="<?php echo $testemunho->getNome();?>" autocomplete="off" class="novalidate text-white">
                <label for="Nome">Nome</label>
              </div>

              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="emailtestemunhoedit" name="emailtestemunhoedit" type="email" autocomplete="off" value="<?php echo $testemunho->getEmail();?>" class="novalidate text-white">
                <label for="Email">Email</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">

                <textarea autocomplete="off" required id="testemunhodescricaoedit" name="testemunhodescricaoedit"  class="materialize-textarea text-white" data-length="2000"><?php echo $testemunho->getDescricao();?></textarea>
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
