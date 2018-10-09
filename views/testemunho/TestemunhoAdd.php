<div class="painelInterno2">
  <div class="container">
    <div class="row">
      <div class="col s12 offset-2 m8 offset-m2 card-panel green accent-2">
      <?php if($erro=='exist'):?>
        <div class="erro">
          Problema ao cadastrar!
        </div>
      <?php endif;?>
        <h5>Adicionar Testemunho</h5>
        <div class="formAlign">
          <form id="testemunhoadd" method="post">
            <div class="row">
              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="nometestemunhoadd" name="nometestemunhoadd" type="text" autocomplete="off" autocomplete="off" class="novalidate text-white">
                <label for="Nome">Nome</label>
              </div>

              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="emailtestemunhoadd" name="emailtestemunhoadd" type="email" autocomplete="off" class="novalidate text-white">
                <label for="Email">Email</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">

                <textarea autocomplete="off" required id="testemunhodescricaoadd" name="testemunhodescricaoadd" class="materialize-textarea text-white" data-length="2000"></textarea>
                <label for="descricao">Descricão</label>
              </div>
            </div>
            <input type="submit" value="Adicionar" class="btn teal-2"><br/><br/>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
