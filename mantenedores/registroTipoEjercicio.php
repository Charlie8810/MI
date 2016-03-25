<?php
session_start();
	include("scripts/clases/class.mysql.php");
	include("scripts/clases/class.data.php");
?>
<?php

$idp = $_POST['idTipoEjercicio'];
$nb = $_POST['nombre'];


	$data = new Data();	
	
	    $tipoeje = new stdClass();
		$tipoeje->IdTipoEjercicio = $idp;
		$tipoeje->Nombre 	      = $nb;
		$data->actualizarTiposEjercicios($tipoeje);



$_SESSION["guardadooktipoeje"] = "1";  
header("Location: " . $_SERVER["HTTP_REFERER"]);


mysql_close($link);
?>
