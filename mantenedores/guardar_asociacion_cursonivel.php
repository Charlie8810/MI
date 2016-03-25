<?php
	session_start();
	include("scripts/clases/class.mysql.php");
	include("scripts/clases/class.data.php");
		
	$data = new Data();	
	
	$idCurso = $_POST["idCurso"];
	$nivel = $_POST["slEnrrolados"];
	
	
	
	$data->eliminarAsociacionNivelCurso($idCurso);
	
	foreach ($nivel as $key => $value) 
	{
		$relacion = new stdClass();
		$relacion->IdCurso 		= $idCurso;
		$relacion->IdNivel 	= $value;
		$data->guardarAsociacionCursoNivel($relacion);
	}
	
	
	$_SESSION["asociacion_oknivel"] = 1;
	header("Location: " . $_SERVER["HTTP_REFERER"]);
	
?>