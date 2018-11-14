<footer class="page-footer green" id="pedido">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Contato</h5>
        <p class="grey-text text-lighten-4">Email: mensageirosdeemanuel.go@gmail.com</p>
        <blockquote style="border-color:#fff;">
          “Vocês, Renovação Carismática, receberam um grande presente do Senhor. Vocês nasceram de um desejo do Espírito Santo como “uma corrente de graça” na Igreja e para a Igreja. É isto que os define: “uma corrente de graça”."Papa Francisco"
        </blockquote>
        <h5 class="center-align">Ache - nos</h5>
        <img class="responsive-img" src="<?php echo BASE_URL;?>assets/images/map.png">
        <!--<div style="max-width: : 640px; height: 400px" id="mapContainer"></div>
          <script>
            // Initialize the platform object:
            var platform = new H.service.Platform({
            'app_id': 'm5kaaGNhJM8TCnucqZwT',
            'app_code': 'pQgOrxlO9yg4NtNNW-inkA'
            });
              var svgMarkup = '<svg width="24" height="24" ' +
  'xmlns="http://www.w3.org/2000/svg">' +
  '<rect stroke="white" fill="#1b468d" x="1" y="1" width="22" ' +
  'height="22" /><text x="12" y="18" font-size="12pt" ' +
  'font-family="Arial" font-weight="bold" text-anchor="middle" ' +
  'fill="white">H</text></svg>';
var icon = new H.map.Icon('<?php echo BASE_URL?>assets/images/church-128.png'),
  coords = {lat: -12.902231, lng: -38.403316},
  marker = new H.map.Marker(coords, {icon: icon});
            // Obtain the default map types from the platform object
            var maptypes = platform.createDefaultLayers();

            // Instantiate (and display) a map object:
            var map = new H.Map(
            document.getElementById('mapContainer'),
            maptypes.normal.map,
            {
              zoom: 19,
              center: { lng: 13.4, lat: 52.51 }
            });
            map.addObject(marker);
            map.setCenter(coords);
          </script>-->
          <br/>
          Endereço :<br/>
          Estrada do Coqueiro Grande, 1210 Fazenda Grande II - 41342-165
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Faça seu pedido de oração</h5>
        <div class="row">
          <div>
            <form class="col m12" method="post" action="<?php echo BASE_URL; ?>Home/enviarPedido">
              <div class="center-align" id="ped">
                <div class="container">
                  <div class="input-field">
                    <input name="nomePedido" type="text" class="validate">
                    <label for="nome">Nome</label>
                  </div>

                  <div class="input-field">
                    <input name="emailPedido" type="email" class="validate">
                    <label for="email">Email</label>
                  </div>
                  <div class="input-field">
                    <textarea autocomplete="off" required id="descricao" name="descricao" class="materialize-textarea text-white"></textarea>
                    <label for="descricaoPedido">Descricão</label>
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
  </div>
  <div class="footer-copyright">
    <div class="container">
    © 2018 - <?php echo date('Y');?> Todos os direitos reservados.
    <a class="green-text text-lighten-4 right" href="#!">God Blesses You</a>
    </div>
  </div>
</footer>
