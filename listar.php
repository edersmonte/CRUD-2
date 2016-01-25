<?php


include "conexao.inc";


$res=mysqli_query($con,"SELECT * FROM tabela_teste");
$linhas=mysqli_num_rows($res);

if ($linhas == 0){
	
	echo "<div class='alert alert-warning alert-dismissible fade in' role='alert'>"."
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
	</button>
	<strong>Aviso!</strong><a href='#'class='alert-link'>Cadastre um novo contato para começar</a>.
	</div>";
	
	
  
	
	mysqli_close($con);

	return false;
}

?>

<TABLE BORDER=0  class="table">
<thead>

<TR> 



<Th>Nome </Th>

<Th>E-mail </Th>

<Th>Telefone</Th>

<Th> </Th>

<Th> </Th>

</TR> 
</thead>

<tbody>
<?php
foreach($res as $item)
{
echo"<TR>";

//echo"<TD>".$item['id']."</TD>";

echo"<TD>" .$item['nome']."</TD>";

echo"<TD>" .$item['email']."</TD>";

echo"<TD>" .$item['telefone']."</TD>";

echo"<TD><a href='#' id='".$item['id']."' class='alterar btn btn-primary' role='button'>Alterar </a></TD>";

echo"<TD><a href='#' id=".$item['id']." class='deletar btn btn-danger' role='button'>Apagar </a></TD>";

echo"</TR>";

}

mysqli_close($con);

?>
</tbody >

</TABLE> 

<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>


$(function() {
	
	
  
  $('.alterar').click(function(){

	  var idAlterar = $(this).attr("id");
	  
	  
	   $.ajax({

        url: 'listar_id.php',
        datatype: 'html',
        
        type: "POST",
        data:{id:idAlterar},
        success: function (data) {
		$("#alterarUsuario").html(data).show();
		//alert(data);
		
            // Funcao para listar todosUsuarios
			CarregarUsuarios();
        }
	  
	   });
	  
	  
  });
   $('.deletar').click(function(){

	  var idDeletare = $(this).attr("id");
	  
	  var confirma = confirm("Deseja realmente apagar este contato ?");
		if (confirma == true) {
			 $.ajax({

				url: 'deleta.php',
				datatype: 'html',
				
				type: "POST",
				data:{id:idDeletare},
				success: function (data) {

				alert(data);
				
					//funcao que lista todos usuários
					CarregarUsuarios();
				},
				error: function (error) {
				}
			});
		} else {
			false;
		}
			  
	 

	  
  });
  
  
});


	 
	 
</script>












