<?php
session_start(); 
include("../scripts/clases/class.mysql.php");
include("../scripts/clases/class.data.nivel.php");
$idNivel = isset($_REQUEST["n"]) ? $_REQUEST["n"] : false;

if($idNivel)
{
	$data = new Nivel();
	$data->EliminarNivel($idNivel);
	
	$_SESSION["NivelEliminado"] = "1";
}
else
{
	$_SESSION["NivelEliminado"] = "0";
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>