<?php
session_start(); 
include("../scripts/clases/class.mysql.php");
include("../scripts/clases/class.data.perfil.php");
$idPerfil = isset($_REQUEST["p"]) ? $_REQUEST["p"] : false;

if($idPerfil)
{
	$data = new Perfil();
	$data->eliminarPerfil($idPerfil);
	
	$_SESSION["perfilEliminado"] = "1";

}
else
{
	$_SESSION["perfilEliminado"] = "2";
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>