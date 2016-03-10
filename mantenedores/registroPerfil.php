<?php

$nb = $_POST['nombre'];
$des = $_POST['descripcion'];
$est = $_POST['estado'];


include_once "../matrices/conexionsql.php";

	echo $est;
	
if ($nb != '') {
	# code...
	mysql_query("call sp_Perfil_Guardar('".$nb."','".$des."','".$est."')",$link);
}
 else {
 	# code...
 	echo "Nombre de estado en blanco";
 }



mysql_close($link);
?>
