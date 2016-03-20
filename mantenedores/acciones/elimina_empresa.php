<?php
session_start(); 
include("../scripts/clases/class.mysql.php");
include("../scripts/clases/class.data.empresa.php");
$idEmpresa = isset($_REQUEST["i"]) ? $_REQUEST["i"] : false;

if($idEmpresa)
{
	$data = new Empresa();
	$data->EliminarEmpresa($idEmpresa);
	
	$_SESSION["MantenedorEmpresaok"] = "1";
}
else
{
	$_SESSION["MantenedorEmpresaok"] = "0";
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>