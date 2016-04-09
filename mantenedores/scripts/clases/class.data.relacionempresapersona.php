<?php


class RelacionEmpresaPersona extends MySQL
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
	
	function RelacionEmpresaDepartamentoParaCursos()
	{
			$sql = "SELECT
		        relacionempresadepto.IdRelacionEmpresaDepto,
				CONCAT(empresa.RazonSocial, ' - ', departamento.Nombre) as Nombres

				from relacionempresadepto
				inner join empresa on empresa.IdEmpresa = relacionempresadepto.IdEmpresa
				inner join departamento on departamento.IdDepartamento = relacionempresadepto.IdDepartamento
				where relacionempresadepto.Vigente = 1
				order by CONCAT(empresa.RazonSocial, ' - ', departamento.Nombre) asc";
				
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$relacion = array();
			while($p = parent::fetch_assoc($consulta))
			{
				$relacion = new stdclass();
				$relacion->code = $p["IdRelacionEmpresaDepto"];
				$relacion->name = $p["Nombres"];				
				$relaciones[]=$relacion;
			}
			return $relaciones;
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
	
    function listarPersonasEnrroladas($idEmpresa)
	{
		$sql = "
			select IdPersona,
			       CONCAT(p.Nombres,' ',p.ApellidoPaterno,' ',p.ApellidoMaterno) as Nombres
			from persona p 
			where p.IdPerfil =3
			and  p.IdPersona in (select IdPersona from relacionempresapersona where Vigente = 1 and IdEmpresa = ".$idEmpresa.");";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta))
			{
			
				$persona = new stdclass();
				$persona->IdPersona  = $gr["IdPersona"];
				$persona->Nombres 	 = $gr["Nombres"];
				$lista[] = $persona;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function listarPersonasNoEnrroladas($idEmpresa)
	{
		$sql = "
			select p.IdPersona,
			       CONCAT(p.Nombres,' ',p.ApellidoPaterno,' ',p.ApellidoMaterno) as Nombres 
			from persona p
			where p.IdPerfil =3
			and p.IdPersona not in (select IdPersona from relacionempresapersona where Vigente = 1 and IdEmpresa = ".$idEmpresa.");";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta))
			{
			
				$persona = new stdclass();
				$persona->IdPersona = $gr["IdPersona"];
				$persona->Nombres 	= $gr["Nombres"];
				$lista[] = $persona;
			}
			return $lista;
		}
		else
		{
			return false;
		}
		
	}
	
    function eliminarAsociacionEmpresaPersona($idEmpresa)
	{
		$sqlDelete = "UPDATE relacionempresapersona SET Vigente=0  WHERE IdEmpresa=".$idEmpresa.";";
		$stmt = parent::consulta($sqlDelete);
	}
	
    function guardarAsociacionEmpresaPersona($entrada)
	{		
	
	
	     $sql ="  SELECT *
				  FROM	relacionempresapersona
				  WHERE	IdEmpresa = $entrada->IdEmpresa
				  AND	IdPersona = $entrada->IdPersona ;";
	
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);

        if($num_total_registros>0)
		{
			$sqlupdate = "UPDATE relacionempresapersona SET Vigente=1  WHERE IdEmpresa=".$entrada->IdEmpresa." AND IdPersona=".$entrada->IdPersona.";";
		    $stmt1 = parent::consulta($sqlupdate);
		}
        else
		{
			$sqlInsert = "insert into relacionempresapersona(IdEmpresa, IdPersona, Vigente) values ($entrada->IdEmpresa, $entrada->IdPersona,'1');";
		    $stmt = parent::consulta($sqlInsert);
		}			
	
	

	}
	
	
}
?>