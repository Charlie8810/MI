<?php

class ParametroGlobal extends MySQL
{
	
	/*function guardarParametro($parametro)
	{
		
			$sqlInsert = "insert into ejercicio (IdCurso, IdFase, IdTipo, Nombre) values (".$ejercicio->IdCurso.", ".$ejercicio->IdFase.", ".$ejercicio->IdTipo.", '".$ejercicio->Nombre."');";
			$stmt = parent::consulta($sqlInsert);
			return parent::lastInsertID();
		
	}*/
	
	
	function obtenerParametro($idParametro)
	{
		$sql = "SELECT * FROM parametrosglobales WHERE IdParametrosGlobales = ".$idParametro.";";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$gr = parent::fetch_assoc($consulta);	
			$parametros = new stdclass();
			$parametros->IdParametro 		= $gr["IdParametrosGlobales"];
			$parametros->Codigo 			= $gr["Codigo"];
			$parametros->Valor 				= $gr["Valor"];
			$parametros->Descripcion 		= $gr["Descripcion"];
			$parametros->FechaCreacion 		= $gr["FechaCreacion"];
		
			return $parametros;
		}
		else
		{
			return false;
		}
	 }	
	
	function EliminarParametro($codigoParametro)
	{
		$sqlDelete = "delete from parametrosglobales where Codigo = " . $codigoParametro;
		$stmt = parent::consulta($sqlDelete);
	}
	
	function listarParametrosAll()
	{
		$sql = "select * from parametrosglobales";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$parametros = new stdclass();
				$parametros->IdParametro 		= $gr["IdParametrosGlobales"];
				$parametros->Codigo 			= $gr["Codigo"];
				$parametros->Valor 				= $gr["Valor"];
				$parametros->Descripcion 		= $gr["Descripcion"];
				$parametros->FechaCreacion 		= $gr["FechaCreacion"];
				$lista[] = $parametros;
			}
			return $lista;
		}
		else
		{
			return false;
		}
		
	}
}
?>