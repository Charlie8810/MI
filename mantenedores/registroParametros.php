<?php
session_start();
?>

<?php

$idParametro = $_POST['IdParametro'];
$code = $_POST['codigo'];
$val = $_POST['valor'];
$desc = $_POST['descripcion'];


include_once "../matrices/conexionsql.php";

	# code...
	mysql_query("call sp_Parametro_Guardar('".$idParametro."','".$code."','".$val."','".$desc."')",$link);
	
    $_SESSION["guardadookparametro"] = "1";  
    header("Location: " . $_SERVER["HTTP_REFERER"]);


mysql_close($link);
?>
