<?php

class Estado extends MySQL
{
	
	function eliminarEstado($IdEstado)
	{
		$sqlDelete = "DELETE FROM estado WHERE IdEstado = ".$IdEstado.";";
		$stmt = parent::consulta($sqlDelete);
	}
	
	function listarEstado()
	{
		$sql = "SELECT * FROM estado ";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($est = parent::fetch_assoc($consulta)){
			
				$estado = new stdclass();
				$estado->id_Idioma 	  = $est["IdEstado"];
				$estado->Nombre 	  = $est["Nombre"];
				$estado->Descripcion  = $est["Descripcion"];
				
				$lista[] = $estado;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function obtenerEstado($IdEstado)
	{
		$sql = "SELECT * FROM estado WHERE IdEstado = ".$IdEstado.";";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$est = parent::fetch_assoc($consulta);	
			$estado = new stdclass();
			$estado->IdEstado 		= $est["IdEstado"];
			$estado->Nombre 		= $est["Nombre"];
			$estado->Descripcion 	= $est["Descripcion"];
				
			return $estado;
		}
		else
		{
			return false;
		}
	}
}
?>