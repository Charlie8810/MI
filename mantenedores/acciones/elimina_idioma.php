<?php
session_start(); 
include("../scripts/clases/class.mysql.php");
include("../scripts/clases/class.data.idioma.php");
$idIdioma = isset($_REQUEST["i"]) ? $_REQUEST["i"] : false;

if($idIdioma)
{
	$data = new Idioma();
	$data->EliminarIdioma($idIdioma);
	
	$_SESSION["idiomaEliminado"] = "1";
}
else
{
	$_SESSION["idiomaEliminado"] = "0";
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>