<?php

class Ejercicios extends MySQL
{
	
	function guardarEjercicio($ejercicio)
	{
		
		if($ejercicio->IdEjercicio)
		{
			$sqlUpdate = "update ejercicio 
							set IdCurso = ".$ejercicio->IdCurso.", 
								IdFase = ".$ejercicio->IdFase.", 
								IdTipo = ".$ejercicio->IdTipo.", 
								Nombre = '".$ejercicio->Nombre."'
							where IdEjercicio = ".$ejercicio->IdEjercicio."	
								";
			$stmt = parent::consulta($sqlUpdate);
			return $ejercicio->IdEjercicio;
		}
		else
		{
			$sqlInsert = "insert into ejercicio (IdCurso, IdFase, IdTipo, Nombre) values (".$ejercicio->IdCurso.", ".$ejercicio->IdFase.", ".$ejercicio->IdTipo.", '".$ejercicio->Nombre."');";
			$stmt = parent::consulta($sqlInsert);
			return parent::lastInsertID();
		}
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
	
	function EliminarEjercicio($IdEjercicio)
	{
		$sqlDelete = "delete from ejercicio where IdEjercicio = " . $IdEjercicio;
		$stmt = parent::consulta($sqlDelete);
	}
	
	function guardarGrupoPreguntas($grupo)
	{
		$sqlInsert = "insert into grupo_pregunta(idEjercicio, TextoGrupoPregunta, HtmlGrupoPregunta) values ($grupo->IdEjercicio, '$grupo->Texto', '$grupo->Html');";
		$stmt = parent::consulta($sqlInsert);
		return parent::lastInsertID();
	}
	
	
	function eliminarGrupoPreguntasPorEjercicio($idEjercicio)
	{
		$sqlDelete = "delete from grupo_pregunta where IdEjercicio=".$idEjercicio.";";
		$stmt = parent::consulta($sqlDelete);
	}
	
	function eliminarTerminosPareadosPorEjercicio($idEjercicio)
	{
		$sqlDelete = "delete from terminos_pareados where IdEjercicio=".$idEjercicio.";";
		$stmt = parent::consulta($sqlDelete);
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
	
	function obtenerGrupoPreguntasPorEjercicioGestor($idEjercicio)
	{
		$sql = "SELECT * FROM grupo_pregunta 
				WHERE idEjercicio = ".$idEjercicio.";";
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
	
	function obtenerAudioPreguntaPorEjercicio($idEjercicio, $rspRnd = false)
	{
		
		$sql = "SELECT * FROM audiopregunta 
			WHERE idEjercicio = ".$idEjercicio;
			
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$aup = new stdClass();
			$gr = parent::fetch_assoc($consulta);
			$aup->IdPreguntaAudio = $gr["IdPreguntaAudio"];
			$aup->IdEjercicio = $gr["IdEjercicio"];
			$aup->RutaAudio = $gr["RutaAudio"];
			$aup->Titulo = $gr["Titulo"];
			$aup->Descripcion = $gr["Descripcion"];
			$aup->Respuestas = $this->obtenerAudioRespuestaPorPregunta($gr["IdPreguntaAudio"],$rspRnd);
			return $aup;
		}
		else
		{
			return false;
		}
	}
	
	function obtenerAudioRespuestaPorPregunta($idPregunta, $rand = false)
	{
		
		$orden = (!$rand) ? "OrdenRespuestaAudio asc" : "rand()";
		
		$sql = "SELECT * FROM audiorespuesta 
			WHERE IdPreguntaAudio = ".$idPregunta."
			ORDER BY ".$orden;
		
		$lista = array();
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta))
			{
				$respuesta = new stdClass();
				$respuesta->IdRespuestaAudio = $gr["IdRespuestaAudio"];
				$respuesta->IdPreguntaAudio = $gr["IdPreguntaAudio"];
				$respuesta->TextoResupestaAudio = $gr["TextoResupestaAudio"];
				$respuesta->TextoApolloRespuestaAudio = $gr["TextoApolloRespuestaAudio"];
				$respuesta->OrdenRespuestaAudio = $gr["OrdenRespuestaAudio"];
				$lista[] = $respuesta;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	
	function obtenerFotoPreguntaPorEjercicio($idEjercicio, $rspRnd = false)
	{
		
		$sql = "SELECT * FROM fotopregunta 
			WHERE idEjercicio = ".$idEjercicio;
			
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$aup = new stdClass();
			$gr = parent::fetch_assoc($consulta);
			$aup->IdPreguntaFoto = $gr["IdPreguntaFoto"];
			$aup->IdEjercicio = $gr["IdEjercicio"];
			$aup->RutaFoto = $gr["RutaFoto"];
			$aup->Titulo = $gr["Titulo"];
			$aup->Descripcion = $gr["Descripcion"];
			$aup->Respuestas = $this->obtenerFotoRespuestaPorPregunta($gr["IdPreguntaFoto"],$rspRnd);
			return $aup;
		}
		else
		{
			return false;
		}
	}

	
	function obtenerFotoRespuestaPorPregunta($idPregunta, $rand = false)
	{
		
		$orden = (!$rand) ? "OrdenRespuestaFoto asc" : "rand()";
		
		$sql = "SELECT * FROM fotorespuesta 
			WHERE IdPreguntaFoto = ".$idPregunta."
			ORDER BY ".$orden;
		
		$lista = array();
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta))
			{
				$respuesta = new stdClass();
				$respuesta->IdRespuestaFoto = $gr["IdRespuestaFoto"];
				$respuesta->IdPreguntaFoto = $gr["IdPreguntaFoto"];
				$respuesta->TextoResupestaFoto = $gr["TextoResupestaFoto"];
				$respuesta->TextoApolloRespuestaFoto = $gr["TextoApolloRespuestaFoto"];
				$respuesta->OrdenRespuestaFoto = $gr["OrdenRespuestaFoto"];
				$lista[] = $respuesta;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function obtenerTerminosPareadosPorEjercicioGestor($idEjercicio)
	{
		$sql = "SELECT * FROM audiopregunta 
				WHERE idEjercicio = ".$idEjercicio.";";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$r = array();
			while($gr = parent::fetch_assoc($consulta))
			{
				$terminopareado = new stdclass();
				$terminopareado->IdTermino 	= $gr["IdTermino"];
				$terminopareado->TextoDerecha 	= $gr["TextoDerecha"];
				$terminopareado->TextoIzquierda = $gr["TextoIzquierda"];
				$r[] = $terminopareado;
			}
			return $r;
		}
		else
		{
			return false;
		}
	}
	
