<div class="painelInterno2">
  <div class="container">
    <div class="row">
      <div class="col s12 offset-2 m8 offset-m2 card-panel green accent-2">
        <?php if($erro=='nonexist'):?>
          <div class="erro">
            Não foi possivel atualizar!
          </div>
        <?php endif;?>
        <h5>Editar Atividade</h5>
        <div class="formAlign">
          <form id="atividadeedit" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="tituloea" name="tituloea" type="text" autocomplete="off" class="novalidate text-white">
                <label for="titulo">Titulo</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">
                <input type="text" class="datepicker" id="dataPesquisaea" name="dataPesquisaaa">
                <label for="data">Data</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">
                <textarea autocomplete="off" required id="descricaoea" name="descricaoea" class="materialize-textarea text-white" data-length="2000"></textarea>
                <label for="descricao">Descricão</label>
              </div>


              <div class="input-field col offset-m2 m8 offset-m2">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Imagem</span>
                    <input required type="file" name="imagemAtividadeea" id="imagemAtividadeea" onchange="validaimagemEditAtividade()">
                  </div>
                  <div class="file-path-wrapper">
                    <input required class="file-path validate" type="text" placeholder="Selecione a imagem">
                  </div>
                </div>
              </div>
            </div>
            <input type="submit" value="Atualizar" class="btn teal-2"><br/><br/>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
