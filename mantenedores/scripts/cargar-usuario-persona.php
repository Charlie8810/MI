<?php
include("clases/class.mysql.php");
include("clases/class.data.php");

if(isset($_GET["vrut"]) && !empty($_GET["vrut"]))
{
	
	$dataPersona = new Data();
	$rut = str_replace(".","",$_GET["vrut"]);
	$per = $dataPersona->cargarPersona($rut);

	echo json_encode(array("persona"=>$per));
	
}


?>