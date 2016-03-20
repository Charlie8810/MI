<?php

class Estado extends MySQL
{
	
	function eliminarPersona($IdPersona)
	{
		$sqlDelete = "DELETE FROM persona WHERE IdPersona = ".$IdPersona.";";
		$stmt = parent::consulta($sqlDelete);
	}
	
	function listarPersona()
	{
		$sql = "SELECT * FROM estado ";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($per = parent::fetch_assoc($consulta)){
			
				$per = parent::fetch_assoc($consulta);	
				$persona = new stdclass();
				$persona->id_Idioma = $per["IdPersona"];
				$persona->Nombre 	= $per["Nombres"];
				$persona->ApMaterno = $per["ApellidoPaterno"];
				$persona->ApPaterno = $per["ApellidoMAterno"];
				$persona->Rut		= $per["Rut"];
				$persona->Email		= $per["Email"];
				$persona->IdPerfil 	= $per["IdPerfil"];
				$persona->Direccion = $per["Direccion"];
				$persona->IdRegion 	= $per["IdRegion"];
				$persona->IdComuna	= $per["IdComuna"];
				$persona->Telefono	= $per["Telefono"];
				$persona->Celular 	= $per["Celular"];	
				$persona->IdEstado 	= $per["IdEstado"];

				$lista[] = $persona;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function obtenerPersona($IdPersona)
	{
		$sql = "SELECT * FROM persona WHERE IdPersona = ".$IdPersona.";";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$per = parent::fetch_assoc($consulta);	
			$persona = new stdclass();
			$persona->id_Idioma 	= $per["IdPersona"];
			$persona->Nombre 	= $per["Nombres"];
			$persona->ApMaterno 	= $per["ApellidoPaterno"];
			$persona->ApPaterno 	= $per["ApellidoMAterno"];
			$persona->Rut		= $per["Rut"];
			$persona->Email		= $per["Email"];
			$persona->IdPerfil 	= $per["IdPerfil"];
			$persona->Direccion 	= $per["Direccion"];
			$persona->IdRegion 	= $per["IdRegion"];
			$persona->IdComuna	= $per["IdComuna"];
			$persona->Telefono	= $per["Telefono"];
			$persona->Celular 	= $per["Celular"];	
			$persona->IdEstado 	= $per["IdEstado"];

			return $persona;
		}
		else
		{
			return false;
		}
	}
}
?>