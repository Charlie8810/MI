<?php

$nb = $_POST['nombre'];
$des = $_POST['descripcion'];
$vig = $_POST['vigente'];


include_once "../matrices/conexionsql.php";

if ($nb != '') {
	# code...
	mysql_query("call sp_Nivel_Guardar('".$nb."','".$des."','".$vig."')",$link);
}
 else {
 	# code...
 	echo "Datos  en Blanco";
 }

mysql_close($link);
?>
