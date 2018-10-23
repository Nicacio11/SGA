M.AutoInit();
$('.seletor-ancora').click(function () {
    var alvo = $(this).attr('href').split('#').pop();
    $('html, body').animate({scrollTop: $('#' + alvo).offset().top}, 1000);
    return false;
});
var environment = "development";
var url;
if(environment == "development"){
	url="http://localhost/SGA/";
}else{
	url="http://www.vitornicacio.com.br/projetos/SGA/";
}
var diaSemana = ['Domingo', 'Segunda-Feira', 'Terca-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado'];
var mesAno = [ 'Janeiro', 'Fevereiro', 'Marco', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ];
var data = new Date();
var hoje = diaSemana[data.getDay()] + ', ' + mesAno[data.getMonth()] + ' de ' + data.getFullYear();
//$("#dataPesquisa").attr("value", hoje);
$(".datepicker").datepicker({
		i18n: {
		monthsFull: mesAno,
		monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
		weekdaysFull: diaSemana,
		weekdaysShort: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab' ],
		months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
		weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
		weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
		today: 'Hoje',
		clear: 'Limpar',
		cancel: 'Sair',
		done: 'Confirmar',
		selectMonths: true,
		selectYears: true,
		clear: false,
		format: 'dd/mmm/yyyy',
		today: "Hoje",
		close: "X",
		min: new Date(data.getFullYear() - 1, 0, 1),
		max: new Date(data.getFullYear() + 1, 11, 31),
	},
		format: 'dd/mm/yyyy',
		container: 'body'
});
$("#dataPesquisa").click(function (event) {
		event.stopPropagation();
		$(".datepicker").first().pickadate("picker").open();
});

