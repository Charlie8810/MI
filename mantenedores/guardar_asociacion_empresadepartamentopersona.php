<?php
	session_start();
	include("scripts/clases/class.mysql.php");
	include("scripts/clases/class.data.relacionempresadeptopersona.php");
		
	$data = new RelacionEmpresaDepartamentoPersona();	
	
	$idRelacion = $_POST["idRelacion"];
	$persona = $_POST["slEnrrolados"];
	
	
	$data->eliminarAsociacionEmpresaDepartamentoPer($idRelacion);
	
	foreach ($persona as $key => $value) 
	{
		$relacion = new stdClass();
		$relacion->idRelacion 		= $idRelacion;
		$relacion->IdPersona 	= $value;
		$data->guardarAsociacionEmpresaDepartamento($relacion);
	}
	
	
	$_SESSION["asociacionpersona_ok"] = 1;
	header("Location: " . $_SERVER["HTTP_REFERER"]);
	
?>