	function guardarPreguntas($pregunta)
	{
		$sqlInsert = "insert into pregunta(IdEjercicio,TextoPregunta) values ($pregunta->IdGrupoPregunta, '$pregunta->TextoPregunta');";
		$stmt = parent::consulta($sqlInsert);
		return parent::lastInsertID();
	}
	
	function guardarAudioPregunta($pregunta)
	{
		$sqlInsert = "insert into audiopregunta(IdEjercicio,RutaAudio,Titulo,Descripcion) values ($pregunta->IdEjercicio, '$pregunta->RutaAudio', '$pregunta->Titulo', '$pregunta->Descripcion');";
		$stmt = parent::consulta($sqlInsert);
		return parent::lastInsertID();
	}
	
	function guardarFotoPregunta($pregunta)
	{
		$sqlInsert = "insert into fotopregunta(IdEjercicio,RutaFoto,Titulo,Descripcion) values ($pregunta->IdEjercicio, '$pregunta->RutaFoto', '$pregunta->Titulo', '$pregunta->Descripcion');";
		$stmt = parent::consulta($sqlInsert);
		return parent::lastInsertID();
	}
	
	
	function guardarAudioRespuesta($respuesta)
	{
		$sqlInsert = "insert into audiorespuesta(IdPreguntaAudio, TextoResupestaAudio, TextoApolloRespuestaAudio, OrdenRespuestaAudio) values ($respuesta->IdPreguntaAudio, '$respuesta->TextoResupestaAudio', '$respuesta->TextoApolloRespuestaAudio', $respuesta->OrdenRespuestaAudio);";
		$stmt = parent::consulta($sqlInsert);
		return parent::lastInsertID();
	}
	