$(function(){

	$('.modal').modal();
	$('.carousel.carousel-slider').carousel({
	    fullWidth: true,
			indicators: true

	  });
	 $('.carousel').carousel();
		
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
		$('.moda').on('click', function(e){
			e.preventDefault();
			$('#modalFoto').modal('open');

			var link = $(this).attr('href');
			$.ajax({
			url:link,
			type:'GET',
			success:function(html){
				$('.fotoedit').html(html);
			}
		});

		});

		$('#atividadeadd').on('submit', function(e){
			//e.preventDefault();
			adicionarAtividade();
		});
		$('#atividadeedit').on('submit', function(e){
			//e.preventDefault();
			atualizarAtividade();
		});
		$('#galeriaadd').on('submit', function(e){
			//e.preventDefault();
			adicionarGaleria();
		});
		$('#galeriaedit').on('submit', function(e){
			//e.preventDefault();
			atualizarGaleria();
		});
		$('#videoadd').on('submit', function(e){
			//e.preventDefault();
			adicionarVideo();
		});
		$('#videoedit').on('submit', function(e){
			//e.preventDefault();
		atualizarVideo();
		});
		$('#atualizarDescricao').on('submit', function(e){
			//e.preventDefault();
			atualizarReflexao();
		});
		$('#testemunhoadd').on('submit', function(e){
			//e.preventDefault();
			adicionarTestemunho();
		});
		$('#testemunhoedit').on('submit', function(e){
			//e.preventDefault();
			atualizarTestemunho();
		});
		$('#usuarioadd').on('submit', function(e){
			//e.preventDefault();
			addUsuario();
		});
		$('#usuarioedit').on('submit', function(e){
			//e.preventDefault();
			editUsuario();
		});

		$('textarea#descricaoadd').characterCounter();
		$('textarea#testemunhodescricaoadd').characterCounter();
		$('textarea#testemunhodescricaoedit').characterCounter();
		$('textarea#descricaoedit').characterCounter();
		$('textarea#descricaoav').characterCounter();
		$('textarea#descricaoev').characterCounter();
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
function adicionarAtividade(){
	var titulo =	document.getElementById('tituloaa').value;
	var descricao = document.getElementById('descricaoaa').value;
	var data =	document.getElementById('dataPesquisa').value;
		if( titulo.trim() != "" && descricao.trim() != "" && data.trim() != "" ){
			return true;
		}
	alert("Verifique se todas as informações estão corretas!");
	return false;
}
function atualizarAtividade(){
	var titulo =	document.getElementById('tituloea').value;
	var descricao = document.getElementById('descricaoea').value;
	var data =	document.getElementById('dataPesquisaea').value;
		if( titulo.trim() != "" && descricao.trim() != "" && data.trim() != "" ){
			return true;
		}
	alert("Verifique se todas as informações estão corretas!");
	return false;
}
function adicionarGaleria(){
	var titulo =	document.getElementById('tituloag').value;
		if( titulo.trim() != ""){
			return true;
		}
	alert("Verifique se todas as informações estão corretas!");
	return false;
}
function atualizarGaleria(){
	var titulo =	document.getElementById('tituloeg').value;
		if( titulo.trim() != ""){
			return true;
		}
	alert("Verifique se todas as informações estão corretas!");
	return false;
}
function excluirGaleria(id){
	var resposta = confirm("Deseja remover esse registro, todas as fotos serão apagadas juntas?");

	if(resposta == true){
		window.location.href = url+"galeria/apagar/"+id
	}
}
function excluirAtividade(id){
	var resposta = confirm("Deseja remover esse registro?");

	if(resposta == true){
		window.location.href = url+"atividade/apagar/"+id
	}
}
function excluirFoto(galeriaid, id){
	var resposta = confirm("Deseja remover esse registro?");

	if(resposta == true){
		window.location.href = url+"galeria/apagarFoto/"+galeriaid+"/"+id
	}
}
function validaimagemAddAtividade() {
  var extensoesOk = ",.jpg,.jpeg,.png,";
  var extensao	= "," + document.getElementById('imagemAtividadeaa').value.substr( document.getElementById('imagemAtividadeaa').value.length - 4 ).toLowerCase() + ",";
  if (document.getElementById('imagemAtividadeaa') == "")
   {
     alert("O campo do endereço da imagem está vazio!!")
   }
  else if( extensoesOk.indexOf( extensao ) == -1 )
   {
     alert( document.getElementById('imagemAtividadeaa').value + "\nNão possui uma extensão válida" );
     location.reload()
   }
  else {
    tamanhosAddAtividade()
  }
}
function tamanhosAddAtividade() {
  var imagem=new Image();
  imagem.src=document.getElementById('imagemAtividadeaa').value;

  tamanho_imagem = imagem.fileSize
  img_tan = tamanho_imagem
  if (tamanho_imagem < 0)
   {tamanhosAddAtividade()}
  else if (tamanho_imagem > 150000)
  {
    alert("O tamanho da Imagem é muito grande ...  "+tamanho_imagem+" Bytes!!")
  }
}
function validaimagemEditAtividade() {
  var extensoesOk = ",.jpg,.jpeg,.png,";
  var extensao	= "," + document.getElementById('imagemAtividadeea').value.substr( document.getElementById('imagemAtividadeea').value.length - 4 ).toLowerCase() + ",";
  if (document.getElementById('imagemAtividadeea') == "")
   {
     alert("O campo do endereço da imagem está vazio!!")
   }
  else if( extensoesOk.indexOf( extensao ) == -1 )
   {
     alert( document.getElementById('imagemAtividadeea').value + "\nNão possui uma extensão válida" );
     location.reload()
   }
  else {
    tamanhosEditAtividade()
  }
}
function tamanhosEditAtividade() {
  var imagem=new Image();
  imagem.src=document.getElementById('imagemAtividadeea').value;

  tamanho_imagem = imagem.fileSize
  img_tan = tamanho_imagem
  if (tamanho_imagem < 0)
   {tamanhosEditAtividade()}
  else if (tamanho_imagem > 150000)
  {
    alert("O tamanho da Imagem é muito grande ...  "+tamanho_imagem+" Bytes!!")
  }
}
function adicionarVideo(){
	var titulo =	document.getElementById('titulo').value;
	var url =	document.getElementById('titulo').value;
	var descricao = document.getElementById('url').value;
		if( titulo.trim() != "" && descricao.trim() != "" && url.trim() != "" ){
			return true;
		}
	alert("Verifique se todas as informações estão corretas!");
	return false;
}
function atualizarVideo(){
	var titulo =	document.getElementById('titulo').value;
	var descricao = document.getElementById('descricao').value;
	var url =	document.getElementById('url').value;
		if( titulo.trim() != "" && descricao.trim() != "" && url.trim() != "" ){
			return true;
		}
	alert("Verifique se todas as informações estão corretas!");
	return false;
}
function excluirVideo(id){
	var resposta = confirm("Deseja remover esse registro?");

	if(resposta == true){
		window.location.href = url+"video/apagar/"+id
	}
}
function adicionarReflexao(){
	var titulo =	document.getElementById('tituloadd').value;
	var descricao = document.getElementById('descricaoadd').value;
		if( titulo.trim() != "" && descricao.trim() != ""){
			return true;
		}
	alert("Verifique se todas as informações estão corretas!");
	return false;
}
function atualizarReflexao(){
	var titulo =	document.getElementById('tituloedit').value;
	var descricao = document.getElementById('descricaoedit').value;
		if( titulo.trim() != "" && descricao.trim() != ""){
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
function adicionarTestemunho(){
	var nome =	document.getElementById('nometestemunhoadd').value;
	var descricao = document.getElementById('testemunhodescricaoadd').value;
	var email = document.getElementById('emailtestemunhoadd').value;
		if( nome.trim() != "" && descricao.trim() != "" && email.trim() !=""){
			return true;
		}
	alert("Verifique se todas as informações estão corretas!");
	return false;
}
function atualizarTestemunho(){
	var nome =	document.getElementById('nometestemunhoedit').value;
	var descricao = document.getElementById('testemunhodescricaoedit').value;
	var email = document.getElementById('emailtestemunhoedit').value;
		if( nome.trim() != "" && descricao.trim() != "" && email.trim() !=""){
			return true;
		}
	alert("Verifique se todas as informações estão corretas!");
	return false;
}
function excluirTestemunho(id){
	var resposta = confirm("Deseja remover esse registro?");

	if(resposta == true){
		window.location.href = url+"testemunho/apagar/"+id;
	}
}

// Usuario

function validaimagem() {
  var extensoesOk = ",.jpg,.jpeg,.png,";
  var extensao	= "," + document.getElementById('imagemUsuario').value.substr( document.getElementById('imagemUsuario').value.length - 4 ).toLowerCase() + ",";
  if (document.getElementById('imagemUsuario') == "")
   {
     alert("O campo do endereço da imagem está vazio!!")
   }
  else if( extensoesOk.indexOf( extensao ) == -1 )
   {
     alert( document.getElementById('imagemUsuario').value + "\nNão possui uma extensão válida" );
     location.reload()
   }
  else {
    tamanhos()
  }
}
function tamanhos() {
  var imagem=new Image();
  imagem.src=document.getElementById('imagemUsuario').value;

  tamanho_imagem = imagem.fileSize
  img_tan = tamanho_imagem
  if (tamanho_imagem < 0)
   {tamanhos()}
  else if (tamanho_imagem > 150000)
  {
    alert("O tamanho da Imagem é muito grande ...  "+tamanho_imagem+" Bytes!!")
  }
}
function addUsuario(){
  var login = document.getElementById('loginadd').value
  var nome = document.getElementById('nomeadd').value

  if(login.trim() != '' && nome.trim() != ''){
    //alert("Adicionado com sucesso!")
    return true
  }
  alert("Preencha todos os campos antes de adicionar!")
  return false
}
function editUsuario(){
  var login = document.getElementById('loginedit').value
  var nome = document.getElementById('nomeedit').value

  if(login.trim() != '' && nome.trim() != ''){
    //alert("Alterado com sucesso!")
    return true
  }
  alert("Preencha todos os campos antes de adicionar!")
  return false
}
function validaimagemEdit() {
  var extensoesOk = ",.jpg,.jpeg,.png,";
  var extensao	= "," + document.getElementById('imagemUsuarioEdit').value.substr( document.getElementById('imagemUsuario').value.length - 4 ).toLowerCase() + ",";
  if (document.getElementById('imagemUsuarioEdit') == "")
   {
     alert("O campo do endereço da imagem está vazio!!")
   }
  else if( extensoesOk.indexOf( extensao ) == -1 )
   {
     alert( document.getElementById('imagemUsuario').value + "\nNão possui uma extensão válida" );
     location.reload()
   }
  else {
    tamanhosEdit()
  }
}
function tamanhosEdit() {
  var imagem=new Image();
  imagem.src=document.getElementById('imagemUsuarioEdt').value;

  tamanho_imagem = imagem.fileSize
  img_tan = tamanho_imagem
  if (tamanho_imagem < 0)
   {tamanhosEdit()}
  else if (tamanho_imagem > 150000)
  {
    alert("O tamanho da Imagem é muito grande ...  "+tamanho_imagem+" Bytes!!")
  }
}
function desativarUsuario(id){
	var resposta = confirm("Deseja desativar esse registro?");

	if(resposta == true){
		window.location.href = url+"usuario/desativar/"+id
	}
}
