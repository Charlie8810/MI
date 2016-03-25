<?php

class Persona extends MySQL
{
	
	function eliminarPersona($IdPersona)
	{
		$sqlDelete = "DELETE FROM persona WHERE IdPersona = ".$IdPersona.";";
		$stmt = parent::consulta($sqlDelete);
	}
	
	function listarPersona()
	{
		$sql = "SELECT * FROM persona";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($per = parent::fetch_assoc($consulta)){
			
				$per = parent::fetch_assoc($consulta);	
				$persona = new stdclass();
				$persona->IdPersona = $per["IdPersona"];
				$persona->Nombres 	= $per["Nombres"];
				$persona->ApellidoM = $per["ApellidoPaterno"];
				$persona->ApellidoP = $per["ApellidoMAterno"];
				$persona->Rut		= $per["Rut"];
				$persona->Email		= $per["Email"];
			
				$lista[] = $persona;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function listarPersonas()
	{
		$sql = "select persona.*,
			   perfil.Nombre as tipousuario
			   from persona
			   inner join perfil on perfil.IdPerfil = persona.IdPerfil";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($per = parent::fetch_assoc($consulta)){
			
				$persona= new stdclass();
				$persona->IdPersona      = $per["IdPersona"];
				$persona->Nombres        = $per["Nombres"];
				$persona->ApellidoP      = $per["ApellidoPaterno"];
				$persona->ApellidoM      = $per["ApellidoMaterno"];
				$persona->Rut		     = $per["Rut"];
				$persona->Email		     = $per["Email"];
				$persona->tipousuario    = $per["tipousuario"];
			
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
			$pers = parent::fetch_assoc($consulta);	
			$persona = new stdclass();
			$persona->IdPersona       	= $pers["IdPersona"];
			$persona->Nombres 	        = $pers["Nombres"];
			$persona->ApellidoP      	= $pers["ApellidoPaterno"];
			$persona->ApellidoM        	= $pers["ApellidoMaterno"];
			$persona->Rut	       		= $pers["Rut"];
			$persona->Email 	       	= $pers["Email"];
			$persona->Region 			= $pers["IdRegion"];
			$persona->Comuna 		    = $pers["IdComuna"];
			$persona->Direccion 		= $pers["Direccion"];
			$persona->Telefono 			= $pers["Telefono"];
			$persona->Celular			= $pers["Celular"];
			$persona->Estado 			= $pers["IdEstado"];

		
			return $persona;
		}
		else
		{
			return false;
		}
	}	
}
?>