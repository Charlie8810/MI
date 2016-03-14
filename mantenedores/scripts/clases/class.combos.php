<?php

class selects extends MySQL
{
	var $code = "";
	
	function cargarRegiones()
	{
		//$consulta = parent::consulta("SELECT Nombre,idRegion FROM Region ORDER BY idRegion ASC");
		$consulta = parent::consulta("CALL sp_Regiones_Listar");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$regiones = array();
			while($region = parent::fetch_assoc($consulta))
			{
				$code = $region["IdRegion"];
				$name = $region["Nombre"];				
				$regiones[$code]=$name;
			}
			return $regiones;
		}
		else
		{
			return false;
		}
	}


	function cargarPersonas()
	{
		//$consulta = parent::consulta("SELECT Nombre,idRegion FROM Region ORDER BY idRegion ASC");
		$consulta = parent::consulta("select *  from persona");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$personas = array();
			while($persona = parent::fetch_assoc($consulta))
			{
				$per = new stdclass();
				$per->code = $persona["IdPersona"];
				$per->name = $persona["Nombres"] . ' ' . $persona["ApellidoPaterno"] . ' ' .  $persona["ApellidoMaterno"] ;				
				$personas[]=$per;
			}
			return $personas;
		}
		else
		{
			return false;
		}
	}
	
	
	function listarRegiones()
	{
		//$consulta = parent::consulta("SELECT Nombre,idRegion FROM Region ORDER BY idRegion ASC");
		$consulta = parent::consulta("CALL sp_Regiones_Listar");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$regiones = array();
			while($region = parent::fetch_assoc($consulta))
			{
				$region2 = new stdclass();
				$region2->code = $region["IdRegion"];
				$region2->name = $region["Nombre"];		
				$regiones[] = $region2;	
				
			}
			return $regiones;
		}
		else
		{
			return false;
		}
	}
	
	function cargarComunas()
	{
		//$consulta = parent::consulta("SELECT Nombre FROM Comuna WHERE IDRegion = '".$this->code."'");
		$consulta = parent::consulta("CALL sp_Comunas_ObtenerPorIDRegion ('".$this->code."')");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$comunas = array();
			while($comuna = parent::fetch_assoc($consulta))
			{
                $code = $comuna["IdComuna"];
				$name = $comuna["Nombre"];				
				$comunas[$code]=$name;
			}
			return $comunas;
		}
		else
		{
			return false;
		}
	}
	
	function listarComunas()
	{
		//$consulta = parent::consulta("SELECT Nombre FROM Comuna WHERE IDRegion = '".$this->code."'");
		$consulta = parent::consulta("CALL sp_Comunas_ObtenerPorIDRegion ('".$this->code."')");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$comunas = array();
			while($comuna = parent::fetch_assoc($consulta))
			{
				$comuna2 = new stdclass();
                $comuna2->code = $comuna["IdComuna"];
				$comuna2->name = $comuna["Nombre"];				
				$comunas[]=$comuna2;
			}
			return $comunas;
		}
		else
		{
			return false;
		}
	}
	
	
	function listarCursos()
	{
		$consulta = parent::consulta("select * from cursos");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$cursos = array();
			while($cr = parent::fetch_assoc($consulta))
			{
				$curso = new stdclass();
                $curso->IdCurso = $cr["IdCurso"];
				$curso->Nombre = $cr["Nombre_Curso"];				
				$cursos[]=$curso;
			}
			return $cursos;
		}
		else
		{
			return false;
		}
	}
		
			
}
?>