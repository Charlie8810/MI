<?php
session_start(); 
include("../scripts/clases/class.mysql.php");
include("../scripts/clases/class.data.ParametrosGlobales.php");
$idParametro = isset($_REQUEST["p"]) ? $_REQUEST["p"] : false;

if($idParametro)
{
	$data = new ParametroGlobal();
	$data->EliminarParametro($idParametro);
	
	$_SESSION["parametroEliminado"] = "1";
}
else
{
	$_SESSION["parametroEliminado"] = "0";
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>