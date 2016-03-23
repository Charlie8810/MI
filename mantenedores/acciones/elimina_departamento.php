<?php
session_start(); 
include("../scripts/clases/class.mysql.php");
include("../scripts/clases/class.data.departamento.php");
$idDepartamento = isset($_REQUEST["d"]) ? $_REQUEST["d"] : false;

if($idDepartamento)
{
	$data = new Departamento();
	$data->eliminarDepartamento($idDepartamento);
	
	$_SESSION["EliminadoDepartamentoOk"] = "1";
}
else
{
	$_SESSION["EliminadoDepartamentoOk"] = "0";
}

header("Location: " . $_SERVER["HTTP_REFERER"]);

?>