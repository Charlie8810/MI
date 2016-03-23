<?php
	session_start();
	include("scripts/clases/class.mysql.php");
	include("scripts/clases/class.data.relacionempresadepto.php");
		
	$data = new RelacionEmpresaDepartamento();	
	
	$idEmpresa = $_POST["idEmpresa"];
	$departamento = $_POST["slEnrrolados"];
	
	
	$data->eliminarAsociacionEmpresaDepartamento($idEmpresa);
	
	foreach ($departamento as $key => $value) 
	{
		$relacion = new stdClass();
		$relacion->IdEmpresa 		= $idEmpresa;
		$relacion->IdDepartamento 	= $value;
		$data->guardarAsociacionEmpresaDepartamento($relacion);
	}
	
	
	$_SESSION["asociacionempresa_ok"] = 1;
	header("Location: " . $_SERVER["HTTP_REFERER"]);
	
?>