<?php

include "conexao.inc";

/*$res=mysqli_query($con,"SELECT * FROM tabela_teste");
$linhas=mysqli_num_rows($res);
echo "Encontrados $linhas registros tabela_teste";

mysqli_close($con);*/



$nome=$_POST["nome"];
$email=$_POST["email"];
$telefone=$_POST["telefone"];

$sql="INSERT INTO tabela_teste VALUES (NULL, '$nome', '$email', '$telefone')";
$res=mysqli_query($con,$sql);
$num=mysqli_affected_rows($con);
if($num > 0){
	
	echo "cadastro realizado com sucesso";
	
}else{
	
	echo "nao cadastrado";
}
//echo "$num registro inserido";
mysqli_close($con);

?>