	function guardarFotoRespuesta($respuesta)
	{
		$sqlInsert = "insert into fotorespuesta(IdPreguntaFoto, TextoResupestaFoto, TextoApolloRespuestaFoto, OrdenRespuestaFoto) values ($respuesta->IdPreguntaFoto, '$respuesta->TextoResupestaFoto', '$respuesta->TextoApolloRespuestaFoto', $respuesta->OrdenRespuestaFoto);";
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
	
	function listarEjerciciosAll()
	{
		$sql = "select * from ejercicio";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$ejercicio = new stdclass();
				$ejercicio->IdEjercicio 	= $gr["IdEjercicio"];
				$ejercicio->IdTipo 			= $gr["IdTipo"];
				$ejercicio->Nombre 			= $gr["Nombre"];
				$ejercicio->IdCurso 		= $gr["IdCurso"];
				$ejercicio->IdFase 			= $gr["IdFase"];
				$lista[] = $ejercicio;
			}
			return $lista;
		}
		else
		{
			return false;
		}
		
	}
	
	function listarCursosAll()
	{
		$sql = "select * from cursos";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$curso = new stdclass();
				$curso->IdCurso 			= $gr["IdCurso"];
				$curso->Nombre 				= $gr["Nombre_Curso"];
				$curso->IdProfesor 			= $gr["IdProfesor"];
				$curso->IdNivel 			= $gr["IdNivel"];
				$curso->IdIdioma 			= $gr["IdIdioma"];
				$curso->IdEmpresa 			= $gr["IdEmpresa"];
				$curso->Vigente 			= $gr["Vigente"];
				
				
				$lista[] = $curso;
			}
			return $lista;
		}
		else
		{
			return false;
		}
		
	}
	
	
	function listarAlumnosNoEnrrolados($idCurso)
	{
		$sql = "
			select * 
			from persona p 
			where p.IdPersona not in (select IdPersona from relacioncursopersona where IdCurso = ".$idCurso.");";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta))
			{
			
				$alumno = new stdclass();
				$alumno->IdPersona 			= $gr["IdPersona"];
				$alumno->NombreCompleto 	= $gr["Nombres"] . " " . $gr["ApellidoPaterno"] . " " . $gr["ApellidoMaterno"];
				$alumno->Rut 				= $gr["Rut"];
				$lista[] = $alumno;
			}
			return $lista;
		}
		else
		{
			return false;
		}
		
	}
	
	function listarAlumnosEnrrolados($idCurso)
	{
		$sql = "
			select * 
			from persona p 
			where p.IdPersona in (select IdPersona from relacioncursopersona where IdCurso = ".$idCurso.");";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta))
			{
			
				$alumno = new stdclass();
				$alumno->IdPersona 			= $gr["IdPersona"];
				$alumno->NombreCompleto 	= $gr["Nombres"] . " " . $gr["ApellidoPaterno"] . " " . $gr["ApellidoMaterno"];
				$alumno->Rut 				= $gr["Rut"];
				$lista[] = $alumno;
			}
			return $lista;
		}
		else
		{
			return false;
		}
		
	}
	
	function eliminarAsociacionCursoAlumno($idCurso)
	{
		$sqlDelete = "delete from relacioncursopersona where IdCurso=".$idCurso.";";
		$stmt = parent::consulta($sqlDelete);
	}
	
	function guardarAsociacionCursoAlumno($entrada)
	{
		$sqlInsert = "insert into relacioncursopersona(IdCurso, IdPersona) values ($entrada->IdCurso, $entrada->IdPersona);";
		$stmt = parent::consulta($sqlInsert);
		//return parent::lastInsertID();
	}
		
	
}
?>