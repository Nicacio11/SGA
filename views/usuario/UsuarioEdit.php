

<div class="painelInterno2">
  <div class="container">
    <div class="row">
      <div class="col s12 offset-2 m8 offset-m2 card-panel green accent-2">
        <?php if($erro=='nonexist'):?>
          <div class="erro">
            Não foi possivel atualizar!
          </div>
        <?php endif;?>  
       <h5>Editar Usuário</h5>
        <div class="formAlign">
          <form id="usuarioedit" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="loginedit" name="loginedit" type="text" value="<?php echo $usuario->getUsuario();?>" autocomplete="off" class="novalidate text-white">
                <label for="login">Login</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">

                <input type="password" autocomplete="off" required id="senhaedit" name="senhaedit" class="novalidate text-white" >
                <label for="Senha">Senha</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">

                <input required id="nomeedit" name="nomeedit" type="text" autocomplete="off" value="<?php echo $usuario->getNome();?>"  class="novalidate text-white">
                <label for="Nome">Nome</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">
                <select required id="activeedit" name="activeedit">
                  <option value="" disabled selected>Escolha uma opção</option>
                  <option value="0" <?php echo($usuario->getActive()==0)?'selected':''; ?>  >Desativado</option>
                  <option value="1" <?php echo($usuario->getActive()==1)?'selected':''; ?> >Normal</option>
                  <option value="2" <?php echo($usuario->getActive()==2)?'selected':''; ?>>Administrador</option>
                </select>
                <label>Ativo</label>
              </div>
              <div class="input-field col offset-m2 m8 offset-m2">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Imagem</span>
                    <input required type="file" name="imagemUsuarioEdit" id="imagemUsuarioEdit" onchange="validaimagem()">
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
