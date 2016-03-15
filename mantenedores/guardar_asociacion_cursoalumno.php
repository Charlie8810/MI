<?php
	session_start();
	include("scripts/clases/class.mysql.php");
	include("scripts/clases/class.data.php");
		
	$data = new Data();	
	
	$idCurso = $_POST["idCurso"];
	$alumnos = $_POST["slEnrrolados"];
	
	
	$data->eliminarAsociacionCursoAlumno($idCurso);
	
	foreach ($alumnos as $key => $value) 
	{
		$relacion = new stdClass();
		$relacion->IdCurso 		= $idCurso;
		$relacion->IdPersona 	= $value;
		$data->guardarAsociacionCursoAlumno($relacion);
	}
	
	
	$_SESSION["asociacion_ok"] = 1;
	header("Location: " . $_SERVER["HTTP_REFERER"]);
	
?>