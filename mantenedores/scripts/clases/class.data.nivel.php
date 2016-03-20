<?php

class Nivel extends MySQL
{
	
	function EliminarNivel($IdNivel)
	{
		$sqlDelete = "delete from nivel where Id_Nivel = " . $IdNivel;
		$stmt = parent::consulta($sqlDelete);
	}
	
	function listarNivel()
	{
		$sql = "select * from nivel ";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($niv = parent::fetch_assoc($consulta)){
			
				$nivel = new stdclass();
				$nivel->Id_Nivel        = $niv["Id_Nivel"];
				$nivel->Nombre 	        = $niv["Nombre"];
				$nivel->Descripcion     = $niv["Descripcion"];
				$nivel->Vigente         = $niv["Vigente"];
				$lista[] = $nivel;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function obtenerNivel($IdNivel)
	{
		$sql = "SELECT * FROM nivel WHERE Id_Nivel = ".$IdNivel.";";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$emp = parent::fetch_assoc($consulta);	
			$nivel = new stdclass();
			$nivel->Id_Nivel        = $emp["Id_Nivel"];
			$nivel->Nombre 	        = $emp["Nombre"];
			$nivel->Descripcion     = $emp["Descripcion"];
			$nivel->Vigente         = $emp["Vigente"];
		
			return $nivel;
		}
		else
		{
			return false;
		}
	}
}
?>