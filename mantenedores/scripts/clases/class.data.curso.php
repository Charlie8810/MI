<?php

class Curso extends MySQL
{
	
	function EliminarCurso($IdCurso)
	{
		$sqlDelete = "delete from cursos where IdCurso = " . $IdCurso;
		$stmt = parent::consulta($sqlDelete);
	}
	
	function listarCurso()
	{
		$sql = "select * from cursos ";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($cur = parent::fetch_assoc($consulta)){
			
				$cursa = new stdclass();
				$cursa->IdCurso           = $cur["IdCurso"];
				$cursa->Nombre_Curso 	  = $cur["Nombre_Curso"];
				$cursa->IdProfesor        = $cur["IdProfesor"];
				$cursa->IdIdioma          = $cur["IdIdioma"];
				$cursa->IdRelEmpresaDepto = $cur["IdRelEmpresaDepto"];
				$cursa->Vigente 	      = $cur["Vigente"];
				$cursa->AnoInicio         = $cur["AnoInicio"];
				$lista[] = $cursa;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function obtenerCurso($IdCurso)
	{
		$sql = "SELECT * FROM cursos WHERE IdCurso = ".$IdCurso.";";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$cur = parent::fetch_assoc($consulta);	
				$cursa = new stdclass();
				$cursa->IdCurso           = $cur["IdCurso"];
				$cursa->Nombre_Curso 	  = $cur["Nombre_Curso"];
				$cursa->IdProfesor        = $cur["IdProfesor"];
				$cursa->IdIdioma          = $cur["IdIdioma"];
				$cursa->IdRelEmpresaDepto = $cur["IdRelEmpresaDepto"];
				$cursa->Vigente 	      = $cur["Vigente"];
				$cursa->AnoInicio         = $cur["AnoInicio"];
		
			return $cursa;
		}
		else
		{
			return false;
		}
	}
}
?>