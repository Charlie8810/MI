<?php

class Empresa extends MySQL
{
	
	function EliminarEmpresa($IdEmpresa)
	{
		$sqlDelete = "delete from empresa where IdEmpresa = " . $IdEmpresa;
		$stmt = parent::consulta($sqlDelete);
	}
	
	function listarEmpresa()
	{
		$sql = "select * from empresa ";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($emp = parent::fetch_assoc($consulta)){
			
				$empresa = new stdclass();
				$empresa->IdEmpresa        = $emp["IdEmpresa"];
				$empresa->Rut 	           = $emp["Rut"];
				$empresa->RazonSocial      = $emp["RazonSocial"];
				$empresa->Direccion        = $emp["Direccion"];
				$empresa->IdRegion 	       = $emp["IdRegion"];
				$empresa->IdComuna 	       = $emp["IdComuna"];
				$empresa->NombreContacto   = $emp["NombreContacto"];
				$empresa->EmailContacto    = $emp["EmailContacto"];
				$empresa->TelefonoContacto = $emp["TelefonoContacto"];
				$lista[] = $empresa;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function obtenerEmpresa($IdEmpresa)
	{
		$sql = "SELECT * FROM empresa WHERE IdEmpresa = ".$IdEmpresa.";";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$emp = parent::fetch_assoc($consulta);	
			$empresa = new stdclass();
			$empresa->IdEmpresa        = $emp["IdEmpresa"];
			$empresa->Rut 	           = $emp["Rut"];
			$empresa->RazonSocial      = $emp["RazonSocial"];
			$empresa->Direccion        = $emp["Direccion"];
			$empresa->IdRegion 	       = $emp["IdRegion"];
			$empresa->IdComuna 	       = $emp["IdComuna"];
			$empresa->NombreContacto   = $emp["NombreContacto"];
			$empresa->EmailContacto    = $emp["EmailContacto"];
			$empresa->TelefonoContacto = $emp["TelefonoContacto"];
		
			return $empresa;
		}
		else
		{
			return false;
		}
	}
}
?>