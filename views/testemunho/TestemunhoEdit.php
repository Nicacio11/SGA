<div class="painelInterno2">
  <div class="container">
    <div class="row">
      <div class="col s12 offset-2 m8 offset-m2 card-panel green accent-2">
        <h5>Atualizar Testemunho</h5>
        <div class="formAlign">
          <form id="testemunho" method="post">
            <div class="row">
              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="nometemunhoadd" name="nometestemunhoadd" type="text" autocomplete="off" autocomplete="off" class="novalidate text-white">
                <label for="Nome">Nome</label>
              </div>

              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="emailtestemunhoadd" name="emailtestemunhoadd" type="text" autocomplete="off" class="novalidate text-white">
                <label for="Email">Email</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">

                <textarea autocomplete="off" required id="testemunhodescricaoadd" name="testemunhodescricaoadd" class="materialize-textarea text-white" data-length="2000"></textarea>
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
