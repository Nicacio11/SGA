<div class="painelInterno2">
  <div class="container">
    <div class="row">
      <div class="col s12 offset-2 m8 offset-m2 card-panel green accent-2">
      <?php if($erro=='exist'):?>
        <div class="erro">
          Problema ao cadastrar!
        </div>
      <?php endif;?>
        <h5>Adicionar Atividade</h5>
        <div class="formAlign">
          <form id="atividadeadd" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="tituloaa" name="tituloaa" type="text" autocomplete="off" class="novalidate text-white">
                <label for="titulo">Titulo</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">
                <input type="text" class="datepicker" id="dataPesquisa" name="dataPesquisaaa">
                <label for="data">Data</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">
                <textarea autocomplete="off" required id="descricaoaa" name="descricaoaa" class="materialize-textarea text-white" data-length="2000"></textarea>
                <label for="descricao">Descricão</label>
              </div>


              <div class="input-field col offset-m2 m8 offset-m2">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Imagem</span>
                    <input required type="file" name="imagemAtividadeaa" id="imagemAtividadeaa" onchange="validaimagemAddAtividade()">
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
