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
		
	function cargarPersonas()
	{
		//$consulta = parent::consulta("SELECT Nombre,IdRegion FROM Region ORDER BY idRegion ASC");
		$consulta = parent::consulta("CALL sp_Personas_Listar");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$personas = array();
			while($persona = parent::fetch_assoc($consulta))
			{
				$code = $persona["IdPersona"];
				$name = $persona["Nombre"];				
				$personas[$code]=$name;
			}
			return $personas;
		}
		else
		{
			return false;
		}
	}	
}
?>