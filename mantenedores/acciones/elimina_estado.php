<?php
session_start(); 
include("../scripts/clases/class.mysql.php");
include("../scripts/clases/class.data.estado.php");
$idEstado = isset($_REQUEST["e"]) ? $_REQUEST["e"] : false;

if($idEstado)
{
	$data = new Estado();
	$data->eliminarEstado($idEstado);
	
	$_SESSION["estadoEliminado"] = "1";
}
else
{
	$_SESSION["estadoEliminado"] = "0";
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>