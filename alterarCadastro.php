<?php

include "conexao.inc";

/*$res=mysqli_query($con,"SELECT * FROM tabela_teste");
$linhas=mysqli_num_rows($res);
echo "Encontrados $linhas registros tabela_teste";

mysqli_close($con);*/


$id =$_POST["id"];
$nome=$_POST["nome"];
$email=$_POST["email"];
$telefone=$_POST["telefone"];

$sql="UPDATE tabela_teste SET nome = '$nome', email = '$email', telefone = '$telefone' WHERE id ='$id'";
$res=mysqli_query($con,$sql);
$num=mysqli_affected_rows($con);
if($res){
	
	echo "cadastro atualizado com sucesso";
	
}else{
	
	echo "nao cadastrado";
}
//echo "$num registro inserido";
mysqli_close($con);

?>
