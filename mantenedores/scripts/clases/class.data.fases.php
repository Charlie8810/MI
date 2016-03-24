<?php

class Fases extends MySQL
{
	
	function eliminarFase($IdFase)
	{
		$sqlDelete = "DELETE FROM fases WHERE Id_Fase = ".$IdFase.";";
		$stmt = parent::consulta($sqlDelete);
	}
	
	function listarFases()
	{
		$sql = "SELECT 
				 fases.Id_Fase,
				 fases.Vigente,
				 fases.Nombre,
				 CONCAT(cursos.Nombre_Curso,' - ',nivel.Nombre) as NombreCursoNivel

				FROM fases
				inner join relacionnivelcurso on relacionnivelcurso.IdRelNivelCurso = fases.IdCursoNivel
				inner join nivel on nivel.Id_Nivel = relacionnivelcurso.IdNivel
				inner join cursos on cursos.IdCurso = relacionnivelcurso.IdCurso;";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($fas = parent::fetch_assoc($consulta)){
			
				$fases = new stdclass();
				$fases->Id_Fase 	      = $fas["Id_Fase"];
				$fases->Vigente 	      = $fas["Vigente"];
				$fases->Nombre            = $fas["Nombre"];
				$fases->NombreCursoNivel  = $fas["NombreCursoNivel"];
				
				$lista[] = $fases;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function obtenerFase($IdFase)
	{
		$sql = "SELECT * FROM fases WHERE Id_Fase = ".$IdFase.";";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$fas = parent::fetch_assoc($consulta);	
			$fases = new stdclass();
			$fases->Id_Fase 		= $fas["Id_Fase"];
			$fases->Nombre 		    = $fas["Nombre"];
			$fases->Vigente 	    = $fas["Vigente"];
			$fases->IdCursoNivel 	= $fas["IdCursoNivel"];
				
			return $fases;
		}
		else
		{
			return false;
		}
	}
	
    function cargarRelacion()
	{
		$sql = "select relacionnivelcurso.IdRelNivelCurso,
			    concat(cursos.Nombre_Curso, ' - ', nivel.Nombre) as nombrerelacion
				from relacionnivelcurso
				inner join nivel on nivel.Id_Nivel = relacionnivelcurso.IdNivel
				inner join cursos on cursos.IdCurso = relacionnivelcurso.IdCurso;";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$relacion = array();
			while($r = parent::fetch_assoc($consulta))
			{
				$rela = new stdclass();
				$rela->code = $r["IdRelNivelCurso"];
				$rela->name = $r["nombrerelacion"];				
				$relacion[]=$rela;
			}
			return $relacion;
		}
		else
		{
			return false;
		}
	}
}
?>