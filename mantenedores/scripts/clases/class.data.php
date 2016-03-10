<?php

class Data extends MySQL
{
	
	function cargarPersona($rut)
	{
		$sql = "SELECT * FROM persona WHERE Rut = '".$rut."';";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$pr = parent::fetch_assoc($consulta);	
			$persona = new stdclass();
			$persona->IdPersona 		= $pr["IdPersona"];
			$persona->Nombres 			= $pr["Nombres"];
			$persona->ApellidoPaterno 	= $pr["ApellidoPaterno"];
			$persona->ApellidoMaterno 	= $pr["ApellidoMaterno"];
			$persona->Rut 				= $pr["Rut"];
			$persona->Email 			= $pr["Email"];
			$persona->IdPerfil 			= $pr["IdPerfil"];
			$persona->Direccion 		= $pr["Direccion"];
			$persona->IdRegion 			= $pr["IdRegion"];
			$persona->IdComuna 			= $pr["IdRegion"];
			$persona->Telefono 			= $pr["Telefono"];
			$persona->Celular 			= $pr["Celular"];
			$persona->Vigente 			= $pr["Vigente"];
			$persona->IdCurso 			= $pr["IdCurso"];
			$persona->IdEstado 			= $pr["IdEstado"];
			
			
			return $persona;
		}
		else
		{
			return false;
		}
	}
	
	
	function guardarEjercicio($ejercicio)
	{
		$sqlInsert = "insert into ejercicio (IdCurso, IdFase, IdTipo, Nombre) values (".$ejercicio->IdCurso.", ".$ejercicio->IdFase.", ".$ejercicio->IdTipo.", '".$ejercicio->Nombre."');";
		$stmt = parent::consulta($sqlInsert);
		return parent::lastInsertID();
	}
	
	function obtenerEjercicio($IdEjercicio)
	{
		$sql = "SELECT * FROM ejercicio WHERE IdEjercicio = ".$IdEjercicio.";";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$pr = parent::fetch_assoc($consulta);	
			$ejercicio = new stdclass();
			$ejercicio->IdEjercicio 		= $pr["IdEjercicio"];
			$ejercicio->IdCurso 			= $pr["IdCurso"];
			$ejercicio->IdFase 				= $pr["IdFase"];
			$ejercicio->IdTipo 				= $pr["IdTipo"];
			$ejercicio->Nombre 				= $pr["Nombre"];
		
			return $ejercicio;
		}
		else
		{
			return false;
		}
	}
	
	function EliminarEjercicio($ejercicio)
	{
		$sqlInsert = "delete from ejercicio (IdCurso, IdNivel, IdFase) values (".$ejercicio->IdCurso.", ".$ejercicio->IdNivel.",".$ejercicio->IdFase.");";
		$stmt = parent::consulta($sqlInsert);
		return parent::lastInsertID();
	}
	
	function guardarGrupoPreguntas($grupo)
	{
		$sqlInsert = "insert into grupo_pregunta(idEjercicio, TextoGrupoPregunta, HtmlGrupoPregunta) values ($grupo->IdEjercicio, '$grupo->Texto', '$grupo->Html');";
		$stmt = parent::consulta($sqlInsert);
		return parent::lastInsertID();
	}
	
	function obtenerGrupoPreguntasPorEjercicio($idEjercicio)
	{
		$sql = "SELECT * FROM grupo_pregunta 
				WHERE idEjercicio = ".$idEjercicio."
				ORDER BY rand() LIMIT 10;
		;";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$grupo_pregunta = new stdclass();
				$grupo_pregunta->IdGrupoPregunta 		= $gr["IdGrupoPregunta"];
				$grupo_pregunta->IdEjercicio 			= $gr["IdEjercicio"];
				$grupo_pregunta->TextoGrupoPregunta 	= $gr["TextoGrupoPregunta"];
				$grupo_pregunta->HtmlGrupoPregunta 		= $gr["HtmlGrupoPregunta"];
				$lista[] = $grupo_pregunta;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function obtenerTerminosPareadosPorEjercicioRESPALDO($idEjercicio)
	{
		$sql = "SELECT * FROM terminos_pareados 
				WHERE idEjercicio = ".$idEjercicio."
				ORDER BY rand() LIMIT 10;
		;";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta))
			{
				$grupo_pregunta = new stdclass();
				$grupo_pregunta->IdTermino 		= $gr["IdTermino"];
				$grupo_pregunta->IdEjercicio 	= $gr["IdEjercicio"];
				$grupo_pregunta->TextoDerecha 	= $gr["TextoDerecha"];
				$grupo_pregunta->TextoIzquierda = $gr["TextoIzquierda"];
				$lista[] = $grupo_pregunta;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function obtenerTerminosPareadosPorEjercicio($idEjercicio)
	{
		$sql = "SELECT * FROM terminos_pareados 
				WHERE idEjercicio = ".$idEjercicio."
				ORDER BY rand() LIMIT 10;
		;";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$grupo_pregunta = new stdclass();
			while($gr = parent::fetch_assoc($consulta))
			{
				$IdTermino 	= $gr["IdTermino"];
				$grupo_pregunta->TextoDerecha[$IdTermino] 	= $gr["TextoDerecha"];
				$grupo_pregunta->TextoIzquierda[$IdTermino] = $gr["TextoIzquierda"];
				$grupo_pregunta->dt[] = array('ID'=>$IdTermino,'d'=>$gr["TextoDerecha"], 'i'=>$gr["TextoIzquierda"]);
			}
			return $grupo_pregunta;
		}
		else
		{
			return false;
		}
	}
	
	function guardarPreguntas($pregunta)
	{
		$sqlInsert = "insert into pregunta(IdGrupoPregunta,TextoPregunta) values ($pregunta->IdGrupoPregunta, '$pregunta->TextoPregunta');";
		$stmt = parent::consulta($sqlInsert);
		return parent::lastInsertID();
	}
	
	function guardarTerminosPareados($terminos)
	{
		$sqlInsert = "insert into terminos_pareados(IdEjercicio, TextoIzquierda, TextoDerecha) values ($terminos->IdEjercicio,'$terminos->TextoIzquierda', '$terminos->TextoDerecha');";
		$stmt = parent::consulta($sqlInsert);
		return parent::lastInsertID();
	}
	
	
	
	function guardarRespuesta($respuesta)
	{
		$sqlInsert = "insert into respuesta(IdPregunta, EsCorrecta, TextoRespuesta) values ($respuesta->IdPregunta, $respuesta->EsCorrecta, '$respuesta->Texto');";
		$stmt = parent::consulta($sqlInsert);
		return parent::lastInsertID();
	}
		
	function listarFases()
	{
		$sql = "select IdFase, a.IdCurso
				from ejercicio a
				inner join cursos b on a.IdCurso = b.IdCurso
				where b.IdCurso  = 1
				and IdNivel=1
				GROUP BY IdFase
				ORDER BY IdFase";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$grupo_pregunta = new stdclass();
				$grupo_pregunta->IdFase 		= $gr["IdFase"];
				$grupo_pregunta->IdCurso 		= $gr["IdCurso"];
				$lista[] = $grupo_pregunta;
			}
			return $lista;
		}
		else
		{
			return false;
		}
		
	}	
	
	function listarEjercicios($idCurso, $idFase)
	{
		$sql = "select * 
				from ejercicio 
				where IdCurso  = $idCurso
				and IdFase = $idFase ";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$grupo_pregunta = new stdclass();
				$grupo_pregunta->IdEjercicio 	= $gr["IdEjercicio"];
				$grupo_pregunta->IdTipo 		= $gr["IdTipo"];
				$grupo_pregunta->Nombre 		= $gr["Nombre"];
				$lista[] = $grupo_pregunta;
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