<div class="painelInterno2">
  <div class="container">
    <div class="row">
      <div class="col s12 offset-2 m8 offset-m2 card-panel green accent-2">
        <?php if($erro=='nonexist'):?>
          <div class="erro">
            Não foi possivel atualizar!
          </div>
        <?php endif;?>
        <h5>Editar Vídeo</h5>
        <div class="formAlign">
          <form id="videoedit" method="post">
            <div class="row">
              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="tituloev" name="tituloev" type="text" autocomplete="off" class="novalidate text-white" value="<?php echo $video->getTitulo() ;?>">
                <label for="titulo">Titulo</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="urlev" name="urlev" type="url" autocomplete="off" class="novalidate text-white" value="<?php echo $video->getVideoPath() ;?>">
                <label for="url">Url</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">

                <textarea autocomplete="off" required id="descricaoev" name="descricaoev" class="materialize-textarea text-white" data-length="2000"><?php echo $video->getDescricao() ;?></textarea>
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
