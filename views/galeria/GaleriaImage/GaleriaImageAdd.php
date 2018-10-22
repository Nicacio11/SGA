<div class="painelInterno2">
  <div class="container">
    <div class="row">
      <div class="col s12 offset-2 m8 offset-m2 card-panel green accent-2">
      <?php if($erro=='exist'):?>
        <div class="erro">
          Problema ao cadastrar!
        </div>
      <?php endif;?>
        <h5>Adicionar Foto à Galeria - <?php echo $galeria->getTitulo(); ?></h5>
        <div class="formAlign">
          <form id="fotosadd" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col offset-m2 m8 offset-m2">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Imagem</span>
                    <input required type="file" name="galeriaFotoAdd[]" multiple id="imagemUsuario" onchange="validaimagem()">
                  </div>
                  <div class="file-path-wrapper">
                    <input required class="file-path validate" type="text" placeholder="Selecione a imagem">
                  </div>
                </div>
              </div>
            </div>
            <input type="submit" value="Adicionar" class="btn teal-2"><br/><br/>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
