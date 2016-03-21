<?php

class Usuario extends MySQL
{
	
	function EliminarUsuario($IdUsuario)
	{
		$sqlDelete = "delete from usuario where idPersona = " . $IdUsuario;
		$stmt = parent::consulta($sqlDelete);
	}
	
	function listarUsuario()
	{
		$sql = "select * from usuario ";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($usu = parent::fetch_assoc($consulta)){
			
				$usuario = new stdclass();
				$usuario->idPersona      = $usu["idPersona"];
				$usuario->Login 	     = $usu["Login"];
				$usuario->Contrasena     = $usu["Contrasena"];
				$usuario->Estado         = $usu["Estado"];
				$lista[] = $usuario;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function obtenerUsuario($IdUsuario)
	{
		$sql = "SELECT * FROM usuario WHERE idPersona = ".$IdUsuario.";";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$usu = parent::fetch_assoc($consulta);	
			$usuario = new stdclass();
			$usuario->idPersona      = $usu["idPersona"];
			$usuario->Login 	     = $usu["Login"];
			$usuario->Contrasena     = $usu["Contrasena"];
			$usuario->Estado         = $usu["Estado"];
		
			return $usuario;
		}
		else
		{
			return false;
		}
	}
}
?>