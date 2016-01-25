<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script>


$(function() {
	
	 limparCampos();
	$('.telefone_ddd').mask('(00)0000-00000',{placeholder: "(__)____-_____"});
	
	CarregarUsuarios();
	
  $("#cadastrarNovoUsuarioDiv").click(function(){
	  
	  $("#novousuario").show();
	  $(this).hide();
  });
  
  
  $("#cancelar").click(function(){
	  
	   limparCampos();
	    $("#novousuario").hide();
		$("#cadastrarNovoUsuarioDiv").show();
  });
  $("#cadastrar").click(function(){
	  var nome= $("#nome").val();
	  var email= $("#email").val();
	  var telefone= $("#telefone").val();
	  
	  // verifica se os campos estão vazios
	 var retornoValidacao = validarCampos(nome,email,telefone);
	 if(retornoValidacao == false )
	 {
		return false;
	 }
	  
	  CadastrarUsuarios(nome,email,telefone);
	  
	  limparCampos();
	  
	});
	
	 $("#limpar").click(function(){
		 
		 limparCampos();
		 
		 
	 });
	
	
	
});
	 
function CarregarUsuarios()
{
	
	$.ajax({

        url: 'listar.php',
        datatype: 'html',
        
        type: "POST",
  
        success: function (data) {
			
			$("#listagem_usuario").html(data);
			
			}, error: function (error) {
				alert(error);
				
        }
	});
}


function CadastrarUsuarios(vernome,veremail,vertelefone)
{
	
	$.ajax({

        url: 'inclusao.php',
        datatype: 'html',
        data:{nome:vernome, email:veremail, telefone:vertelefone},
        type: "POST",
  
        success: function (data) {
			
			//alert(data);
			$("#resultadoCadastroConteudo").html(data);
			CarregarUsuarios();
			 $("#novousuario").hide();
			$("#cadastrarNovoUsuarioDiv").show();
			$("#resultadoCadastro").show();
			esconderAlertaErros();
			
			}, error: function (error) {
				alert(error);
				
        }
	});
}
	 function limparCampos(){
		 
		 $("#nome").val('');
		 $("#email").val('');
		 $("#telefone").val('');
		 esconderAlertaErros();
		 
		 
	 }
	 
	 function validarCampos(valNome, valEmail, valTelefone)
	 {
			var tamNome = valNome.length;
			var tamEmail = valEmail.length;
			var  tamTelefone = valTelefone.length;
			
			var mensagem = "";
			
			var emailInvalido = ValidarEmail(valEmail);
			
			
			if(tamNome == 0 || emailInvalido == false || tamTelefone < 13 )
			{
				//alert("Campos Vazios");
				if (tamNome == 0)
				{
					mensagem += "O campo nome não pode ficar vazio.</br>"
					
				}
				
				if(emailInvalido == false)
				{
					mensagem += "Digite um e-mail válido!</br>"
				}
				
				
				if (tamTelefone < 13)
				{
					mensagem += "Favor preencher o telefone corretamente.</br>"
				}
				
				
			
				
				mostraAlertaErros(mensagem);
				return false ; 
				
				
			}
			
			return true;
		 
	 }
	 
	 
	 function mostraAlertaErros(mensagem)
	 {
				$("#errosNovoContatoConteudo").html(mensagem);
				$("#errosNovoContato").show();
	 }
	 
	 	 
	 function esconderAlertaErros()
	 {
				$("#errosNovoContatoConteudo").html("");
				$("#errosNovoContato").hide();
	 }
	
	function ValidarEmail(email)
	{
		var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
         if(filtro.test(email))
         {
			 
			 return true ;
		 }
		 else 
		 {
			 
			 return false ;
		 }
	}	
 
</script>
 
 

</head>


<body>





<center><h2>Agenda de Contatos</h2></center>
<div id="listagem_usuario" style="width:600px;margin: 0 auto;">
</div>

<div id="errosNovoContato" style="display:none;width:600px;margin: 0 auto" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button"  class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><span id="errosNovoContatoConteudo"></span></strong> 
</div>

<div id="resultadoCadastro" style="display:none;width:600px;margin: 0 auto" class="alert alert-success alert-dismissible" role="alert">
  <button type="button"  class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><span id="resultadoCadastroConteudo"></span></strong> 
</div>

<div id="novousuario" style="display:none;width:600px;margin: 0 auto;">
	<h2> Novo Contato</h2>
	 <div class="form-group">
       <label>Nome:</label> <input id="nome" class="form-control" type="text" name="">
	 </div>
	  <div class="form-group">
      <label>E-mail:</label> <input id="email" class="form-control " type="text" name="">
	  </div>
	  <div class="form-group">
		<label>Telefone</label><input id="telefone" class="form-control telefone_ddd" type="text">
	</div>

   <input id="cadastrar" class="btn btn-primary " type="button" value="Cadastrar">
   <input id="limpar" type="submit" class="btn btn-warning"  value="Limpar">
   <input id="cancelar" type="submit" class="btn btn-danger"  value="Cancelar">
   
	
</div>

<div style="width:600px;margin: 0 auto;">

	<a href="#" id="cadastrarNovoUsuarioDiv" class="btn btn-primary" role="button"> Cadastrar Novo Contato</a>
</div>

<div id="alterarUsuario">

</div>

<?php //include "listar.php";?>
 
</body>

</html>

