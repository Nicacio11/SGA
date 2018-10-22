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
          <form id="galeriaadd" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col offset-m2 m8 offset-m2">
                <input required id="tituloag" name="tituloag" type="text" autocomplete="off" class="novalidate text-white">
                <label for="titulo">Titulo</label>
              </div>
            </div>
            <input type="submit" value="Adicionar" class="btn teal-2"><br/><br/>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
