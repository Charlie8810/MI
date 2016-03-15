<?php

class selects extends MySQL
{
	var $code = "";
	
	function cargarRegiones()
	{
		//$consulta = parent::consulta("SELECT Nombre,idRegion FROM Region ORDER BY idRegion ASC");
		$consulta = parent::consulta("CALL sp_Regiones_Listar");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$regiones = array();
			while($region = parent::fetch_assoc($consulta))
			{
				$code = $region["IdRegion"];
				$name = $region["Nombre"];				
				$regiones[$code]=$name;
			}
			return $regiones;
		}
		else
		{
			return false;
		}
	}
	
    function listarPerfiles()
	{
		$consulta = parent::consulta("CALL sp_Perfil_Listar");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$perfiles = array();
			while($p = parent::fetch_assoc($consulta))
			{
				$perfil = new stdclass();
				$perfil->code = $p["IdPerfil"];
				$perfil->name = $p["Nombre"];				
				$perfiles[]=$perfil;
			}
			return $perfiles;
		}
		else
		{
			return false;
		}
	}
	
	function listarEmpresas()
	{
		$consulta = parent::consulta("CALL sp_Empresas_Listar");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$empresas = array();
			while($e = parent::fetch_assoc($consulta))
			{
				$empresa = new stdclass();
				$empresa->code = $e["IdEmpresa"];
				$empresa->name = $e["RazonSocial"];				
				$empresas[]=$empresa;
			}
			return $empresas;
		}
		else
		{
			return false;
		}
	}
	
    function listarProfesores()
	{
		$consulta = parent::consulta("CALL sp_Profesores_Listar");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$profesores = array();
			while($p = parent::fetch_assoc($consulta))
			{
				$profesor = new stdclass();
				$profesor->code = $p["IdPersona"];
				$profesor->name = $p["Nombres"];				
				$profesores[]=$profesor;
			}
			return $profesores;
		}
		else
		{
			return false;
		}
	}
	
	function listarNiveles()
	{
		$consulta = parent::consulta("CALL sp_Niveles_Listar");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$niveles = array();
			while($n = parent::fetch_assoc($consulta))
			{
				$nivel = new stdclass();
				$nivel->code = $n["Id_Nivel"];
				$nivel->name = $n["Nombre"];				
				$niveles[]=$nivel;
			}
			return $niveles;
		}
		else
		{
			return false;
		}
	}
	
    function listarIdiomas()
	{
		$consulta = parent::consulta("CALL sp_Idiomas_Listar");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$idiomas = array();
			while($n = parent::fetch_assoc($consulta))
			{
				$idioma = new stdclass();
				$idioma->code = $n["id_Idioma"];
				$idioma->name = $n["Nombre"];				
				$idiomas[]=$idioma;
			}
			return $idiomas;
		}
		else
		{
			return false;
		}
	}
	
	
	function listarEstados()
	{
		$consulta = parent::consulta("CALL sp_Estados_Listar");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$estados = array();
			while($e = parent::fetch_assoc($consulta))
			{
				$estado = new stdclass();
				$estado->code = $e["IdEstado"];
				$estado->name = $e["Nombre"];				
				$estados[]=$estado;
			}
			return $estados;
		}
		else
		{
			return false;
		}
	}
	


	function cargarPersonas()
	{
		//$consulta = parent::consulta("SELECT Nombre,idRegion FROM Region ORDER BY idRegion ASC");
		$consulta = parent::consulta("select *  from persona");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$personas = array();
			while($persona = parent::fetch_assoc($consulta))
			{
				$per = new stdclass();
				$per->code = $persona["IdPersona"];
				$per->name = $persona["Nombres"] . ' ' . $persona["ApellidoPaterno"] . ' ' .  $persona["ApellidoMaterno"] ;				
				$personas[]=$per;
			}
			return $personas;
		}
		else
		{
			return false;
		}
	}
	
	
	function listarRegiones()
	{
		//$consulta = parent::consulta("SELECT Nombre,idRegion FROM Region ORDER BY idRegion ASC");
		$consulta = parent::consulta("CALL sp_Regiones_Listar");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$regiones = array();
			while($region = parent::fetch_assoc($consulta))
			{
				$region2 = new stdclass();
				$region2->code = $region["IdRegion"];
				$region2->name = $region["Nombre"];		
				$regiones[] = $region2;	
				
			}
			return $regiones;
		}
		else
		{
			return false;
		}
	}
	
	function cargarComunas()
	{
		//$consulta = parent::consulta("SELECT Nombre FROM Comuna WHERE IDRegion = '".$this->code."'");
		$consulta = parent::consulta("CALL sp_Comunas_ObtenerPorIDRegion ('".$this->code."')");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$comunas = array();
			while($comuna = parent::fetch_assoc($consulta))
			{
                $code = $comuna["IdComuna"];
				$name = $comuna["Nombre"];				
				$comunas[$code]=$name;
			}
			return $comunas;
		}
		else
		{
			return false;
		}
	}
	
	function listarComunas()
	{
		//$consulta = parent::consulta("SELECT Nombre FROM Comuna WHERE IDRegion = '".$this->code."'");
		$consulta = parent::consulta("CALL sp_Comunas_ObtenerPorIDRegion ('".$this->code."')");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$comunas = array();
			while($comuna = parent::fetch_assoc($consulta))
			{
				$comuna2 = new stdclass();
                $comuna2->code = $comuna["IdComuna"];
				$comuna2->name = $comuna["Nombre"];				
				$comunas[]=$comuna2;
			}
			return $comunas;
		}
		else
		{
			return false;
		}
	}
	
	
	function listarCursos()
	{
		$consulta = parent::consulta("select * from cursos");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$cursos = array();
			while($cr = parent::fetch_assoc($consulta))
			{
				$curso = new stdclass();
                $curso->IdCurso = $cr["IdCurso"];
				$curso->Nombre = $cr["Nombre_Curso"];				
				$cursos[]=$curso;
			}
			return $cursos;
		}
		else
		{
			return false;
		}
	}
		
			
}
?>