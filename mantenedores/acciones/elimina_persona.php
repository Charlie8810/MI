<?php
session_start(); 
include("../scripts/clases/class.mysql.php");
include("../scripts/clases/class.data.persona.php");
$idPersona = isset($_REQUEST["p"]) ? $_REQUEST["p"] : false;

if($idPersona)
{
	$data = new Persona();
	$data->eliminarPersona($idPersona);
	
	$_SESSION["estadoEliminado"] = "1";
}
else
{
	$_SESSION["estadoEliminado"] = "0";
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>