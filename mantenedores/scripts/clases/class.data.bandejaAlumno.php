<?php

class BandejaAlumno extends MySQL
{
	
	public function listarCursosAlumno($login_alumno)
	{
		$sql = "
		select *
		from  usuario
		inner join relacioncursopersona on relacioncursopersona.IDPersona = usuario.idPersona
		inner join cursos on cursos.IdCurso = relacioncursopersona.IDCurso
		where usuario.Login = '".$login_alumno."';
				
		";
		
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$objeto = new stdclass();
				$objeto->Nombre_Curso 	= $gr["Nombre_Curso"];
				$objeto->IdCurso 		= $gr["IdCurso"];
				$objeto->Niveles 		= $this->listarNivelesCurso($objeto->IdCurso);
				$lista[] = $objeto;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	
	public function listarNivelesCurso($idCurso)
	{
		$sql = "
			select *
			from relacionnivelcurso
			inner join nivel on nivel.Id_Nivel = relacionnivelcurso.IDNivel
			where relacionnivelcurso.IdCurso = ".$idCurso.";
				
		";
		
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$objeto = new stdclass();
				$objeto->Nombre_nivel 	 = $gr["Nombre"];
				$objeto->IdRelNivelCurso = $gr["IdRelNivelCurso"];
				$objeto->Fases = $this->listarFasesNivelCurso($objeto->IdRelNivelCurso);
				$lista[] = $objeto;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	
	public function listarFasesNivelCurso($IdRelNivelCurso)
	{
		$sql = "
			select *
			from fases
			where fases.IdCursoNivel = ".$IdRelNivelCurso."
				
		";
		
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$objeto = new stdclass();
				$objeto->Nombre_fase 	 = $gr["Nombre"];
				$objeto->Id_fase = $gr["Id_Fase"];
				$objeto->Ejercicios = $this->listarEjerciciosFase($objeto->Id_fase);
				$lista[] = $objeto;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	public function listarEjerciciosFase($idFase)
	{
		$sql = "
			select * 
				from ejercicio 
				where ejercicio.IdFase = ".$idFase."
				
		";
	
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$objeto = new stdclass();
				$objeto->Nombre 	 = $gr["Nombre"];
				$objeto->Id_ejercicio = $gr["IdEjercicio"];
				$objeto->IdTipo = $gr["IdTipo"];
				$lista[] = $objeto;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	
		
	
}
?>