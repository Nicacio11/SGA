<div class="painelInterno2">
  <div class="container">
    <div class="row">
      <div class="col s12 offset-2 m8 offset-m2 card-panel green accent-2">
      <?php if($erro=='exist'):?>
        <div class="erro">
          Problema ao cadastrar!
        </div>
      <?php endif;?>
        <h5>Adicionar Video</h5>
        <div class="formAlign">
          <form id="videoadd" method="post">
            <div class="row">
              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="tituloav" name="tituloav" type="text" autocomplete="off" class="novalidate text-white">
                <label for="titulo">Titulo</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="urlav" name="urlav" type="url" autocomplete="off" class="novalidate text-white">
                <label for="url">Url</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">

                <textarea autocomplete="off" required id="descricaoav" name="descricaoav" class="materialize-textarea text-white" data-length="2000"></textarea>
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
