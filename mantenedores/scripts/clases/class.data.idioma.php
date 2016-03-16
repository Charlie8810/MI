<?php

class Idioma extends MySQL
{
	
	function EliminarIdioma($IdIdioma)
	{
		$sqlDelete = "delete from idioma where id_Idioma = " . $IdIdioma;
		$stmt = parent::consulta($sqlDelete);
	}
	
	function listarIdioma()
	{
		$sql = "select * from idioma ";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($idi = parent::fetch_assoc($consulta)){
			
				$idioma = new stdclass();
				$idioma->id_Idioma 	  = $idi["id_Idioma"];
				$idioma->Nombre 	  = $idi["Nombre"];
				$idioma->Descripcion  = $idi["Descripcion"];
				$idioma->Vigente 	  = $idi["Vigente"];
				$lista[] = $idioma;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function obtenerIdioma($IdIdioma)
	{
		$sql = "SELECT * FROM idioma WHERE id_Idioma = ".$IdIdioma.";";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$idi = parent::fetch_assoc($consulta);	
			$idioma = new stdclass();
			$idioma->id_Idioma 		= $idi["id_Idioma"];
			$idioma->Nombre 		= $idi["Nombre"];
			$idioma->Descripcion 	= $idi["Descripcion"];
			$idioma->Vigente 		= $idi["Vigente"];
		
			return $idioma;
		}
		else
		{
			return false;
		}
	}
}
?>