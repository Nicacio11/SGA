M.AutoInit();
var environment = "development";
var url;
if(environment == "development"){
	url="http://localhost/SGA/";
}else{

}
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
		$('#descricao').on('submit', function(e){
			e.preventDefault();
			adicionarReflexao();
		});
		$('textarea#descricao').characterCounter();
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
			url: url+'Usuario/login',
			type:'post',
			data:{usuario: user, senha: pass},
			success: function(r){

				if(r != 'Usuário e/ou senha incorretos ou inexistentes'){
					$('body').html(r);
				}else{
					$('.msg').html(r);
				}
			},
			error: function(error){
				$('.msg').html("Usuario ou senha incorretos");
			}
		});
}
function adicionarReflexao(){
	var titulo =	$('#titulo').val();
	var descricao = $('#descricao').val();
	$.ajax({
		url: url+'Reflexao/adicionar',
		type: 'post',
		data: {titulo: titulo, descricao: descricao},
		success: function(r){
			$('#titulo').text(null);
			$('#descricao').text(null);
			alert("Adicionado com sucesso!");

		},
		error: function(error){
			alerta('Não foi possivel realizar ação!');
		}

	});
}
