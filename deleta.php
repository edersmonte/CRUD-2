
<?php
 
include "conexao.inc";

$id=$_POST["id"];


$sql="DELETE FROM tabela_teste WHERE id = '$id' ";
$res=mysqli_query($con,$sql);
$num=mysqli_affected_rows($con);
if($num >0){
echo "Contato apagado com sucesso!";
}else{
	echo " Nenhum contato foi apagado!";
	
}
mysqli_close($con);


?>