<?php
	session_start();
	include("scripts/clases/class.mysql.php");
	include("scripts/clases/class.data.relacionempresapersona.php");
		
	$data = new RelacionEmpresaPersona();	
	
	$idEmpresa = $_POST["idEmpresa"];
	$persona = $_POST["slEnrrolados"];
	
	
	$data->eliminarAsociacionEmpresaPersona($idEmpresa);
	
	foreach ($persona as $key => $value) 
	{
		$relacion = new stdClass();
		$relacion->IdEmpresa 	= $idEmpresa;
		$relacion->IdPersona 	= $value;
		$data->guardarAsociacionEmpresaPersona($relacion);
	}
	
	
	$_SESSION["asociacionempresa_ok"] = 1;
	header("Location: " . $_SERVER["HTTP_REFERER"]);
	
?>