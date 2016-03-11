<?php
session_start(); 
include("../scripts/clases/class.mysql.php");
include("../scripts/clases/class.data.php");
$idEjercicio = isset($_REQUEST["e"]) ? $_REQUEST["e"] : false;

if($idEjercicio)
{
	$data = new Data();
	$data->EliminarEjercicio($idEjercicio);
	
	$_SESSION["ejercicioEliminado"] = "1";
}
else
{
	$_SESSION["ejercicioEliminado"] = "0";
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>