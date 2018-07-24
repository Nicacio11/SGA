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
			//e.preventDefault();
			adicionarReflexao();
		});
		$('textarea#descricao').characterCounter();
		$(document).ready(function(){
    	$('.modal').modal();
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
	var titulo =	document.getElementById('titulo').value;
	var descricao = document.getElementById('descricao').value;
		if( titulo.trim() != "" && descricao.trim() != ""){
			alert("Adicionado com sucesso!");
			return true;
		}
	alert("Verifique se todas as informações estão corretas!");
	return false;
}
function excluirReflexao(id){
	var resposta = confirm("Deseja remover esse registro?");

	if(resposta == true){
		window.location.href = url+"reflexao/apagar/"+id
	}
}
