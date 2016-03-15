<?php
include("clases/class.mysql.php");
include("clases/class.data.php");

if(isset($_GET["vrut"]) && !empty($_GET["vrut"]))
{
	
	$dataempresa = new Data();
	$rut = str_replace(".","",$_GET["vrut"]);
	$emp = $dataempresa->cargarEmpresa($rut);

	echo json_encode(array("empresa"=>$emp));
	
}


?>