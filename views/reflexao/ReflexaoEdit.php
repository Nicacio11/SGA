<div class="painelInterno2">
  <div class="container">
    <div class="row">
      <div class="col s12 offset-2 m8 offset-m2 card-panel green accent-2">
        <h5>Editar Reflexão</h5>
        <div class="formAlign">
          <form id="descricao" method="post">
            <div class="row">
              <div class="input-field col offset-m2 m8 offset-m2">
                <i class="material-icons prefix">mode_edit</i>
                <input required id="titulo" name="titulo" type="text" autocomplete="off" value="<?php echo utf8_encode($reflexao->getTitulo());?>" class="novalidate text-white">
                <label for="titulo">Titulo</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">
                <i class="material-icons prefix">mode_edit</i>
                <textarea autocomplete="off" required id="descricao" name="descricao" class="materialize-textarea text-white" data-length="2000"><?php echo utf8_encode($reflexao->getCorpo());?>
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
