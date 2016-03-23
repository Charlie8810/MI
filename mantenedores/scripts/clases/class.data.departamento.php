<?php

class Departamento extends MySQL
{
	
	
	function obtenerDepartamento($idDepartamento)
	{
		$sql = "SELECT * FROM departamento WHERE IdDepartamento = '".$idDepartamento."'
		        ;";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$dep = parent::fetch_assoc($consulta);	
			$departamento = new stdclass();
			$departamento->IdDepartamento  = $dep["IdDepartamento"];
			$departamento->Nombre 		   = $dep["Nombre"];
			$departamento->Vigente 	       = $dep["Vigente"];
						
			
			return $departamento;
		}
		else
		{
			return false;
		}
	}
	

	function listarDepartamento()
	{
		$sql = "SELECT * FROM departamento ";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{

			$r = array();
			while($dep = parent::fetch_assoc($consulta))
			{
				$departamento = new stdclass();
				$departamento->IdDepartamento 	= $dep["IdDepartamento"];
				$departamento->Nombre 		    = $dep["Nombre"];
				$departamento->Vigente 	        = $dep["Vigente"];
				$r[] = $departamento;
			}
			return $r;	

		}
		else
		{
			return false;
		}
	}

	function eliminarDepartamento($idDepartamento)
	{
		$sqlDelete = "delete from departamento where IdDepartamento = " . $idDepartamento;
		$stmt = parent::consulta($sqlDelete);
	}
	
	
}
?>