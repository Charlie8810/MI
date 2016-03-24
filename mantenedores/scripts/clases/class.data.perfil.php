<?php
class Perfil extends MySQL
{
	
	
	function obtenerPerfil($idPerfil)
	{
		$sql = "SELECT * FROM perfil WHERE IdPerfil = '".$idPerfil."';";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$per = parent::fetch_assoc($consulta);	
			$perfil = new stdclass();
			$perfil->IdPerfil 		= $per["IdPerfil"];
			$perfil->Nombre 		= $per["Nombre"];
			$perfil->Descripcion 	= $per["Descripcion"];
			$perfil->Vigente 	    = $per["Vigente"];
						
			
			return $perfil;
		}
		else
		{
			return false;
		}
	}
	

	function listarPerfil()
	{
		$sql = "SELECT * FROM perfil";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{

			$r = array();
			while($per = parent::fetch_assoc($consulta))
			{
				$perfil = new stdclass();
				$perfil->IdPerfil 		= $per["IdPerfil"];
				$perfil->Nombre 		= $per["Nombre"];
				$perfil->Descripcion 	= $per["Descripcion"];
				$perfil->Vigente 	    = $per["Vigente"];
				$r[] = $perfil;
			}
			return $r;	

		}
		else
		{
			return false;
		}
	}

	function eliminarPerfil($IdPerfil)
	{
		$sqlDelete = "delete from perfil where IdPerfil = " . $IdPerfil;
		$stmt = parent::consulta($sqlDelete);
	}
	
	
}
?>