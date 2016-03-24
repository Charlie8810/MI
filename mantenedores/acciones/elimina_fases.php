<?php
session_start(); 
include("../scripts/clases/class.mysql.php");
include("../scripts/clases/class.data.fases.php");
$idFases = isset($_REQUEST["f"]) ? $_REQUEST["f"] : false;

if($idFases)
{
	$data = new Fases();
	$data->eliminarFase($idFases);
	
	$_SESSION["ElimMantenedorFasesok"] = "1";
}
else
{
	$_SESSION["ElimMantenedorFasesok"] = "0";
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>