<?php
session_start(); 
include("../scripts/clases/class.mysql.php");
include("../scripts/clases/class.data.curso.php");
$idCurso = isset($_REQUEST["c"]) ? $_REQUEST["c"] : false;

if($idCurso)
{
	$data = new Curso();
	$data->EliminarCurso($idCurso);
	
	$_SESSION["cursoEliminado"] = "1";
}
else
{
	$_SESSION["cursoEliminado"] = "0";
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>