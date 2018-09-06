M.AutoInit();
var environment = "development";
var url;
if(environment == "development"){
	url="http://localhost/SGA/";
}else{
	url="http://www.vitornicacio.com.br/projetos/SGA/";
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
	var titulo =	document.getElementById('tituloadd').value;
	var descricao = document.getElementById('descricaoadd').value;
		if( titulo.trim() != "" && descricao.trim() != ""){
			alert("Adicionado com sucesso!");
			return true;
		}
	alert("Verifique se todas as informações estão corretas!");
	return false;
}
function atualizarReflexao(){
	var titulo =	document.getElementById('tituloedit').value;
	var descricao = document.getElementById('descricaoedit').value;
		if( titulo.trim() != "" && descricao.trim() != ""){
			alert("Atualizado com sucesso!");
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
			alert("Adicionado com sucesso!");
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
			alert("Atualizado com sucesso!");
			return true;
		}
	alert("Verifique se todas as informações estão corretas!");
	return false;
}
function excluirTestemunho(id){
	var resposta = confirm("Deseja remover esse registro?");

	if(resposta == true){
		window.location.href = url+"testemunho/apagar/"+id
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
    alert("Adicionado com sucesso!")
    return true
  }
  alert("Preencha todos os campos antes de adicionar!")
  return false
}
function editUsuario(){
  var login = document.getElementById('loginedit').value
  var nome = document.getElementById('nomeedit').value

  if(login.trim() != '' && nome.trim() != ''){
    alert("Adicionado com sucesso!")
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
