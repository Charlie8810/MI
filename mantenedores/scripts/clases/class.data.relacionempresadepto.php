<?php


class RelacionEmpresaDepartamento extends MySQL
{
	
	
	function listarRelacionEmpresaDepartamento()
	{
		$sql = "SELECT
		        relacionempresadepto.IdRelacionEmpresaDepto,
				empresa.RazonSocial as Empresa,
				departamento.Nombre as Departamento,
				relacionempresadepto.Vigente
				from relacionempresadepto
				inner join empresa on empresa.IdEmpresa = relacionempresadepto.IdEmpresa
				inner join departamento on departamento.IdDepartamento = relacionempresadepto.IdDepartamento";
				
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($relemp = parent::fetch_assoc($consulta)){
			
				$relacionempresa = new stdclass();
				$relacionempresa->IdRelacionEmpresaDepto  = $relemp["IdRelacionEmpresaDepto"];
				$relacionempresa->Empresa 	              = $relemp["Empresa"];
				$relacionempresa->Departamento            = $relemp["Departamento"];
				$relacionempresa->Vigente                 = $relemp["Vigente"];
				$lista[] = $relacionempresa;
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
	
    function listarDepartamentosEnrrolados($idEmpresa)
	{
		$sql = "
			select * 
			from departamento d 
			where d.IdDepartamento in (select IdDepartamento from relacionempresadepto where Vigente = 1 and IdEmpresa = ".$idEmpresa.");";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta))
			{
			
				$departamento = new stdclass();
				$departamento->IdDepartamento  = $gr["IdDepartamento"];
				$departamento->Nombre 	     = $gr["Nombre"];
				$lista[] = $departamento;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function listarDepartamentosNoEnrrolados($idEmpresa)
	{
		$sql = "
			select * 
			from departamento d 
			where d.IdDepartamento not in (select IdDepartamento from relacionempresadepto where Vigente = 1 and IdEmpresa = ".$idEmpresa.");";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta))
			{
			
				$departamento = new stdclass();
				$departamento->IdDepartamento 			= $gr["IdDepartamento"];
				$departamento->Nombre 	= $gr["Nombre"];
				$lista[] = $departamento;
			}
			return $lista;
		}
		else
		{
			return false;
		}
		
	}
	
    function eliminarAsociacionEmpresaDepartamento($idEmpresa)
	{
		$sqlDelete = "UPDATE relacionempresadepto SET Vigente=0  WHERE IdEmpresa=".$idEmpresa.";";
		$stmt = parent::consulta($sqlDelete);
	}
	
    function guardarAsociacionEmpresaDepartamento($entrada)
	{		
	
	
	     $sql ="  SELECT *
				  FROM	relacionempresadepto
				  WHERE	relacionempresadepto.IdDepartamento = $entrada->IdDepartamento
                  AND	relacionempresadepto.IdEmpresa = $entrada->IdEmpresa;";

		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);

        if($num_total_registros>0)
		{
			$sqlupdate = "UPDATE relacionempresadepto SET Vigente=1  WHERE IdEmpresa=".$entrada->IdEmpresa." AND IdDepartamento=".$entrada->IdDepartamento.";";
		    $stmt1 = parent::consulta($sqlupdate);
		}
        else
		{
			$sqlInsert = "insert into relacionempresadepto(IdEmpresa, IdDepartamento, Vigente) values ($entrada->IdEmpresa, $entrada->IdDepartamento,'1');";
		    $stmt = parent::consulta($sqlInsert);
		}			
	
	

	}
	
	
}
?>