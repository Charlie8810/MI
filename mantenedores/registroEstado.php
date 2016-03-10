<?php

$nb = $_POST['nombre'];
$des = $_POST['descripcion'];


include_once "../matrices/conexionsql.php";

if ($nb != '') {
	# code...
	mysql_query("call sp_Estados_Guardar('".$nb."','".$des."')",$link);
}
 else {
 	# code...
 	echo "Nombre de estado en blanco";
 }



mysql_close($link);
?>
