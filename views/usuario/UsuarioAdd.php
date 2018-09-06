

<div class="painelInterno2">
  <div class="container">
    <div class="row">
      <div class="col s12 offset-2 m8 offset-m2 card-panel green accent-2">
        <h5>Adicionar Usuário</h5>
        <div class="formAlign">
          <form id="usuarioadd" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="loginadd" name="loginadd" type="text" autocomplete="off" class="novalidate text-white">
                <label for="login">Login</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">

                <input type="password" autocomplete="off" required id="senhaadd" name="senhaadd" class="novalidate text-white" >
                <label for="Senha">Senha</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="nomeadd" name="nomeadd" type="text" autocomplete="off" class="novalidate text-white">
                <label for="Nome">Nome</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">
                <select required id="activeadd" name="activeadd">
                  <option value="" disabled selected>Escolha uma opção</option>
                  <option value="0">Desativado</option>
                  <option value="1">Normal</option>
                  <option value="2">Administrador</option>
                </select>
                <label>Ativo</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Imagem</span>
                    <input required type="file" name="imagemUsuario" id="imagemUsuario" onchange="validaimagem()">
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
