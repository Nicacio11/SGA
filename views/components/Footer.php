<footer class="page-footer green" id="pedido">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Contato</h5>
        <p class="grey-text text-lighten-4">Email: mensageirosdeemanuel.go@gmail.com</p>
        <blockquote style="border-color:#fff;">
          “Vocês, Renovação Carismática, receberam um grande presente do Senhor. Vocês nasceram de um desejo do Espírito Santo como “uma corrente de graça” na Igreja e para a Igreja. É isto que os define: “uma corrente de graça”."Papa Francisco"
        </blockquote>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Faça seu pedido de oração</h5>
        <div class="row">
            <form class="col m12" method="post" action="<?php echo BASE_URL; ?>home/enviarPedido">
              <div class="">
                <div class="container">
                  <div class="input-field">
                    <input id="nome" type="text" class="validate">
                    <label for="nome">Nome</label>
                  </div>

                  <div class="input-field">
                    <input id="email" type="email" class="validate">
                    <label for="email">Email</label>
                  </div>
                  <div class="input-field">
                    <textarea autocomplete="off" required id="descricao" name="descricao" class="materialize-textarea text-white"></textarea>
                    <label for="descricao">Descricão</label>
                  </div>
                  <div class="input-field">
                    <input class="btn carousel-background waves-effect waves-light"  type="submit" value="Enviar">
                  </div>
                </div>
              </div>

            </form>
          </div>

      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
    © 2018 - <?php echo date('Y');?> Todos os direitos reservados.
    <a class="green-text text-lighten-4 right" href="#!">God Blesses You</a>
    </div>
  </div>
</footer>
