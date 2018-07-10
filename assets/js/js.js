M.AutoInit();
$(function(){

	$('.carousel.carousel-slider').carousel({
	    fullWidth: true,
			indicators: true

	  });

		$('.dropdown-trigger').dropdown();
		$('.dropdown-trigger').dropdown('recalculateDimensions')

		setInterval("next()", 7000);
		$('#formulario').on('submit',function(e){
			e.preventDefault();
			logar();
		});

});
function next(){
	$('.carousel').carousel('next');
}
function prev(){
	$('.carousel').carousel('prev');
}
function logar(){
	var user = $('#usuario').val();
	var pass = $('#senha').val();

		//previne ação padrão que é enviar o formulario
		$.ajax({
			url:'http://localhost/SGA/Usuario/login',
			type:'post',
			data:{usuario: user, senha: pass},
			success: function(r){
				console.log(r);
				$('.msg').html(r);
			},
			error: function(error){
				$('.msg').html("Usuario ou senha incorretos");
			}
		});
}
