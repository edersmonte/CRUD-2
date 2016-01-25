<?php

$id=$_POST["id"];

include "conexao.inc";


$res=mysqli_query($con,"SELECT * FROM  tabela_teste where id = '$id'");
$linhas=mysqli_num_rows($res);

if ($linhas == 0){
	
	echo "nenhum registro encontrado";
	
	mysqli_close($con);

	return false;
}

?>


<script src="js/jquery.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script>


$(function() {
	
	$('.telefone_ddd').mask('(00)0000-00000',{placeholder: "(__)____-_____"});
  
  $('#cadastrarAlteracao').click(function(){

	  var idAlterar = $("#id_alteracao").val();
	  var nomeAlte= $("#nome_alteracao").val();
	  var emailAlte= $("#email_alteracao").val();
	  var telefoneAlte= $("#telefone_alteracao").val();
	  
	  
	 var retornoValidacao = validarCamposAlter(nomeAlte, emailAlte, telefoneAlte);
	 if(retornoValidacao == false )
	 {
		return false;
	 }
	  AlterarUsuarios(idAlterar, nomeAlte,emailAlte,telefoneAlte);
	  
  });
   
  $('#limparAlteracao').click(function(){
	  
	  limpaCamporAlter();
  });
  
});

function AlterarUsuarios(vId, vernome,veremail,vertelefone)
{
	
	$.ajax({

        url: 'alterarCadastro.php',
        datatype: 'html',
        data:{id:vId,nome:vernome, email:veremail, telefone:vertelefone},
        type: "POST",
  
        success: function (data) {
			
			//alert(data);
			
			
			$("#novousuarioAlteracao").hide();
			$("#resultadoAlterConteudo").html(data);
			$("#resultadoAlter").show();
			CarregarUsuarios();
			esconderAlertaErrosAlter();
			
			
			}, error: function (error) {
				alert(error);
				
        }
	});
}
function limpaCamporAlter()
{
	
	

	  $("#id_alteracao").val('');
	  $("#nome_alteracao").val('');
	  $("#email_alteracao").val('');
	  $("#telefone_alteracao").val('');
	  esconderAlertaErrosAlter();
	  $("#alterarUsuario").hide();
	  

	  
  
}

function validarCamposAlter(valNome, valEmail, valTelefone)
	 {
			var tamNome = valNome.length;
			var tamEmail = valEmail.length;
			var  tamTelefone = valTelefone.length;
			
			var mensagem = "";
			
			var emailInvalido = ValidarEmailAlter(valEmail);
			
			
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
				
				
			
				
				mostraAlertaErrosAlter(mensagem);
				return false ; 
				
				
			}
			
			return true;
		 
	 }
	 
	 
	 function mostraAlertaErrosAlter(mensagem)
	 {
				$("#errosNovoContatoAlterConteudo").html(mensagem);
				$("#errosNovoContatoAlter").show();
	 }
	 
	 	 
	 function esconderAlertaErrosAlter()
	 {
				$("#errosNovoContatoAlterConteudo").html("");
				$("#errosNovoContatoAlter").hide();
	 }
	
	function ValidarEmailAlter(email)
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

<div id="errosNovoContatoAlter" style="display:none;width:600px;margin: 0 auto" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button"  class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><span id="errosNovoContatoAlterConteudo"></span></strong> 
</div>

<div id="resultadoAlter" style="display:none;width:600px;margin: 0 auto" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><span id="resultadoAlterConteudo"></span></strong> 
</div>
<div id="novousuarioAlteracao"style="width:600px;margin: 0 auto;">
<h2> Atualizar Contato </h2>
<?php
foreach($res as $item)
{
?>
		<input type="hidden" id="id_alteracao" value="<?PHP echo $item['id']?>">
		 <div class="form-group">
		<label>Nome:</label> <input id="nome_alteracao" type="text" class="form-control" value="<?PHP echo $item['nome']?>">
		</div>
		 <div class="form-group">
		<label>E-mail:</label> <input id="email_alteracao" type="text" class="form-control" value="<?PHP echo $item['email']?>">
		</div>
		 <div class="form-group">
		<label>Telefone</label><input id="telefone_alteracao"   type="text" class="form-control telefone_ddd " value="<?PHP echo $item['telefone']?>">
		</div>

   <input id="cadastrarAlteracao" class="btn btn-primary" type="button" value="Atualizar">
   <input id="limparAlteracao" type="button" class="btn btn-danger" value="Cancelar">
<?php }    mysqli_close($con);

 
 ?>


</div >
 <!-- <div id="resultadoAlter" style="display:none;width:600px;margin: 0 auto">


// </div>-->















