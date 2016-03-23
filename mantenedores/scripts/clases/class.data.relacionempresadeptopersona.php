<?php


class RelacionEmpresaDepartamentoPersona extends MySQL
{
	
	
function listarRelacionEmpresaDepartamentoPorId($IdRelacion)
	{
		$sql = "SELECT
		        relacionempresadepto.IdRelacionEmpresaDepto,
				empresa.RazonSocial as Empresa,
				departamento.Nombre as Departamento,
				relacionempresadepto.Vigente
				from relacionempresadepto
				inner join empresa on empresa.IdEmpresa = relacionempresadepto.IdEmpresa
				inner join departamento on departamento.IdDepartamento = relacionempresadepto.IdDepartamento
				where IdRelacionEmpresaDepto = ".$IdRelacion.";";
				
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
		   $relemp = parent::fetch_assoc($consulta);
			
				$relacionempresa = new stdclass();
				$relacionempresa->IdRelacionEmpresaDepto  = $relemp["IdRelacionEmpresaDepto"];
				$relacionempresa->Empresa 	              = $relemp["Empresa"];
				$relacionempresa->Departamento            = $relemp["Departamento"];
				$relacionempresa->Vigente                 = $relemp["Vigente"];
			
			return $relacionempresa;
		}
		else
		{
			return false;
		}
	}
	
	
    function listarPersonasEnrrolados($idRelacion)
	{
		$sql = "
			select p.IdPersona,
                   CONCAT(p.Nombres,' ',p.ApellidoPaterno,' ', p.ApellidoMaterno) as NombreCompleto
			from persona p
			where p.IdPerfil = 3
			and   p.IdPersona in (select rel.IdPersona from relacionpersonaempdepto as rel where rel.Vigente = 1 and rel.IdRelEmpresaDepto = ".$idRelacion.");";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($per = parent::fetch_assoc($consulta))
			{
			
				$persona = new stdclass();
				$persona->IdPersona      = $per["IdPersona"];
				$persona->NombreCompleto = $per["NombreCompleto"];
				$lista[] = $persona;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function listarPersonasNoEnrrolados($idRelacion)
	{
		$sql ="
			select p.IdPersona,
                   CONCAT(p.Nombres,' ',p.ApellidoPaterno,' ', p.ApellidoMaterno) as NombreCompleto
			from persona p
			where p.IdPerfil = 3
			and   p.IdPersona not in (select rel.IdPersona from relacionpersonaempdepto as rel where rel.Vigente = 1 and rel.IdRelEmpresaDepto = ".$idRelacion.");";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($per = parent::fetch_assoc($consulta))
			{
			
				$persona = new stdclass();
				$persona->IdPersona      = $per["IdPersona"];
				$persona->NombreCompleto = $per["NombreCompleto"];
				$lista[] = $persona;
			}
			return $lista;
		}
		else
		{
			return false;
		}
		
	}
	
    function eliminarAsociacionEmpresaDepartamentoPer($idRelacion)
	{
		$sqlDelete = "UPDATE relacionpersonaempdepto SET Vigente=0  WHERE IdRelEmpresaDepto=".$idRelacion.";";
		$stmt = parent::consulta($sqlDelete);
	}
	
    function guardarAsociacionEmpresaDepartamento($entrada)
	{		
	
	
	     $sql ="  SELECT *
				  FROM	relacionpersonaempdepto
				  WHERE	relacionpersonaempdepto.IdRelEmpresaDepto = $entrada->idRelacion
                  AND	relacionpersonaempdepto.IdPersona = $entrada->IdPersona;";

		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);

        if($num_total_registros>0)
		{
			$sqlupdate = "UPDATE relacionpersonaempdepto SET Vigente=1  WHERE IdRelEmpresaDepto=".$entrada->idRelacion." AND IdPersona=".$entrada->IdPersona.";";
		    $stmt1 = parent::consulta($sqlupdate);
		}
        else
		{
			$sqlInsert = "insert into relacionpersonaempdepto(IdRelEmpresaDepto, IdPersona, Vigente) values ($entrada->idRelacion, $entrada->IdPersona,'1');";
		    $stmt = parent::consulta($sqlInsert);
		}			
	
	

	}
	
	
}
?>