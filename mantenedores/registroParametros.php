<?php

$code = $_POST['codigo'];
$val = $_POST['valor'];
$desc = $_POST['descripcion'];
$fecha = $_POST['fecha'];


include_once "../matrices/conexionsql.php";

if ($code != '') {
	# code...
	mysql_query("call sp_Parametros_Guardar('".$code."','".$val."','".$desc."','".$fecha."')",$link);
}
 else {
 	# code...
 	echo "Datos  en Blanco";
 }

mysql_close($link);
?>
