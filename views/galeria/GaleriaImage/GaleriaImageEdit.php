<br><br>
<div class="container" style="text-align: center;">  
  <form id="fotosedit" method="post" enctype="multipart/form-data" action="<?php echo BASE_URL;?>galeria/alterarFoto/<?php echo $id;?>/<?php echo $foto->getId();?>">
      <div class="row">
        <div class="input-field col offset-m2 m8 offset-m2">
          <div class="file-field input-field">
            <div class="btn">
              <span>Imagem</span>
              <input required type="file" name="galeriaFotoEdit" id="imagemUsuario" onchange="validaimagem()">
            </div>
            <div class="file-path-wrapper">
              <input required class="file-path validate" type="text" placeholder="Selecione a imagem a substituir">
            </div>
          </div>
        </div>
      </div>
      <input type="submit" value="Modificar" class="btn teal-2 align-center"><br/><br/>
      <img  style="width: 100px;" class="img-thumbnail" src="<?php echo BASE_URL;?>assets/images/galerias/<?php echo $foto->getImagePath();?>" />
    </form>
</div>
