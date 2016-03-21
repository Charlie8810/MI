<?php
session_start(); 
include("../scripts/clases/class.mysql.php");
include("../scripts/clases/class.data.usuario.php");
$idUsuario = isset($_REQUEST["u"]) ? $_REQUEST["u"] : false;

if($idUsuario)
{
	$data = new Usuario();
	$data->EliminarUsuario($idUsuario);
	
	$_SESSION["UsuarioEliminado"] = "1";
}
else
{
	$_SESSION["UsuarioEliminado"] = "0";
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>