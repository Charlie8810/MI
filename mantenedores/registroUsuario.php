<?php

$nb = $_POST['persona'];
$usr = $_POST['login'];
$pass = $_POST['pass'];
$est = $_POST['estado'];


include_once "../matrices/conexionsql.php";


if ($nb != '') {
	# code...
	mysql_query("call sp_Usuario_Guardar('".$nb."','".$usr."','".$pass."','".$est."')",$link);
}
 else {
 	# code...
 	echo "Nombre de estado en blanco";
 }



mysql_close($link);
?>
